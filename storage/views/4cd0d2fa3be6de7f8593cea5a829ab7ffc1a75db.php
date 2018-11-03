<?php $__env->startSection('title'); ?> Checkout <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <h1>Checkout</h1>

    <form action="<?php echo e(SELF); ?>?contract_id=<?php echo e($contract->id); ?>" method="post" class="default-form border">


        <?php if(isset($errorMsg) && !empty($errorMsg)): ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $errorMsg; ?>

            </div>

        <?php endif; ?>

        <h4>Payment Details</h4>

            <table class="data-wrapper my-3">
                <tr>
                    <td>Amount</td>
                    <td class="data-label">SDG <?php echo e(number_format($contract->proposal->price, 2)); ?></td>
                </tr>
                <tr>
                    <td>Beneficiary</td>
                    <td class="data-label"><?php echo e($contract->proposal->freelancer->firstname); ?> <?php echo e($contract->proposal->freelancer->lastname); ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td class="data-label">Payment for the contract No.: <?php echo e($contract->id); ?></td>
                </tr>
            </table>

        <?php echo csrf_field(); ?>


        <input type="hidden" name="amount" value="<?php echo e($contract->proposal->price); ?>">

        <button type="submit" name="btnPay" value="Pay" class="btn btn-success btn-lg btn-block">Confirm Payment?</button>

    </form>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>