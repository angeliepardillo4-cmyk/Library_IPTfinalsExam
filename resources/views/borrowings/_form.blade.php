<div class="row g-3">
    <div class="col-12">
        <label for="book_id" class="form-label">Book <span class="text-danger">*</span></label>
        <select id="book_id" name="book_id" class="form-select" required>
            <option value="">Select a book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" @selected((string) old('book_id', $borrowing->book_id ?? $selectedBookId ?? '') === (string) $book->id)>
                    {{ $book->title }} · {{ $book->author->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="member_id" class="form-label">Member <span class="text-danger">*</span></label>
        <select id="member_id" name="member_id" class="form-select" required>
            <option value="">Select a member</option>
            @foreach($members as $member)
                <option value="{{ $member->id }}" @selected((string) old('member_id', $borrowing->member_id ?? $selectedMemberId ?? '') === (string) $member->id)>
                    {{ $member->full_name }} · {{ $member->member_id_number }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="borrow_date" class="form-label">Borrow date <span class="text-danger">*</span></label>
        <input type="date" id="borrow_date" name="borrow_date" class="form-control" value="{{ old('borrow_date', isset($borrowing) ? $borrowing->borrow_date->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-4">
        <label for="due_date" class="form-label">Due date <span class="text-danger">*</span></label>
        <input type="date" id="due_date" name="due_date" class="form-control" value="{{ old('due_date', isset($borrowing) ? $borrowing->due_date->format('Y-m-d') : '') }}" required>
    </div>
    <div class="col-md-4">
        <label for="return_date" class="form-label">Return date</label>
        <input type="date" id="return_date" name="return_date" class="form-control" value="{{ old('return_date', isset($borrowing) && $borrowing->return_date ? $borrowing->return_date->format('Y-m-d') : '') }}">
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
        <select id="status" name="status" class="form-select" required>
            @foreach($statuses as $status)
                <option value="{{ $status }}" @selected(old('status', $borrowing->status ?? 'Borrowed') === $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>
</div>
