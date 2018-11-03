<?php $__env->startSection('title'); ?> Contract Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('freelancer-contents'); ?>
<div class="box">

    <h2><?php echo e($contract->proposal->title); ?></h2>

    <table class="meta-data">
        <tr>
            <td>Customer</td>
            <td class="data"><?php echo e($contract->proposal->customer->name); ?></td>
        </tr>
        <tr>
            <td>Start</td>
            <td class="data"><?php echo e($contract->proposal->start_date); ?></td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG <?php echo e(number_format($contract->proposal->price, 0)); ?></td>
        </tr>
        <tr>
            <td>Proposal</td>
            <td class="data"><a href="<?php echo e(BASEURL); ?>/freelancers/proposal.php?proposal_id=<?php echo e($contract->proposal->id); ?>"><?php echo e($contract->proposal->title); ?></a></td>
        </tr>
        <tr>
            <td>Signed on</td>
            <td class="data"><?php echo e($contract->created_at); ?></td>
        </tr>
    </table>

    <hr>

    <?php echo $contract->proposal->details; ?>


    
    

    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>