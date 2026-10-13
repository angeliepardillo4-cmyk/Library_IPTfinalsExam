<?php $__env->startSection('title', $author->name); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('authors.index')); ?>" class="small text-decoration-none">← Authors</a>
        <h1 class="h2 mt-2 mb-0 text-brown"><?php echo e($author->name); ?></h1>
    </div>
    <a href="<?php echo e(route('authors.edit', $author)); ?>" class="btn btn-warning">Edit author</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Author information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <?php $__currentLoopData = ['Email' => $author->email ?? '—', 'Phone' => $author->phone ?? '—']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="small text-secondary"><?php echo e($label); ?></div>
                    <div><?php echo e($value); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12">
                <div class="small text-secondary">Biography</div>
                <div><?php echo e($author->bio ?? 'None recorded'); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Books by this author</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>ISBN</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $author->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('books.show', $book)); ?>"><?php echo e($book->title); ?></a></td>
                        <td><?php echo e($book->category->name ?? '—'); ?></td>
                        <td><?php echo e($book->isbn ?? '—'); ?></td>
                        <td><?php echo e($book->quantity); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="text-center text-secondary py-4">No books recorded for this author.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/authors/show.blade.php ENDPATH**/ ?>