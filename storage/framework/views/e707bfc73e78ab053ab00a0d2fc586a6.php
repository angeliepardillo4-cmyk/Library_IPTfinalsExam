<?php $__env->startSection('title', $member->full_name); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="<?php echo e(route('members.index')); ?>" class="small text-decoration-none">← Members</a>
        <h1 class="h2 mt-2 mb-0 text-brown"><?php echo e($member->full_name); ?></h1>
    </div>
    <a href="<?php echo e(route('members.edit', $member)); ?>" class="btn btn-warning">Edit member</a>
</div>
<div class="card border-0 shadow-sm bg-white-card mb-4">
    <div class="card-header bg-white py-3">
        <h2 class="h5 mb-0">Member information</h2>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <?php $__currentLoopData = [
                ['Member ID', $member->member_id_number],
                ['Date of birth', $member->date_of_birth?->format('M j, Y') ?? '—'],
                ['Gender', $member->gender ?? '—'],
                ['Contact number', $member->contact_number ?? '—'],
                ['Email', $member->email ?? '—'],
                ['Address', $member->address ?? '—'],
                ['Joined on', $member->joined_at?->format('M j, Y') ?? '—'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="small text-secondary"><?php echo e($label); ?></div>
                    <div><?php echo e($value); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h5 mb-0">Borrowing history</h2>
        <a href="<?php echo e(route('borrowings.create', ['member_id' => $member->id])); ?>" class="btn btn-sm btn-primary">New borrowing</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Book</th>
                    <th>Borrow date</th>
                    <th>Due date</th>
                    <th>Return date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $member->borrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('borrowings.show', $borrowing)); ?>"><?php echo e($borrowing->book->title); ?></a></td>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/members/show.blade.php ENDPATH**/ ?>