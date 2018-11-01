<?php $__env->startSection('freelancer-contents'); ?>
<div class="box">

    <h2><?php echo e($proposal->title); ?></h2>

    <table class="meta-data">
        <tr>
            <td>Customer</td>
            <td class="data"><?php echo e($proposal->customer->name); ?></td>
        </tr>
        <tr>
            <td>Delivery</td>
            <td class="data"><?php echo e($proposal->delivery); ?> days</td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG<?php echo e($proposal->price); ?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td class="data"><?php echo e($proposal->created_at); ?></td>
        </tr>
    </table>

    <div>
        <h3>Details</h3>

        <?php echo $proposal->details; ?>


    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>