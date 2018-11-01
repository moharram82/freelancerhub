<?php $__env->startSection('freelancer-contents'); ?>

    <div class="box">

        <h2>Balance</h2>

        

        <p>Your balance is: <strong>SDG
                <?php if($freelancer->balance < 1000): ?>
                <span style="color: #ff0000;"><?php echo e($freelancer->balance); ?></span>
                <?php else: ?>
                <span style="color: limegreen;"><?php echo e($freelancer->balance); ?></span>
                <?php endif; ?>
        </strong></p>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>