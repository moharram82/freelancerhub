<?php $__env->startSection('freelancer-contents'); ?>

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
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo e($firstname); ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo e($lastname); ?>">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    <?php $__currentLoopData = \App\Models\SubCategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->id == $category_id): ?>
                        <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate">Birth Date (yyyy-mm-dd)</label>
                <input type="date" name="birthdate" class="form-control" id="birthdate" value="<?php echo e($birthdate); ?>">
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
                <label for="languages">Languages (comma separated)</label>
                <input type="text" name="languages" class="form-control" id="languages" value="<?php echo e($languages); ?>">
            </div>
            <div class="form-group">
                <label for="response_time">Response Time (in hours)</label>
                <input type="number" name="response_time" class="form-control" id="response_time" value="<?php echo e($response_time); ?>">
            </div>
            <div class="form-group">
                <label for="experience">Experience (in years)</label>
                <input type="number" name="experience" class="form-control" id="experience" value="<?php echo e($experience); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="10" name="description" class="form-control" id="description"><?php echo e($description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="picture">Profile Picture (jpg, 256x256)</label>
                <?php if(file_exists(PUBLICPATH . '/img/users/' . $freelancer->user->user_id . '.jpg')): ?>
                    <img style="width: 48px;" src="<?php echo e(BASEURL); ?>/img/users/<?php echo e($freelancer->user->user_id); ?>.jpg">
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
<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>