<?php $__env->startSection('freelancer-contents'); ?>

    <div class="box">
        
        <h2>My Profile</h2>

        <br>

        <?php if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg')): ?>
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($freelancer->user->user_id); ?>.jpg">
        <?php else: ?>
            <img class="float-right mt-5 rounded-circle" style="max-width: 256px;" src="<?php echo e(BASEURL); ?>/img/users/default.jpg">
        <?php endif; ?>

        <table class="data-wrapper">

            <tr>
                <td class="data-label">First Name</td>
                <td><?php echo e($freelancer->firstname); ?></td>
            </tr>

            <tr>
                <td class="data-label">Last Name</td>
                <td><?php echo e($freelancer->lastname); ?></td>
            </tr>

            <tr>
                <td class="data-label">Birth Date</td>
                <td>
                    <?php if($freelancer->birthdate): ?>
                    <?php echo e(\Carbon\Carbon::make($freelancer->birthdate)->format('d M Y')); ?>

                    <?php else: ?>
                    -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Location</td>
                <td>
                    <?php if($freelancer->city): ?>
                        <?php echo e($freelancer->city->city); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Languages</td>
                <td>
                    <?php if($freelancer->languages): ?>
                        <?php echo e($freelancer->languages); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Mobile</td>
                <td>
                    <?php if($freelancer->mobile): ?>
                    (+249) <?php echo e($freelancer->mobile); ?>

                    <?php else: ?>
                    -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Experience</td>
                <td>
                    <?php if($freelancer->experience): ?>
                        <?php echo e($freelancer->experience); ?> years
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Response Time</td>
                <td>
                    <?php if($freelancer->response_time): ?>
                        <?php echo e($freelancer->response_time); ?> hours
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="data-label">Category</td>
                <td>
                    <?php if($freelancer->category): ?>
                        <?php echo e($freelancer->category->job_title); ?>

                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>

        </table>

        <h3>Description</h3>

        <p><?php echo e($freelancer->description); ?></p>

        <hr>

        <p><a class="btn btn-primary btn-lg btn-block" href="<?php echo e(BASEURL); ?>/freelancers/profile.php?action=edit">Edit Profile</a></p>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>