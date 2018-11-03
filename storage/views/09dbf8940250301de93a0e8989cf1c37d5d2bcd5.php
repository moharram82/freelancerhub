<?php $__env->startSection('title'); ?> FreelancerHub - Home <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="jumbotron">
        <h1 class="display-4">Welcome to FreelancerHub!</h1>
        <p class="lead">Save your time and work from <span>everywhere!</span></p>
        <p class="sub-lead">Hire Expert Freelancers to Get Your Job Done Perfectly.</p>
        <a class="btn btn-success btn-lg" href="<?php echo e(BASEURL); ?>/register.php" role="button">Join Us</a>
    </div>

    <div class="explore-section">

        <h2>Explore the market place</h2>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="show-card">
                    <i class="fas fa-paint-brush"></i>
                    <h3>Designing</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam asperiores beatae culpa dignissimos eos et facilis fuga incidunt maiores minus, non odio officia quo sed ullam ut voluptatibus voluptatum.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="show-card">
                    <i class="fas fa-code"></i>
                    <h3>Developing</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam asperiores beatae culpa dignissimos eos et facilis fuga incidunt maiores minus, non odio officia quo sed ullam ut voluptatibus voluptatum.</p>
                </div>
            </div>
        </div>

    </div>

    <div class="why-section">

        <h2>Why is it so special?</h2>

        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="show-card">
                    <i class="fab fa-etsy"></i>
                    <h3>It's easy to use</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam asperiores beatae culpa dignissimos eos et facilis fuga incidunt maiores minus, non odio officia quo sed ullam ut voluptatibus voluptatum.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="show-card">
                    <i class="fab fa-connectdevelop"></i>
                    <h3>Connect with experts</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam asperiores beatae culpa dignissimos eos et facilis fuga incidunt maiores minus, non odio officia quo sed ullam ut voluptatibus voluptatum.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="show-card">
                    <i class="fas fa-hand-peace"></i>
                    <h3>100% Guaranteed</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam asperiores beatae culpa dignissimos eos et facilis fuga incidunt maiores minus, non odio officia quo sed ullam ut voluptatibus voluptatum.</p>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>