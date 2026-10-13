<div class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Author name <span class="text-danger">*</span></label>
        <input id="name" name="name" class="form-control" value="{{ old('name', $author->name ?? '') }}" required maxlength="255">
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $author->email ?? '') }}" maxlength="255">
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input id="phone" name="phone" class="form-control" value="{{ old('phone', $author->phone ?? '') }}" maxlength="50">
    </div>
    <div class="col-12">
        <label for="bio" class="form-label">Biography</label>
        <textarea id="bio" name="bio" class="form-control" rows="3" maxlength="5000">{{ old('bio', $author->bio ?? '') }}</textarea>
    </div>
</div>
