<?php $__env->startSection('title'); ?> Customer Profile <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <h1><?php echo e(explode('@', auth()->username())[0]); ?>'s Profile</h1>

    <div class="row">

        <div class="col-12 col-md-2">
            <div class="sidebar">
                <div class="sidebar-section">
                    <h4>Main</h4>
                    <ul class="section-nav">
                        <li><a href="<?php echo e(BASEURL); ?>/customers/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                        <li><a href="<?php echo e(BASEURL); ?>/customers/rfqs.php"><i class="fas fa-question"></i>&nbsp;&nbsp;&nbsp; RFQs</a></li>
                        <li><a href="<?php echo e(BASEURL); ?>/customers/proposals.php"><i class="fas fa-file-invoice-dollar"></i>&nbsp;&nbsp;&nbsp; Proposals</a></li>
                        <li><a href="<?php echo e(BASEURL); ?>/customers/contracts.php"><i class="fas fa-project-diagram"></i> Contracts</a></li>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Account</h4>
                    <ul class="section-nav">
                        <li><a href="<?php echo e(BASEURL); ?>/customers/profile.php"><i class="fas fa-address-card"></i> Profile</a></li>
                        <li><a href="<?php echo e(BASEURL); ?>/customers/balance.php"><i class="far fa-credit-card"></i> Balance</a></li>
                        <li><a href="<?php echo e(config('auth.logout_path')); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10">
            <?php echo $__env->yieldContent('customer-contents'); ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>