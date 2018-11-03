<?php $__env->startSection('title'); ?> Proposals <?php $__env->stopSection(); ?>

<?php $__env->startSection('freelancer-contents'); ?>
<div class="box">
    <h2>All Issued Proposals</h2>

    

    <?php if($proposals->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Customer</th>
                <th>Delivery</th>
                <th>Cost</th>
            </tr>
        </thead>

        <tbody>

        <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><a href="<?php echo e(BASEURL); ?>/freelancers/proposal.php?proposal_id=<?php echo e($proposal->id); ?>"><?php echo e($proposal->title); ?></a></td>
                <td><?php echo e($proposal->customer->name); ?></td>
                <td><?php echo e($proposal->delivery); ?> days</td>
                <td>SDG <?php echo e(number_format($proposal->price, 0)); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

    <p>You do not have any issued proposals!</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>