<?php $__env->startSection('title'); ?> Contracts <?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-contents'); ?>
<div class="box">
    <h2>All Contracts</h2>

    <?php if($contracts->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Developer</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/admin/contract.php?contract_id=<?php echo e($contract->id); ?>"><?php echo e($contract->proposal->title); ?></a></td>
                <td><?php echo e($contract->proposal->customer->name); ?></td>
                <td><?php echo e($contract->proposal->freelancer->firstname); ?> <?php echo e($contract->proposal->freelancer->lastname); ?></td>
                <td><?php echo e(number_format($contract->proposal->price, 0)); ?></td>
                <td>
                    <?php if($contract->is_completed): ?>
                        Completed
                    <?php else: ?>
                        Not-completed
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(BASEURL); ?>/admin/contracts.php?action=delete&contract_id=<?php echo e($contract->id); ?>" style="color: #ff0000;" title="Delete Contract" onclick="return confirm('Are you sure you want to delete contract: <?php echo e($contract->proposal->title); ?>');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>No contracts!</p>

    <?php endif; ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>