<?php $__env->startSection('freelancer-contents'); ?>

    <div class="box">

        <h2><?php echo e($package->title); ?></h2>

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

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>