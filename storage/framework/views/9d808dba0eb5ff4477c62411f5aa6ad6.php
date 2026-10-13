<?php $__env->startSection('title', 'Borrowing details'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('borrowings.index')); ?>" class="small text-decoration-none">← Borrowings</a>
        <h1 class="h2 mt-2 mb-0 text-brown">Borrowing details</h1>
    </div>
    <a href="<?php echo e(route('borrowings.edit', $borrowing)); ?>" class="btn btn-warning">Edit</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Borrowing information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="small text-secondary">Book</div>
                <div><a href="<?php echo e(route('books.show', $borrowing->book)); ?>" class="text-brown fw-semibold"><?php echo e($borrowing->book->title); ?></a></div>
            </div>
            <div class="col-md-6">
                <div class="small text-secondary">Member</div>
                <div><a href="<?php echo e(route('members.show', $borrowing->member)); ?>" class="text-brown"><?php echo e($borrowing->member->full_name); ?></a></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Borrow date</div>
                <div><?php echo e($borrowing->borrow_date->format('M j, Y')); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Due date</div>
                <div><?php echo e($borrowing->due_date->format('M j, Y')); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Return date</div>
                <div><?php echo e($borrowing->return_date?->format('M j, Y') ?? 'Not yet returned'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Status</div>
                <div>
                    <span class="badge <?php echo e($borrowing->status === 'Borrowed' ? 'text-bg-warning' : ($borrowing->status === 'Overdue' ? 'text-bg-danger' : 'text-bg-success')); ?>">
                        <?php echo e($borrowing->status); ?>

                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Author</div>
                <div><?php echo e($borrowing->book->author->name ?? '—'); ?></div>
            </div>
            <div class="col-md-4">
                <div class="small text-secondary">Category</div>
                <div><?php echo e($borrowing->book->category->name ?? '—'); ?></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/borrowings/show.blade.php ENDPATH**/ ?>