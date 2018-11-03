<?php $__env->startSection('title'); ?> Login <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <h1>Login</h1>

    <form action="" method="post" class="default-form border">


        <?php if(isset($error_message) && !empty($error_message)): ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>

            </div>

        <?php endif; ?>

        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" name="username" class="form-control" id="username" value="<?php echo e($username); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <?php echo csrf_field(); ?>


        <br>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

        <br>
        <a href="<?php echo e(config('auth.register_path')); ?>">Don't have an account?</a>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>