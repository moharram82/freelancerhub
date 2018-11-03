<?php $__env->startSection('title'); ?> Proposals <?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-contents'); ?>
<div class="box">
    <h2>All Issued Proposals</h2>

    

    <?php if($proposals->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/admin/proposal.php?proposal_id=<?php echo e($proposal->id); ?>"><?php echo e($proposal->title); ?></a></td>
                <td>SDG <?php echo e(number_format($proposal->price, 0)); ?></td>
                <td>
                    <a href="<?php echo e(BASEURL); ?>/admin/proposals.php?action=delete&proposal_id=<?php echo e($proposal->id); ?>" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete the proposal: <?php echo e($proposal->title); ?>');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>No proposals!</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>