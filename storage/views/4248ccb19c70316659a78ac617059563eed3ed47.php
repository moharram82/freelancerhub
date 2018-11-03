<?php $__env->startSection('title'); ?> Project Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">

                <h1><?php echo e($rfq->title); ?></h1>

                <p class="category"><?php echo e($rfq->category->sub_category); ?></p>

                <p class="budget">Budget <span>SDG <?php echo e(number_format($rfq->budget, 0)); ?></span></p>

                <div class="desc">

                    <?php echo $rfq->details; ?>


                    <?php if(auth()->check() && auth()->isGranted('ROLE_FREELANCER')): ?>

                        <a class="mt-5 btn btn-success btn-lg btn-block" href="<?php echo e(BASEURL); ?>/freelancers/proposals.php?action=new&customer_id=<?php echo e($rfq->customer_id); ?>">Apply!</a>

                    <?php elseif(! auth()->check()): ?>

                        <p class="text-center"><a href="<?php echo e(config('auth.login_path')); ?>">Login</a> to apply.</p>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">

                <div class="clearfix">
                    <?php if(file_exists(PUBLICPATH . '/img/users/' . $rfq->customer->user->user_id . '.jpg')): ?>
                    <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($rfq->customer->user->user_id); ?>.jpg" alt='Profile Picture'>
                    <?php else: ?>
                    <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                    <?php endif; ?>
                    <h3><?php echo e($rfq->customer->name); ?></h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo e($rfq->customer->city->city); ?></p>
                </div>

                <p class="desc"><?php echo e($rfq->customer->description); ?></p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>