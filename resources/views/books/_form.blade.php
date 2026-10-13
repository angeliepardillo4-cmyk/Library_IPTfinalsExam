<div class="row g-3">
    <div class="col-md-6">
        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
        <select id="category_id" name="category_id" class="form-select" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id ?? '') === $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="author_id" class="form-label">Author <span class="text-danger">*</span></label>
        <select id="author_id" name="author_id" class="form-select" required>
            <option value="">Select an author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id ?? '') === $author->id)>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input id="title" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="isbn" class="form-label">ISBN</label>
        <input id="isbn" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn ?? '') }}" maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="published_date" class="form-label">Published date</label>
        <input type="date" id="published_date" name="published_date" class="form-control" value="{{ old('published_date', isset($book) && $book->published_date ? $book->published_date->format('Y-m-d') : '') }}">
    </div>
    <div class="col-md-4">
        <label for="pages" class="form-label">Pages</label>
        <input type="number" id="pages" name="pages" class="form-control" value="{{ old('pages', $book->pages ?? '') }}" min="1" max="10000">
    </div>
    <div class="col-md-4">
        <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $book->quantity ?? 1) }}" min="1" max="1000" required>
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control" rows="3" maxlength="5000">{{ old('description', $book->description ?? '') }}</textarea>
    </div>
</div>
