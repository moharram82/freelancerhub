<?php $__env->startSection('title'); ?> Package Title <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="row package-details">
        <div class="col-lg-8 package-desc">
            <div class="box">
                <div class="clearfix">
                    <h1>Package Title</h1>
                    <div class="specs">
                        <p>Starts at <span>SDG 10,000</span></p>
                        <p>Delivery <span>7 Days</span></p>
                    </div>
                </div>
                <div class="desc">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestiae voluptatum quis dolores maiores placeat necessitatibus cumque corporis veniam suscipit omnis ipsum, doloribus quibusdam maxime repellendus perferendis numquam voluptate nam.</p>
                </div>
                <a class="btn btn-success btn-lg btn-block" href="<?php echo e(BASEURL); ?>/checkout.php?package_id=1&customer_id=1">Order</a>
            </div>
        </div>
        <div class="col-lg-4 freelancer-info">
            <div class="box clearfix">
                <a href="<?php echo e(BASEURL); ?>/freelancers/freelancer.php?freelancer_id=2">
                    <img src=''>
                    <h3>Freelancer Name</h3>
                    <p>UI/UX Designer</p>
                </a>
                
                <a class="btn btn-outline-secondary btn-block" href="<?php echo e(BASEURL); ?>/messages.php">Contact</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>