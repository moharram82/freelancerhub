<?php $__env->startSection('title'); ?> Edit My Profile <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>

    <div class="box">
        
        <h2>Edit My Profile</h2>

        <p>&nbsp;</p>

        <form action="<?php echo e(SELF); ?>?action=edit" method="post" enctype="multipart/form-data">

            <?php if(isset($errorMsg) && !empty($errorMsg)): ?>

                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMsg; ?>

                </div>

            <?php endif; ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo e($name); ?>">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" id="type">
                    <?php if($type == 'individual'): ?>
                    <option selected value="individual">Individual</option>
                    <?php else: ?>
                    <option value="individual">Individual</option>
                    <?php endif; ?>

                    <?php if($type == 'company'): ?>
                    <option selected value="company">Company</option>
                    <?php else: ?>
                    <option value="company">Company</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="city_id">Location</label>
                <select name="city_id" class="form-control" id="city_id">
                    <?php $__currentLoopData = \App\Models\City::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($city->id == $city_id): ?>
                        <option selected value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->city); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile (912300000)</label>
                <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo e($mobile); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" name="description" class="form-control" id="description"><?php echo e($description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture (jpg, 256x256)</label>
                <?php if(file_exists(PUBLICPATH . '/img/users/' . $customer->user->user_id . '.jpg')): ?>
                    <img style="width: 48px;" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($customer->user->user_id); ?>.jpg">
                    <label><input type="checkbox" name="del-pic" id="picture"> Delete Profile Picture</label>
                <?php else: ?>
                    <input type="file" name="picture" class="form-control-file" id="picture">
                <?php endif; ?>
            </div>

            <br>

            <?php echo csrf_field(); ?>


            <button type="submit" name="btnSave" class="btn btn-primary btn-lg btn-block">Save Profile</button>
        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>