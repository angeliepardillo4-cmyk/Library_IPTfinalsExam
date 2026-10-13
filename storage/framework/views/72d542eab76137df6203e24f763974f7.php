<?php $__env->startSection('title', 'Books'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1">Books</h1>
            <p class="text-secondary mb-0">Browse and manage the library collection.</p>
        </div>
        <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary">+ Add book</a>
    </div>
    <div class="card border-0 shadow-sm bg-white-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>ISBN</th>
                        <th>Quantity</th>
                        <th>Available</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><a href="<?php echo e(route('books.show', $book)); ?>"
                                    class="fw-semibold text-decoration-none text-brown"><?php echo e($book->title); ?></a></td>
                            <td><?php echo e($book->author->name ?? '—'); ?></td>
                            <td><?php echo e($book->category->name ?? '—'); ?></td>
                            <td><?php echo e($book->isbn ?? '—'); ?></td>
                            <td><?php echo e($book->quantity); ?></td>
                            <td><?php echo e($book->quantity - $book->borrowings_count); ?></td>
                            <td class="text-end text-nowrap">
                                <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this book? Books with borrowings cannot be deleted.')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-5">No books yet. Add your first book.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/books/index.blade.php ENDPATH**/ ?>