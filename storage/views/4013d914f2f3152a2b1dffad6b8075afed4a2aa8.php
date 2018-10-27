<?php $__env->startSection('title'); ?> Projects Hub <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="box">
        <h1>Projects Hub</h1>
        <p style="font-size: 20px; font-style: italic;">Here you can find all project requests published by customers, feel free to browse the list and apply to any project you find interesting to you!</p>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Title</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Budget</th>
                            <th>Added On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?php echo e(BASEURL); ?>/project.php?project_id=1">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo e(BASEURL); ?>/project.php?project_id=1">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="#">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="#">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="#">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="#">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                        <tr>
                            <td><a href="#">Project Title</a></td>
                            <td>Zain Telecom</td>
                            <td>UI/UX Design</td>
                            <td>SDG 15,000</td>
                            <td>12 Oct 2018</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>