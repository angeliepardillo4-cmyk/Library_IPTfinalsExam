<?php $__env->startSection('title', 'Add book'); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h1 class="h4 mb-0 text-brown">Add book</h1>
            </div>
            <div class="card-body p-4">
                <?php echo $__env->make('shared.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if($authors->isEmpty() || $categories->isEmpty()): ?>
                    <div class="alert alert-warning">
                        Add at least one author and one category before adding a book.
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('books.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('books._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary" <?php if($authors->isEmpty() || $categories->isEmpty()): echo 'disabled'; endif; ?>>Save book</button>
                        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/books/create.blade.php ENDPATH**/ ?>