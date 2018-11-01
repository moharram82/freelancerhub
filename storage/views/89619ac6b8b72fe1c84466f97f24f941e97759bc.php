<?php $__env->startSection('customer-contents'); ?>
<div class="box">
    <h2><?php echo e($proposal->title); ?></h2>

    <table class="meta-data">
        <tr>
            <td>Developer</td>
            <td class="data"><a href="<?php echo e(BASEURL); ?>/freelancers/freelancer.php?freelancer_id=<?php echo e($proposal->freelancer_id); ?>"><?php echo e($proposal->freelancer->firstname); ?> <?php echo e($proposal->freelancer->lastname); ?></a></td>
        </tr>
        <tr>
            <td>Delivery</td>
            <td class="data"><?php echo e($proposal->delivery); ?> days</td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG<?php echo e($proposal->price); ?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td class="data"><?php echo e($proposal->created_at); ?></td>
        </tr>
    </table>

    <div>
        <h3>Details</h3>

        <?php echo $proposal->details; ?>


    </div>

    <?php if(! $proposal->contract): ?>

    <hr>

    <form action="<?php echo e(SELF); ?>?proposal_id=<?php echo e($proposal->id); ?>" method="post" onsubmit="return confirm('Are you sure you want to sign the contract with <?php echo e($proposal->freelancer->firstname); ?> <?php echo e($proposal->freelancer->lastname); ?>?')">

        <input type="hidden" name="_sign" value="1">

        <?php echo csrf_field(); ?>


        <button type="submit" name="btnSign" value="register" class="btn btn-success btn-lg btn-block">I accept all terms and would like to sign the contract</button>
    </form>

    <?php else: ?>

    <hr>

    <p class="text-center">You have already signed a <a href="<?php echo e(BASEURL); ?>/customers/contract.php?contract_id=<?php echo e($proposal->contract->id); ?>">contract</a> for this proposal.</p>

    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>