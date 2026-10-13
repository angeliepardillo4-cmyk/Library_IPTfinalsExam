<?php $__env->startSection('title', 'Members'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <div>
        <h1 class="h2 mb-1">Members</h1>
        <p class="text-secondary mb-0">Manage library member accounts.</p>
    </div>
    <a href="<?php echo e(route('members.create')); ?>" class="btn btn-primary">+ Add member</a>
</div>
<div class="card border-0 shadow-sm bg-white-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Member</th>
                    <th>Member ID</th>
                    <th>Contact</th>
                    <th>Borrowings</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('members.show', $member)); ?>" class="fw-semibold text-decoration-none text-brown"><?php echo e($member->full_name); ?></a></td>
                        <td><?php echo e($member->member_id_number); ?></td>
                        <td><?php echo e($member->contact_number ?: '—'); ?></td>
                        <td><?php echo e($member->borrowings_count); ?></td>
                        <td class="text-end text-nowrap">
                            <a href="<?php echo e(route('members.edit', $member)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('members.destroy', $member)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this member? Members with borrowings cannot be deleted.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-5">No members yet. Add your first member.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/members/index.blade.php ENDPATH**/ ?>