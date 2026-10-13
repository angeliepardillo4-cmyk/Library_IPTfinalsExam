<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <p class="text-brown fw-semibold text-uppercase small mb-1">Library overview</p>
            <h1 class="h2 mb-1">Welcome to my Laravel Project</h1>
            <p class="text-secondary mb-0">Manage manually your books, authors, categories, members, and borrowings.</p>
        </div>
        <a href="<?php echo e(route('borrowings.create')); ?>" class="btn btn-primary">+ New borrowing</a>
    </div>
    <div class="row g-3 mb-4">
        <?php $__currentLoopData = [['Authors', $authorCount, 'authors.index', 'Total authors'], ['Categories', $categoryCount, 'categories.index', 'Book categories'], ['Books', $bookCount, 'books.index', 'Total books in stock'], ['Members', $memberCount, 'members.index', 'Registered members']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $count, $route, $hint]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-6 col-xl-3">
                <a href="<?php echo e(route($route)); ?>" class="text-decoration-none text-reset">
                    <div class="card border-0 shadow-sm h-100 bg-white-card">
                        <div class="card-body">
                            <div class="small text-secondary"><?php echo e($label); ?></div>
                            <div class="display-6 fw-semibold text-brown"><?php echo e($count); ?></div>
                            <div class="small text-secondary"><?php echo e($hint); ?></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100 bg-white-card">
                <div class="card-body">
                    <div class="small text-secondary">Active borrowings</div>
                    <div class="display-6 fw-semibold text-brown mt-2"><?php echo e($borrowingCount); ?></div>
                    <a href="<?php echo e(route('borrowings.index')); ?>" class="small">View borrowings</a>
                </div>
            </div>
        </div>
    </div>

    <?php if($overdueBorrows->isNotEmpty()): ?>
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0 text-brown">Overdue borrowings</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Book</th>
                            <th>Member</th>
                            <th>Due date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $overdueBorrows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($borrowing->book->title); ?></td>
                                <td><?php echo e($borrowing->member->full_name); ?></td>
                                <td><?php echo e($borrowing->due_date->format('M j, Y')); ?></td>
                                <td><a href="<?php echo e(route('borrowings.show', $borrowing)); ?>"
                                        class="btn btn-sm btn-outline-secondary">Details</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-4">No overdue items.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="card border-0 shadow-sm bg-white-card">
            <div class="card-header bg-white py-3">
                <h2 class="h5 mb-0 text-brown">Recent borrowings</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Book</th>
                            <th>Member</th>
                            <th>Borrow date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentBorrowings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($borrowing->book->title); ?></td>
                                <td><?php echo e($borrowing->member->full_name); ?></td>
                                <td><?php echo e($borrowing->borrow_date->format('M j, Y')); ?></td>
                                <td><?php echo e($borrowing->status); ?></td>
                                <td><a href="<?php echo e(route('borrowings.show', $borrowing)); ?>"
                                        class="btn btn-sm btn-outline-secondary">Details</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">No borrowings recorded.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/dashboard.blade.php ENDPATH**/ ?>