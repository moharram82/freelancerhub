<?php $__env->startSection('title'); ?> Proposal Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-contents'); ?>
<div class="box">

    <h2><?php echo e($proposal->title); ?></h2>

    <table class="meta-data">
        <tr>
            <td>Freelancer</td>
            <td class="data"><?php echo e($proposal->freelancer->firstname); ?> <?php echo e($proposal->freelancer->lastname); ?></td>
        </tr>
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
            <td class="data">SDG <?php echo e(number_format($proposal->price, 0)); ?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td class="data"><?php echo e($proposal->created_at); ?></td>
        </tr>
    </table>

    <hr>

    <?php echo $proposal->details; ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>