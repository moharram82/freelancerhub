<?php

require_once '../init.php';

use Faker\Factory;
use App\Models\Customer;
use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;

$hasher = new BcryptHasher();
$faker = Factory::create('en_SD');

$cities = [1,2,3,4,5,6,7,8,9];

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

    $freelancer->firstname = $faker->name;
    $freelancer->lastname = $faker->name;
    $freelancer->birthdate = $faker->date('Y-m-d', '2000-10-01');
    $freelancer->city_id = $faker->randomElement($cities);
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

function createProposal($faker) {

    // get available freelancers & customers
    $freelancers = [];
    $customers = [];

    foreach (Freelancer::all() as $freelancer) {
        $freelancers[] = $freelancer->id;
    }

    foreach (Customer::all() as $customer) {
        $customers[] = $customer->id;
    }

    // create the proposal
    $proposal = new \App\Models\Proposal;
    $proposal->freelancer_id = $faker->randomElement($freelancers);
    $proposal->customer_id = $faker->randomElement($customers);
    $proposal->title = $faker->sentence;
    $proposal->price = $faker->numberBetween(1000, 100000);
    $proposal->delivery = $faker->numberBetween(1, 365);
    $proposal->validity = $faker->numberBetween(3, 7);
    $proposal->details = $faker->text(10000);

    $proposal->save();

    return $proposal;
}

function createContract($faker) {

    // create proposal first
    $proposal = createProposal($faker);

    // create the contract
    $contract = new \App\Models\Contract;
    $contract->proposal_id = $proposal->id;

    $start_date = $faker->dateTimeBetween($startDate = $proposal->created_at, $endDate = '2 weeks', $timezone = 'Africa/Khartoum')->format('Y-m-d');
    $contract->start_date = $start_date;

    $deliver_in_seconds = $proposal->delivery*24*60*60;

    if(strtotime($start_date) + $deliver_in_seconds > time()) {
        $contract->is_completed = 0;
    } else {
        $contract->is_completed = 1;
    }

    $contract->save();

    return $contract;
}

for($i=0; $i<100; $i++) {
//    $user = newUser($hasher, $faker);
//    $contract = createContract($faker);
}
