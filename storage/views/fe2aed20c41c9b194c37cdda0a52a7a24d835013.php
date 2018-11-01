<?php $__env->startSection('title'); ?> Browse the Hub <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <h1>FreelancerHub</h1>

    <div class="row">
        <div class="col-lg-2 options">
            options
        </div>

        <div class="col-lg-10 results">
            <div class="row freelancers">

                <?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-4">
                    <div class="box freelancer-card">
                        <?php if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg')): ?>
                        <img src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($freelancer->user->user_id); ?>.jpg">
                        <?php else: ?>
                        <img src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                        <?php endif; ?>
                        <h3><a href="<?php echo e(BASEURL); ?>/freelancer.php?freelancer_id=<?php echo e($freelancer->id); ?>"><?php echo e($freelancer->firstname); ?> <?php echo e($freelancer->lastname); ?></a></h3>
                        <p class="category"><?php echo e($freelancer->category->job_title); ?></p>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo e($freelancer->city->city); ?></p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <?php if($reviews[$freelancer->id] !== 0): ?>
                                <span><?php echo e($reviews[$freelancer->id]); ?></span>
                            <?php else: ?>
                                <span>N/A</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>