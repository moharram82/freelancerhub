<?php $__env->startSection('title'); ?> Browse the Hub <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <h1 class="text-center">Freelancers' Hub</h1>

    <div class="row">
        <div class="col-12 col-md-2 options">
            <div class="sidebar">
                
                <h3>Filter By</h3>
                
                <div class="sidebar-section">
                    <h4>Category</h4>
                    <ul class="section-nav">
                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(BASEURL); ?>/hub.php?filter_by=category&value=<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Location</h4>
                    <ul class="section-nav">
                        <?php $__currentLoopData = \App\Models\City::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(BASEURL); ?>/hub.php?filter_by=location&value=<?php echo e($city->id); ?>"><?php echo e($city->city); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="sidebar-section">
                    <h4>Skill</h4>
                    <ul class="section-nav">
                        <?php $__currentLoopData = \App\Models\Skill::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(BASEURL); ?>/hub.php?filter_by=skill&value=<?php echo e($skill->id); ?>"><?php echo e($skill->skill_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10 results">

            <h3 class="mb-4"><?php echo e($results_title); ?></h3>

            <div class="row freelancers">

                <?php $__currentLoopData = $freelancers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-4">
                    <div class="box freelancer-card">
                        <?php if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg')): ?>
                        <img src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($freelancer->user->user_id); ?>.jpg">
                        <?php else: ?>
                        <img src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
                        <?php endif; ?>
                        <h3><a href="<?php echo e(BASEURL); ?>/freelancer.php?freelancer_id=<?php echo e($freelancer->id); ?>"><?php echo e($freelancer->firstname); ?> <?php echo e($freelancer->lastname); ?></a></h3>
                        <p class="category"><?php echo e($freelancer->category->job_title); ?></p>
                        <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; <?php echo e($freelancer->city->city); ?></p>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <?php if($reviews[$freelancer->id] !== 0): ?>
                                <span><?php echo e($reviews[$freelancer->id]); ?></span>
                            <?php else: ?>
                                <span>N/A</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>