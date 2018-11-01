<?php $__env->startSection('customer-contents'); ?>

    <div class="box">
        
        <h2>My Profile</h2>

        <br>

        <?php if(file_exists(PUBLICPATH . '/img/users/' . $customer->user->user_id . '.jpg')): ?>
            <img style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($customer->user->user_id); ?>.jpg">
        <?php else: ?>
            <img style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
        <?php endif; ?>

        <table class="data-wrapper">

            <tr>
                <td class="data-label">Name</td>
                <td><?php echo e($customer->name); ?></td>
            </tr>

            <tr>
                <td class="data-label">Location</td>
                <td>
                    <?php if($customer->city): ?>
                        <?php echo e($customer->city->city); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Mobile</td>
                <td>
                    <?php if($customer->mobile): ?>
                        (+249) <?php echo e($customer->mobile); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Type</td>
                <td><?php echo e($customer->type); ?></td>
            </tr>

        </table>

        <h3>Description</h3>

        <p><?php echo e($customer->description); ?></p>

        <hr>

        <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo e(BASEURL); ?>/customers/profile.php?action=edit">Edit Profile</a></p>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>