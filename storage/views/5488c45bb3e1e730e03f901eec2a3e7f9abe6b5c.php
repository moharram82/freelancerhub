<?php $__env->startSection('customer-contents'); ?>
<div class="box">
    <h2>All Contracts</h2>

    <?php if($contracts->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Start Date</th>
                <th>Cost</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/customers/contract.php?contract_id=<?php echo e($contract->id); ?>"><strong><?php echo e($contract->proposal->title); ?></strong></a></td>
                <td><a href="<?php echo e(BASEURL); ?>/freelancers/freelancer.php?freelancer_id=<?php echo e($contract->proposal->freelancer_id); ?>"><?php echo e($contract->proposal->freelancer->firstname); ?> <?php echo e($contract->proposal->freelancer->lastname); ?></a></td>
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
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>