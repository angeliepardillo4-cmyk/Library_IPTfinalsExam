<?php $__env->startSection('title', 'Authors'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Authors</h1>
        <p class="text-secondary mb-0">Manage book authors and their details.</p>
    </div>
    <a href="<?php echo e(route('authors.create')); ?>" class="btn btn-primary">+ Add author</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Books</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('authors.show', $author)); ?>" class="fw-semibold text-decoration-none text-brown"><?php echo e($author->name); ?></a></td>
                        <td><?php echo e($author->email ?? '—'); ?></td>
                        <td><?php echo e($author->phone ?? '—'); ?></td>
                        <td><?php echo e($author->books_count); ?></td>
                        <td class="text-end text-nowrap">
                            <a href="<?php echo e(route('authors.edit', $author)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('authors.destroy', $author)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this author? Authors with books cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-5">No authors yet. Add your first author.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/authors/index.blade.php ENDPATH**/ ?>