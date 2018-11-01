<?php $__env->startSection('title'); ?> Freelancer Name <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="row box freelancer-profile-header">

        <div class="col-lg-2 text-center text-lg-left">
            <?php if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg')): ?>
                <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($freelancer->user->user_id); ?>.jpg" alt='Profile Picture'>
            <?php else: ?>
                <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
            <?php endif; ?>
        </div>

        <div class="col-lg-6 text-center text-lg-left">
            <div class="primary-info">
                <h1><?php echo e($freelancer->firstname); ?> <?php echo e($freelancer->lastname); ?></h1>
                <p class="subtitle"><?php echo e($freelancer->category->job_title); ?></p>
                <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo e($freelancer->city->city); ?></p>
                <a href="<?php echo e(BASEURL); ?>/messages.php" class="btn btn-success btn-lg btn-block">Contact Me now!</a>
            </div>
        </div>

        <div class="col-lg-4 text-center text-lg-left">
            <div class="secondary-info">
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                
                <table>
                    <tr>
                        <td><strong>Age</strong></td>
                        <td class="pl-5">
                            <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $freelancer->birthdate)->age); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><strong>Response Time</strong></td>
                        <td class="pl-5"><?php echo e($freelancer->response_time); ?> hours</td>
                    </tr>
                    <tr>
                        <td><strong>Projects Done</strong></td>
                        <td class="pl-5">12</td>
                    </tr>
                </table>

                <ul class="social-media">
                    <li><a href="<?php echo e($freelancer->facebook); ?>" class="fb"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="<?php echo e($freelancer->twitter); ?>" class="tw"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="<?php echo e($freelancer->github); ?>" class="gh"><i class="fab fa-github-square"></i></a></li>
                    <li><a href="<?php echo e($freelancer->dribbble); ?>" class="dr"><i class="fab fa-dribbble-square"></i></a></li>
                    <li><a href="<?php echo e($freelancer->linkedin); ?>" class="li"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row freelancer-profile-body">
        <div class="col-lg-3">
            <div class="left">

                <h3>Packages</h3>
                
                <hr>

                <div class="box package">
                        <h4>Package Title</h4>
                        <table>
                            <tr>
                                <td>Delivery</td>
                                <td class="bold">10 Days</td>
                            </tr>
                            <tr>
                                <td>Starting at</td>
                                <td class="bold">SDG 10,000</td>
                            </tr>
                        </table>
                        <a class="btn btn-outline-secondary btn-block" href="<?php echo e(BASEURL); ?>/package.php?package_id=2">Details</a>
                </div>

                <div class="box package">
                        <h4>Package Title</h4>
                        <table>
                            <tr>
                                <td>Delivery</td>
                                <td class="bold">10 Days</td>
                            </tr>
                            <tr>
                                <td>Starting at</td>
                                <td class="bold">SDG 10,000</td>
                            </tr>
                        </table>
                        <a class="btn btn-outline-secondary btn-block" href="<?php echo e(BASEURL); ?>/package.php?package_id=2">Details</a>
                </div>

                <div class="box package">
                        <h4>Package Title</h4>
                        <table>
                            <tr>
                                <td>Delivery</td>
                                <td class="bold">10 Days</td>
                            </tr>
                            <tr>
                                <td>Starting at</td>
                                <td class="bold">SDG 10,000</td>
                            </tr>
                        </table>
                        <a class="btn btn-outline-secondary btn-block" href="<?php echo e(BASEURL); ?>/package.php?package_id=2">Details</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="middle">
                <div class="box">

                    <h3>About</h3>

                    <p><?php echo e($freelancer->description); ?></p>

                    <hr>

                    <h3>Skills</h3>
                    <ul class="skills">
                        <?php $__currentLoopData = $freelancer->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="#"><?php echo e($skill->skill_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <hr>

                    <h3>Languages</h3>
                    <ul class="px-4">
                        <?php $__currentLoopData = explode(',', $freelancer->languages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($language); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="box">

                    <h3>Reviews (24)</h3>

                    <div class="review">
                        <div class="review-header clearfix">
                            <img src=''>
                            <h4>User Name</h4>
                            <p>13th Sep 2018</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="review-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ad dolorum similique dignissimos libero aperiam reiciendis labore aut, cupiditate doloremque numquam corporis quo earum beatae possimus velit iusto at nihil.</p>
                    </div>

                    <hr>

                    <div class="review">
                        <div class="review-header clearfix">
                            <img src=''>
                            <h4>User Name</h4>
                            <p>13th Sep 2018</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="review-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ad dolorum similique dignissimos libero aperiam reiciendis labore aut, cupiditate doloremque numquam corporis quo earum beatae possimus velit iusto at nihil.</p>
                    </div>

                    <hr>

                    <div class="review">
                        <div class="review-header clearfix">
                            <img src=''>
                            <h4>User Name</h4>
                            <p>13th Sep 2018</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="review-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ad dolorum similique dignissimos libero aperiam reiciendis labore aut, cupiditate doloremque numquam corporis quo earum beatae possimus velit iusto at nihil.</p>
                    </div>

                    <hr>

                    <a class="btn btn-outline-secondary btn-lg btn-block" href="<?php echo e(BASEURL); ?>/reviews.php?freelancer_id=2">View all</a>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="right">
                <h3>Similar Profiles</h3>

                <hr>

                <?php $__currentLoopData = $similars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="similar-profile">
                        <a href="<?php echo e(BASEURL); ?>/freelancers/freelancer.php?freelancer_id=<?php echo e($similar_freelancer->id); ?>">
                            <?php if(file_exists(PUBLICPATH . '/img/users/' . $similar_freelancer->user->user_id . '.jpg')): ?>
                                <img src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($similar_freelancer->user->user_id); ?>.jpg">
                            <?php else: ?>
                                <img src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                            <?php endif; ?>
                            <h4><?php echo e($similar_freelancer->firstname); ?> <?php echo e($similar_freelancer->lastname); ?></h4>
                            <p><?php echo e($similar_freelancer->category->job_title); ?></p>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>