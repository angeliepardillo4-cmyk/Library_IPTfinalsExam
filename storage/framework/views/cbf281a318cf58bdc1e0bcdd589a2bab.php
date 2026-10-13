<?php $__env->startSection('title', $book->title); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('books.index')); ?>" class="small text-decoration-none">← Books</a>
        <h1 class="h2 mt-2 mb-0 text-brown"><?php echo e($book->title); ?></h1>
    </div>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-warning">Edit</a>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Book information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="small text-secondary">Author</div>
                <div><a href="<?php echo e(route('authors.show', $book->author)); ?>" class="text-brown"><?php echo e($book->author->name ?? '—'); ?></a></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Category</div>
                <div><?php echo e($book->category->name ?? '—'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">ISBN</div>
                <div><?php echo e($book->isbn ?? '—'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Published date</div>
                <div><?php echo e($book->published_date?->format('M j, Y') ?? '—'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Pages</div>
                <div><?php echo e($book->pages ?? '—'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Quantity</div>
                <div><?php echo e($book->quantity); ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Available</div>
                <div class="fw-semibold"><?php echo e($book->quantity - $book->borrowings->whereIn('status', ['Borrowed', 'Overdue'])->count()); ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Borrowed</div>
                <div class="fw-semibold"><?php echo e($book->borrowings->whereIn('status', ['Borrowed', 'Overdue'])->count()); ?></div>
            </div>
            <div class="col-12">
                <div class="small text-secondary">Description</div>
                <div><?php echo e($book->description ?? 'No description available.'); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h5 mb-0">Borrowing history</h2>
        <a href="<?php echo e(route('borrowings.create', ['book_id' => $book->id])); ?>" class="btn btn-sm btn-primary">Borrow</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Member</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $book->borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($borrowing->member->full_name); ?></td>
                        <td><?php echo e($borrowing->borrow_date->format('M j, Y')); ?></td>
                        <td><?php echo e($borrowing->due_date->format('M j, Y')); ?></td>
                        <td><?php echo e($borrowing->return_date?->format('M j, Y') ?? '—'); ?></td>
                        <td><?php echo e($borrowing->status); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-4">No borrowings recorded.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/books/show.blade.php ENDPATH**/ ?>