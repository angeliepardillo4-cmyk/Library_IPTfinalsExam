<div class="row g-3">
    <div class="col-12">
        <label for="book_id" class="form-label">Book <span class="text-danger">*</span></label>
        <select id="book_id" name="book_id" class="form-select" required>
            <option value="">Select a book</option>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($book->id); ?>" <?php if((string) old('book_id', $borrowing->book_id ?? $selectedBookId ?? '') === (string) $book->id): echo 'selected'; endif; ?>>
                    <?php echo e($book->title); ?> · <?php echo e($book->author->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-12">
        <label for="member_id" class="form-label">Member <span class="text-danger">*</span></label>
        <select id="member_id" name="member_id" class="form-select" required>
            <option value="">Select a member</option>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($member->id); ?>" <?php if((string) old('member_id', $borrowing->member_id ?? $selectedMemberId ?? '') === (string) $member->id): echo 'selected'; endif; ?>>
                    <?php echo e($member->full_name); ?> · <?php echo e($member->member_id_number); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="borrow_date" class="form-label">Borrow date <span class="text-danger">*</span></label>
        <input type="date" id="borrow_date" name="borrow_date" class="form-control" value="<?php echo e(old('borrow_date', isset($borrowing) ? $borrowing->borrow_date->format('Y-m-d') : now()->format('Y-m-d'))); ?>" required>
    </div>
    <div class="col-md-4">
        <label for="due_date" class="form-label">Due date <span class="text-danger">*</span></label>
        <input type="date" id="due_date" name="due_date" class="form-control" value="<?php echo e(old('due_date', isset($borrowing) ? $borrowing->due_date->format('Y-m-d') : '')); ?>" required>
    </div>
    <div class="col-md-4">
        <label for="return_date" class="form-label">Return date</label>
        <input type="date" id="return_date" name="return_date" class="form-control" value="<?php echo e(old('return_date', isset($borrowing) && $borrowing->return_date ? $borrowing->return_date->format('Y-m-d') : '')); ?>">
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <select id="status" name="status" class="form-select" required>
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status); ?>" <?php if(old('status', $borrowing->status ?? 'Borrowed') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/borrowings/_form.blade.php ENDPATH**/ ?>