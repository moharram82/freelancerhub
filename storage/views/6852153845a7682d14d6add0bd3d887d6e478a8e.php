<?php $__env->startSection('title'); ?> New RFQ <?php $__env->stopSection(); ?>

<?php $__env->startSection('customer-contents'); ?>
<div class="box">

    <h2>Create New RFQ</h2>

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
            <label for="budget">Budget (Estimate)</label>
            <input type="number" name="budget" class="form-control" id="budget" value="<?php echo e($budget); ?>">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id">
                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->id == $category_id): ?>
                        <option selected value="<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->sub_category); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea rows="10" name="details" class="form-control" id="details"><?php echo e($details); ?></textarea>
        </div>

        <p></p>

        <?php echo csrf_field(); ?>


        <button type="submit" name="btnAdd" class="btn btn-primary btn-lg btn-block">Send RFQ</button>
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

<?php echo $__env->make('customer.partials.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>