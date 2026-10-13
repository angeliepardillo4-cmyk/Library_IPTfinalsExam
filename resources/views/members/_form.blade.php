<div class="row g-3">
    <div class="col-md-6">
        <label for="member_id_number" class="form-label">Member ID <span class="text-danger">*</span></label>
        <input id="member_id_number" name="member_id_number" class="form-control" value="{{ old('member_id_number', $member->member_id_number ?? '') }}" required maxlength="255">
    </div>
    <div class="col-md-6">
        <label for="full_name" class="form-label">Full name <span class="text-danger">*</span></label>
        <input id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $member->full_name ?? '') }}" required maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="date_of_birth" class="form-label">Date of birth</label>
        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', isset($member) && $member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : '') }}">
    </div>
    <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select">
            <option value="">Select</option>
            @foreach(['Female', 'Male', 'Other', 'Prefer not to say'] as $gender)
                <option value="{{ $gender }}" @selected(old('gender', $member->gender ?? '') === $gender)>{{ $gender }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="joined_at" class="form-label">Join date <span class="text-danger">*</span></label>
        <input type="date" id="joined_at" name="joined_at" class="form-control" value="{{ old('joined_at', isset($member) && $member->joined_at ? $member->joined_at->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-6">
        <label for="contact_number" class="form-label">Contact number <span class="text-danger">*</span></label>
        <input id="contact_number" name="contact_number" class="form-control" value="{{ old('contact_number', $member->contact_number ?? '') }}" required maxlength="50">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $member->email ?? '') }}" maxlength="255">
    </div>
    <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <textarea id="address" name="address" class="form-control" rows="2" maxlength="1000">{{ old('address', $member->address ?? '') }}</textarea>
    </div>
</div>
