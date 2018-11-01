<?php $__env->startSection('customer-contents'); ?>
<div class="box">
    <h2>All Received Proposals</h2>

    <?php if($proposals->count()): ?>

    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>Title</th>
                <th>Developer</th>
                <th>Delivery</th>
                <th>Cost</th>
                <th>Received</th>
            </tr>
        </thead>

        <tbody>

            <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><a href="<?php echo e(BASEURL); ?>/customers/proposal.php?proposal_id=<?php echo e($proposal->id); ?>"><strong><?php echo e($proposal->title); ?></strong></a></td>
                    <td><a href="<?php echo e(BASEURL); ?>/freelancers/freelancer.php?freelancer_id=<?php echo e($proposal->freelancer_id); ?>"><?php echo e($proposal->freelancer->firstname); ?> <?php echo e($proposal->freelancer->lastname); ?></a></td>
                    <td><?php echo e($proposal->id); ?> days</td>
                    <td>SDG<?php echo e($proposal->price); ?></td>
                    <td><?php echo e(\Carbon\Carbon::make($proposal->created_at)->diffForHumans()); ?></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

    <?php else: ?>

        <p>You do not have any received proposals!</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>