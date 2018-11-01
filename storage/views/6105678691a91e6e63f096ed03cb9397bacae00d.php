<?php $__env->startSection('freelancer-contents'); ?>
    <div class="box">

        <h2>New Package</h2>

        <br>

        <form action="<?php echo e(SELF); ?>?action=new" method="post">


            <?php if(isset($errorMsg) && !empty($errorMsg)): ?>

                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMsg; ?>

                </div>

            <?php endif; ?>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo e($title); ?>">
            </div>
            <div class="form-group">
                <label for="price">Start Price</label>
                <input type="number" name="price" class="form-control" id="price" value="<?php echo e($price); ?>">
            </div>
            <div class="form-group">
                <label for="delivery">Delivery (in days)</label>
                <input type="number" name="delivery" class="form-control" id="delivery" value="<?php echo e($delivery); ?>">
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea rows="10" name="details" class="form-control" id="details"><?php echo e($details); ?></textarea>
            </div>

            <p></p>

            <?php echo csrf_field(); ?>


            <button type="submit" name="btnAdd" class="btn btn-primary btn-lg btn-block">Add Package</button>
        </form>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(BASEURL); ?>/js/vendor/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#details' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('freelancer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>