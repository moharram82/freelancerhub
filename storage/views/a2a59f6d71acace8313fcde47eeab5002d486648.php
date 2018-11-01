<?php $__env->startSection('title'); ?> <?php echo e($freelancer->firstname); ?> <?php echo e($freelancer->lastname); ?> <?php $__env->stopSection(); ?>

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

                    <?php if($freelancer->reviews->count()): ?>
                    <span><?php echo e($reviews); ?></span>
                    <?php else: ?>
                    <span>N/A</span>
                    <?php endif; ?>

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
                        <td><strong>Experience</strong></td>
                        <td class="pl-5"><?php echo e($freelancer->experience); ?> years</td>
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

                <?php if($freelancer->packages->count()): ?>

                    <?php $__currentLoopData = $freelancer->packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="box package">
                            <h4><?php echo e($package->title); ?></h4>
                            <table>
                                <tr>
                                    <td>Delivery</td>
                                    <td class="bold"><?php echo e($package->delivery); ?> Days</td>
                                </tr>
                                <tr>
                                    <td>Starting at</td>
                                    <td class="bold">SDG<?php echo e($package->price); ?></td>
                                </tr>
                            </table>
                            <a class="btn btn-outline-secondary btn-block" href="<?php echo e(BASEURL); ?>/package.php?package_id=<?php echo e($package->id); ?>">Details</a>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>

                    <p><?php echo e($freelancer->firstname); ?> has no packages</p>

                <?php endif; ?>

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
                            <li><a href="<?php echo e(BASEURL); ?>/hub.php?filter_by=skill&value=<?php echo e($skill->id); ?>"><?php echo e($skill->skill_name); ?></a></li>
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

                    <h3>Reviews (<?php echo e($freelancer->reviews->count()); ?>)</h3>

                    <?php if($freelancer->reviews->count()): ?>

                    <?php $__currentLoopData = $freelancer->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="review">
                        <div class="review-header clearfix">
                            <img src=''>
                            <h4><?php echo e($review->customer->name); ?></h4>
                            <p><?php echo e(\Carbon\Carbon::make($review->created_at)->diffForHumans()); ?></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span><?php echo e(($review->price_rating + $review->quality_rating + $review->timing_rating + $review->communication_rating + $review->commitement_rating) / 5); ?></span>
                            </div>
                        </div>
                        <p class="review-body">
                            <?php echo e($review->body); ?>

                        </p>
                    </div>

                    <hr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <a class="btn btn-outline-secondary btn-lg btn-block" href="<?php echo e(BASEURL); ?>/reviews.php?freelancer_id=2">View all</a>

                    <?php else: ?>

                    <p>No reviews</p>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="right">
                <h3>Similar Profiles</h3>

                <hr>

                <?php $__currentLoopData = $similars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="similar-profile">
                        <a href="<?php echo e(BASEURL); ?>/freelancer.php?freelancer_id=<?php echo e($similar_freelancer->id); ?>">
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