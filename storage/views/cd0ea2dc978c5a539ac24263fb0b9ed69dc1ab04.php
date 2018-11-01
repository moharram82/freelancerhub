<?php $__env->startSection('freelancer-contents'); ?>
<div class="box">
    <h2>All Contracts</h2>

    <?php if($contracts->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Start Date</th>
                <th>Cost</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/freelancers/contract.php?contract_id=<?php echo e($contract->id); ?>"><strong><?php echo e($contract->proposal->title); ?></strong></a></td>
                <td><?php echo e($contract->proposal->customer->name); ?></td>
                <td><?php echo e($contract->proposal->start_date); ?></td>
                <td><?php echo e($contract->proposal->price); ?></td>
                <td>
                    <?php if($contract->is_completed): ?>
                        Completed
                    <?php else: ?>
                        Not completed
                    <?php endif; ?>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>You do not have any signed contracts!</p>

    <?php endif; ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>