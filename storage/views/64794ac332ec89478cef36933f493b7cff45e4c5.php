<?php $__env->startSection('title'); ?> Contract Details <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>
<div class="box">

    <h2><?php echo e($contract->proposal->title); ?></h2>

    <table class="meta-data">
        <tr>
            <td>Developer</td>
            <td class="data"><a href="<?php echo e(BASEURL); ?>/freelancer.php?freelancer_id=<?php echo e($contract->proposal->freelancer_id); ?>"><?php echo e($contract->proposal->freelancer->firstname); ?> <?php echo e($contract->proposal->freelancer->lastname); ?></a></td>
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
            <td class="data"><a href="<?php echo e(BASEURL); ?>/customers/proposal.php?proposal_id=<?php echo e($contract->proposal->id); ?>"><?php echo e($contract->proposal->title); ?></a></td>
        </tr>
        <tr>
            <td>Signed on</td>
            <td class="data"><?php echo e($contract->created_at); ?></td>
        </tr>
    </table>

    <hr>

    <?php echo $contract->proposal->details; ?>


    <?php if(! $contract->is_completed): ?>

        <hr>

        <a href="<?php echo e(BASEURL); ?>/checkout.php?contract_id=<?php echo e($contract->id); ?>" class="btn btn-success btn-lg btn-block">Finalize Contract</a>

    <?php else: ?>

        <hr>

        <p style="color: limegreen;" class="text-center">This contract has been finalized.</p>

    <?php endif; ?>

    
    

    
        
            
                
                    
                        
                        
                    
                
                
            

            
                
                    
                    
                    
                
            
        
        
            
                
                    
                        
                        
                    
                
                
            

            
                
                    
                    
                    
                
            
        
        
            
                
                    
                        
                        
                    
                
                
            

            
                
                    
                    
                    
                
            
        
    

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>