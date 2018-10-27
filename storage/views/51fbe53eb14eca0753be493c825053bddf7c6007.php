<?php $__env->startSection('title'); ?> Project Title <?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <div class="row">
        <div class="col-lg-8 project-details">
            <div class="box">
                <h1>Project Title</h1>
                <p class="category">UI/UX Design</p>
                <p class="budget">Budget <span>SDG 15,000</span></p>
                <div class="desc">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet tenetur ipsa mollitia incidunt rem dignissimos eos atque libero alias natus impedit pariatur laboriosam ipsum quo quisquam error, velit temporibus.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet tenetur ipsa mollitia incidunt rem dignissimos eos atque libero alias natus impedit pariatur laboriosam ipsum quo quisquam error, velit temporibus.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet tenetur ipsa mollitia incidunt rem dignissimos eos atque libero alias natus impedit pariatur laboriosam ipsum quo quisquam error, velit temporibus.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet tenetur ipsa mollitia incidunt rem dignissimos eos atque libero alias natus impedit pariatur laboriosam ipsum quo quisquam error, velit temporibus.</p>

                    <a class="btn btn-success btn-lg btn-block" href="#">Apply!</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 customer-info">
            <div class="box">
                <h3>Customer Name</h3>
                <p class="location"><i class="fas fa-map-marker-alt"></i> &nbsp; Khartoum</p>
                <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat adipisci odio cum nam dolor pariatur voluptas atque ducimus odit. Unde aperiam nihil obcaecati deserunt doloremque odit maiores alias natus quasi!</p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>