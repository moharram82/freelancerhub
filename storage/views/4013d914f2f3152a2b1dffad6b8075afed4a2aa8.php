<?php $__env->startSection('title'); ?> Projects Hub <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <h1 class="text-center">Projects Hub</h1>

    <div class="row">

        <div class="col-12 col-md-2 options">
            <div class="sidebar">

                <h3>Filter By</h3>

                <div class="sidebar-section">
                    <h4>Category</h4>
                    <ul class="section-nav">
                        <?php $__currentLoopData = \App\Models\Category::all()->sortBy('sub_category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(BASEURL); ?>/projects.php?filter_by=category&value=<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-10 results">

            <h3 style="color: #959ea9; font-size: 24px; font-weight: 400;" class="mb-4"><?php echo e($results_title); ?></h3>

            <div class="box">

                <?php if($rfqs->count()): ?>

                    <div class="col-12">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Title</th>
                                <th>Customer</th>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Published</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php $__currentLoopData = $rfqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rfq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><a href="<?php echo e(BASEURL); ?>/rfq.php?rfq_id=<?php echo e($rfq->id); ?>"><?php echo e($rfq->title); ?></a></td>
                                    <td><?php echo e($rfq->customer->name); ?></td>
                                    <td><?php echo e($rfq->category->sub_category); ?></td>
                                    <td>SDG <?php echo e(number_format($rfq->budget, 0)); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::make($rfq->created_at)->diffForHumans()); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>

                    </div>

                <?php else: ?>

                    <p>No published projects for now!</p>

                <?php endif; ?>

            </div>
        </div>

    </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>