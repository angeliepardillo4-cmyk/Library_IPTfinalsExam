<?php $__env->startSection('title', 'Categories'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Categories</h1>
        <p class="text-secondary mb-0">Organize books by genre and subject.</p>
    </div>
    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">+ Add category</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Category</th>
                    <th class="text-end">Books</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('categories.show', $category)); ?>" class="fw-semibold text-decoration-none text-brown"><?php echo e($category->name); ?></a></td>
                        <td class="text-end"><?php echo e($category->books_count); ?></td>
                        <td class="text-end text-nowrap">
                            <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category? Categories with books cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3" class="text-center text-secondary py-5">No categories yet. Add your first category.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/categories/index.blade.php ENDPATH**/ ?>