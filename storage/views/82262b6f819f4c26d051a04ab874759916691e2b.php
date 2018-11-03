<?php $__env->startSection('title'); ?> My Profile <?php $__env->stopSection(); ?>

<?php $__env->startSection('admin-contents'); ?>

    <div class="box">
        
        <h2>My Profile</h2>

        <br>

        <?php if(file_exists(PUBLICPATH . '/img/users/' . $user->user_id . '.jpg')): ?>
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($user->user_id); ?>.jpg">
        <?php else: ?>
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
        <?php endif; ?>

        <table class="data-wrapper">

            <tr>
                <td class="data-label">Username</td>
                <td><?php echo e($user->username); ?></td>
            </tr>

        </table>

        <hr>

        <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo e(BASEURL); ?>/admin/profile.php?action=edit">Edit Profile</a></p>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>