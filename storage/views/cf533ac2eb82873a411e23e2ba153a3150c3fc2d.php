<?php $__env->startSection('title'); ?> RFQs <?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-contents'); ?>
<div class="box">
    <h2>All Freelancers</h2>

    <?php if($rfqs->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $rfqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rfq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($rfq->firstname); ?> <?php echo e($rfq->lastname); ?></td>
                <td><?php echo e($rfq->category->sub_category); ?></td>
                <td>
                    <a href="<?php echo e(BASEURL); ?>/admin/freelancers.php?action=delete&freelancer_id=<?php echo e($rfq->id); ?>" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete: <?php echo e($rfq->firstname); ?> <?php echo e($rfq->lastname); ?>');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>No freelancers</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>