<div class="row g-3">
    <div class="col-md-6">
        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
        <select id="category_id" name="category_id" class="form-select" required>
            <option value="">Select a category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $book->category_id ?? '') === $category->id): echo 'selected'; endif; ?>>
                    <?php echo e($category->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="author_id" class="form-label">Author <span class="text-danger">*</span></label>
        <select id="author_id" name="author_id" class="form-select" required>
            <option value="">Select an author</option>
            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($author->id); ?>" <?php if(old('author_id', $book->author_id ?? '') === $author->id): echo 'selected'; endif; ?>>
                    <?php echo e($author->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-12">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input id="title" name="title" class="form-control" value="<?php echo e(old('title', $book->title ?? '')); ?>" required maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="isbn" class="form-label">ISBN</label>
        <input id="isbn" name="isbn" class="form-control" value="<?php echo e(old('isbn', $book->isbn ?? '')); ?>" maxlength="255">
    </div>
    <div class="col-md-4">
        <label for="published_date" class="form-label">Published date</label>
        <input type="date" id="published_date" name="published_date" class="form-control" value="<?php echo e(old('published_date', isset($book) && $book->published_date ? $book->published_date->format('Y-m-d') : '')); ?>">
    </div>
    <div class="col-md-4">
        <label for="pages" class="form-label">Pages</label>
        <input type="number" id="pages" name="pages" class="form-control" value="<?php echo e(old('pages', $book->pages ?? '')); ?>" min="1" max="10000">
    </div>
    <div class="col-md-4">
        <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
        <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo e(old('quantity', $book->quantity ?? 1)); ?>" min="1" max="1000" required>
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control" rows="3" maxlength="5000"><?php echo e(old('description', $book->description ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/books/_form.blade.php ENDPATH**/ ?>