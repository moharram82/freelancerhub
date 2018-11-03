<?php $__env->startSection('title'); ?> RFQs <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>
<div class="box">
    <h2>All RFQs</h2>

    

    <?php if($rfqs->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Category</th>
                <th>Budget</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $rfqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rfq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/customers/rfq.php?rfq_id=<?php echo e($rfq->id); ?>"><?php echo e($rfq->title); ?></a></td>
                <td><?php echo e($rfq->freelancer->firstname); ?> <?php echo e($rfq->freelancer->lastname); ?></td>
                <td><?php echo e($rfq->category->sub_category); ?></td>
                <td>SDG <?php echo e(number_format($rfq->budget, 0)); ?></td>
                <td>
                    
                    <a href="<?php echo e(BASEURL); ?>/customers/rfqs.php?action=delete&rfq_id=<?php echo e($rfq->id); ?>" style="color: #ff0000;" title="Delete RFQ" onclick="return confirm('Are you sure you want to delete the RFQ: <?php echo e($rfq->title); ?>');"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>You do not have any request for proposal!</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>