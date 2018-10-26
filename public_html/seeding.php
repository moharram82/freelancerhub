<?php

require_once '../init.php';

use Faker\Factory;
use App\Models\Customer;
use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;

$hasher = new BcryptHasher();
$faker = Factory::create('en_SD');

$cities = [
    'Khartoum',
    'Port-Sudan',
    'Atbara',
    'Shandi',
    'Ubayed',
    'Kassala',
    'Kusti',
    'Kurdufan',
    'Darfur',
    'Madani'
];

$customerTypes = [
    'individual',
    'company'
];

function phoneNumber($faker) {
    $phoneCodes = [
        '121',
        '122',
        '123',
        '124',
        '125',
        '126',
        '127',
        '128',
        '129',
        '9121',
        '9122',
        '9123',
        '9124',
        '9125',
        '9126',
        '9127',
        '9128',
        '9129',
        '9221',
        '9222',
        '9223',
        '9224',
        '9225',
        '9226',
        '9227',
        '9228',
        '9229',
    ];

    if(mb_strlen($code = $faker->randomElement($phoneCodes)) === 3) {
        $phoneNumber =  $code . $faker->randomNumber(6, true);
    } else {
        $phoneNumber =  $code . $faker->randomNumber(5, true);
    }

    return $phoneNumber;
}

function newUser($hasher, $faker) {
    $user = new User;

    $user->username = $faker->email;
    $user->password = $hasher->make('1234');
    $user->roles = $faker->randomElement(['ROLE_FREELANCER', 'ROLE_CUSTOMER']);
    $user->is_activated = config('auth.account.activation') ? 0 : 1;

    if($user->save()) {
        if($user->roles == 'ROLE_FREELANCER') {
            freelancerSeed($user->user_id, $faker);
        } else {
            customersSeed($user->user_id, $faker);
        }
    }

    return $user;
}

function customersSeed($user_id, $faker) {
    global $cities;
    global $customerTypes;

    $cutomer = new Customer;

    $type = $faker->randomElement($customerTypes);
    $cutomer->type = $type;
    if($type == 'individual') {
        $cutomer->name = $faker->name;
    } else {
        $cutomer->name = $faker->company;
    }
    $cutomer->location = $faker->randomElement($cities);
    $cutomer->user_id = $user_id;
    $cutomer->description = $faker->text(200);
    $cutomer->mobile = phoneNumber($faker);

    $cutomer->save();
}

function freelancerSeed($user_id, $faker) {
    global $cities;

    $freelancer = new Freelancer;

    $freelancer->name = $faker->name;
    $freelancer->birthdate = $faker->date('Y-m-d', '2000-10-01');
    $freelancer->location = $faker->randomElement($cities);
    $freelancer->languages = $faker->randomElement(['Arabic', 'Arabic,English', 'Arabic,English,French']);
    $freelancer->category_id = $faker->numberBetween(1, 12);
    $freelancer->mobile = phoneNumber($faker);
    $freelancer->user_id = $user_id;
    $freelancer->description = $faker->text(200);
    $freelancer->facebook = 'http://www.facebook.com';
    $freelancer->twitter = 'http://www.twitter.com';
    $freelancer->github = 'http://www.github.com';
    $freelancer->dribbble = 'http://www.dribbble.com';
    $freelancer->linkedin = 'http://www.linkedin.com';
    $freelancer->response_time = $faker->numberBetween(1, 72);

    $freelancer->save();
}

for($i=0; $i<100; $i++) {
//    $user = newUser($hasher, $faker);
}
