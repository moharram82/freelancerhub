<?php $__env->startSection('title'); ?> Packages <?php $__env->stopSection(); ?>

<?php $__env->startSection('freelancer-contents'); ?>
    <div class="box">

        <h2>All Packages</h2>

        <br>

        <p><a class="btn btn-primary" href="<?php echo e(SELF); ?>?action=new">Add Package</a></p>

        <?php if($packages->count()): ?>

            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Delivery</th>
                    <th>Start Price</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>

                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><a href="<?php echo e(BASEURL); ?>/freelancers/package.php?package_id=<?php echo e($package->id); ?>"><strong><?php echo e($package->title); ?></strong></a></td>
                        <td><?php echo e($package->delivery); ?> days</td>
                        <td>SDG <?php echo e(number_format($package->price, 0)); ?></td>
                        <td>
                            <a href="<?php echo e(BASEURL); ?>/freelancers/packages.php?action=edit&package_id=<?php echo e($package->id); ?>" style="color: #5c6b78;" title="Edit Package"><i class="far fa-edit"></i></a> |
                            <a href="<?php echo e(BASEURL); ?>/freelancers/packages.php?action=delete&package_id=<?php echo e($package->id); ?>" style="color: #ff0000;" title="Delete Package" onclick="return confirm('Are you sure you want to delete the package: <?php echo e($package->title); ?>');"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

        <?php else: ?>

            <p>You do not have any packages yet, create one.</p>

        <?php endif; ?>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>