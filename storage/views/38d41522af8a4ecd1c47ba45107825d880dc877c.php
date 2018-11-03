<?php $__env->startSection('title'); ?> My Balance <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>

    <div class="box">

        <h2>Balance</h2>

        

        <p>Your balance is: <strong>SDG
                <?php if($customer->balance < 1000): ?>
                    <span style="color: #ff0000;"><?php echo e(number_format($customer->balance, 0)); ?></span>
                <?php else: ?>
                    <span style="color: limegreen;"><?php echo e(number_format($customer->balance, 0)); ?></span>
                <?php endif; ?>
            </strong></p>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>