<?php $__env->startSection('title'); ?> Package Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">

                <h1><?php echo e($package->title); ?></h1>

                <table class="meta-data">
                    <tr>
                        <td>Delivery</td>
                        <td class="data"><?php echo e($package->delivery); ?> days</td>
                    </tr>
                    <tr>
                        <td>Start Price</td>
                        <td class="data">SDG<?php echo e($package->price); ?></td>
                    </tr>
                    <tr>
                        <td>Added on</td>
                        <td class="data"><?php echo e(\Carbon\Carbon::make($package->created_at)->format('d M Y')); ?></td>
                    </tr>
                </table>

                <div>
                    <h3>Details</h3>

                    <?php echo $package->details; ?>


                </div>

                <p><a class="btn btn-success btn-lg btn-block" href="<?php echo e(BASEURL); ?>">Order Package</a></p>

            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">

                <div class="clearfix">
                    <?php if(file_exists(PUBLICPATH . '/img/users/' . $package->freelancer->user->user_id . '.jpg')): ?>
                        <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($package->freelancer->user->user_id); ?>.jpg" alt='Profile Picture'>
                    <?php else: ?>
                        <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                    <?php endif; ?>
                    <h3><a href="<?php echo e(BASEURL); ?>/freelancer.php?freelancer_id=<?php echo e($package->freelancer->id); ?>"><?php echo e($package->freelancer->firstname); ?> <?php echo e($package->freelancer->lastname); ?></a></h3>
                    <p style="color: lightslategrey; font-size: 12px;"><?php echo e($package->freelancer->category->job_title); ?></p>
                </div>

                <p class="desc"><?php echo e($package->freelancer->description); ?></p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>