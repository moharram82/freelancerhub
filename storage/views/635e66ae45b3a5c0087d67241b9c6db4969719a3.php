<?php $__env->startSection('title'); ?> RFQ Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>

    <div class="row">
        <?php if(isset($rfq->freelancer->user->user_id)): ?>
        <div class="col-lg-8 project-details">
        <?php else: ?>
        <div class="col-lg-12 project-details">
        <?php endif; ?>
            <div class="box">

                <h1><?php echo e($rfq->title); ?></h1>

                <p class="category"><?php echo e($rfq->category->sub_category); ?></p>

                <p class="budget">Budget <span>SDG <?php echo e(number_format($rfq->budget, 0)); ?></span></p>

                <div class="desc">

                    <?php echo $rfq->details; ?>


                </div>
            </div>
        </div>
        <?php if(isset($rfq->freelancer->user->user_id)): ?>
        <div class="col-lg-4 customer-info">

            <div class="box">

                <div class="clearfix">
                    <?php if(file_exists(PUBLICPATH . '/img/users/' . $rfq->freelancer->user->user_id . '.jpg')): ?>
                        <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($rfq->freelancer->user->user_id); ?>.jpg" alt='Profile Picture'>
                    <?php else: ?>
                        <img class="picture" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                    <?php endif; ?>
                    <h3><?php echo e($rfq->freelancer->firstname); ?> <?php echo e($rfq->freelancer->lastname); ?></h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo e($rfq->freelancer->city->city); ?></p>
                </div>

                <p class="desc"><?php echo e($rfq->freelancer->description); ?></p>
            </div>
        </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>