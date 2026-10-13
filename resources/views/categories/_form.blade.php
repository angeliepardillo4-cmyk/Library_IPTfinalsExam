<div class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Category name <span class="text-danger">*</span></label>
        <input id="name" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required maxlength="255">
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control" rows="3" maxlength="5000">{{ old('description', $category->description ?? '') }}</textarea>
    </div>
</div>
