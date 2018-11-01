<?php $__env->startSection('freelancer-contents'); ?>

    <div class="box">

        <h2>Balance</h2>

        

        <p>Your balance is: <strong>SDG <?php echo e($freelancer->balance); ?></strong></p>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>