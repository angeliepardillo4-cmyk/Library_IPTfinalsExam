<div class="row g-3">
    <div class="col-md-6">
        <label for="member_id_number" class="form-label">Member ID <span class="text-danger">*</span></label>
        <input id="member_id_number" name="member_id_number" class="form-control" value="<?php echo e(old('member_id_number', $member->member_id_number ?? '')); ?>" required maxlength="255">
    </div>
    <div class="col-md-6">
        <label for="full_name" class="form-label">Full name <span class="text-danger">*</span></label>
        <input id="full_name" name="full_name" class="form-control" value="<?php echo e(old('full_name', $member->full_name ?? '')); ?>" required maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="<?php echo e(old('date_of_birth', isset($member) && $member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : '')); ?>">
    </div>
    <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select">
            <option value="">Select</option>
            <?php $__currentLoopData = ['Female', 'Male', 'Other', 'Prefer not to say']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($gender); ?>" <?php if(old('gender', $member->gender ?? '') === $gender): echo 'selected'; endif; ?>><?php echo e($gender); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="joined_at" class="form-label">Join date <span class="text-danger">*</span></label>
        <input type="date" id="joined_at" name="joined_at" class="form-control" value="<?php echo e(old('joined_at', isset($member) && $member->joined_at ? $member->joined_at->format('Y-m-d') : now()->format('Y-m-d'))); ?>" required>
    </div>
    <div class="col-md-6">
        <label for="contact_number" class="form-label">Contact number <span class="text-danger">*</span></label>
        <input id="contact_number" name="contact_number" class="form-control" value="<?php echo e(old('contact_number', $member->contact_number ?? '')); ?>" required maxlength="50">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email', $member->email ?? '')); ?>" maxlength="255">
    </div>
    <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <textarea id="address" name="address" class="form-control" rows="2" maxlength="1000"><?php echo e(old('address', $member->address ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/members/_form.blade.php ENDPATH**/ ?>