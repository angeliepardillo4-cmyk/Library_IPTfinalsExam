<?php $__env->startSection('title', 'Borrowings'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Borrowings</h1>
        <p class="text-secondary mb-0">Track all book borrowing activity.</p>
    </div>
    <a href="<?php echo e(route('borrowings.create')); ?>" class="btn btn-primary">+ New borrowing</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Book</th>
                    <th>Member</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('books.show', $borrowing->book)); ?>" class="fw-semibold text-decoration-none text-brown"><?php echo e($borrowing->book->title); ?></a></td>
                        <td><?php echo e($borrowing->member->full_name); ?></td>
                        <td><?php echo e($borrowing->borrow_date->format('M j, Y')); ?></td>
                        <td><?php echo e($borrowing->due_date->format('M j, Y')); ?></td>
                        <td><?php echo e($borrowing->return_date?->format('M j, Y') ?? '—'); ?></td>
                        <td>
                            <span class="badge <?php echo e($borrowing->status === 'Borrowed' ? 'text-bg-warning' : ($borrowing->status === 'Overdue' ? 'text-bg-danger' : 'text-bg-success')); ?>">
                                <?php echo e($borrowing->status); ?>

                            </span>
                        </td>
                        <td class="text-end text-nowrap">
                            <a href="<?php echo e(route('borrowings.show', $borrowing)); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="<?php echo e(route('borrowings.edit', $borrowing)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('borrowings.destroy', $borrowing)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this borrowing record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="7" class="text-center text-secondary py-5">No borrowings recorded yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/borrowings/index.blade.php ENDPATH**/ ?>