<?php $__env->startSection('title'); ?> Projects Hub <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="box">

        <h1>Projects Hub</h1>

        <p style="color: #859399;font-size: 20px; font-style: italic;">Here you can find all project requests published by customers, feel free to browse the list and apply to any project you find interesting to you!</p>

        <div class="row">

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
                            <td><a href="<?php echo e(BASEURL); ?>/rfq.php?rfq_id=1"><?php echo e($rfq->title); ?></a></td>
                            <td><?php echo e($rfq->customer->name); ?></td>
                            <td><?php echo e($rfq->category->sub_category); ?></td>
                            <td>SDG<?php echo e($rfq->budget); ?></td>
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

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>