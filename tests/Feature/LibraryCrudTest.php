<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LibraryCrudTest extends TestCase
{
    use RefreshDatabase;

    private function bookData(array $overrides = []): array
    {
        return array_merge([
            'title' => 'The Great Library',
            'isbn' => '978-0123456789',
        ], $overrides);
    }

    public function test_dashboard_loads(): void
    {
        $this->get(route('dashboard'))->assertOk();
    }

    public function test_author_pages_load(): void
    {
        $author = Author::factory()->create(['name' => 'Jane Austen']);

        $this->get(route('authors.index'))->assertOk()->assertSee('Jane Austen');
        $this->get(route('authors.create'))->assertOk();
        $this->get(route('authors.edit', $author))->assertOk()->assertSee('Jane Austen');
        $this->get(route('authors.show', $author))->assertOk();
    }

    public function test_author_can_be_created_updated_and_deleted(): void
    {
        $this->post(route('authors.store'), [
            'name' => 'Jane Austen',
            'email' => 'jane@example.com',
            'phone' => '555-0100',
            'bio' => 'English novelist.',
        ])->assertRedirect(route('authors.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('authors', ['name' => 'Jane Austen', 'email' => 'jane@example.com']);

        $author = Author::first();

        $this->put(route('authors.update', $author), [
            'name' => 'Jane Austen',
            'email' => 'austen@example.com',
            'phone' => '555-0100',
            'bio' => 'English novelist, renowned for her works.',
        ])->assertRedirect(route('authors.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('authors', ['id' => $author->id, 'email' => 'austen@example.com']);

        $this->delete(route('authors.destroy', $author))->assertRedirect(route('authors.index'));
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    public function test_author_validation_and_unique_email(): void
    {
        $this->post(route('authors.store'), [])
            ->assertSessionHasErrors(['name']);

        $existing = Author::factory()->create(['email' => 'existing@example.com']);
        $this->post(route('authors.store'), [
            'name' => 'New Author',
            'email' => 'existing@example.com',
        ])->assertSessionHasErrors('email');

        $this->put(route('authors.update', $existing), [
            'name' => 'New Author',
            'email' => 'existing@example.com',
        ])->assertSessionHasNoErrors();
    }

    public function test_category_can_be_created_updated_and_deleted(): void
    {
        $this->post(route('categories.store'), [
            'name' => 'Fiction',
            'description' => 'Novels and stories.',
        ])->assertRedirect(route('categories.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('categories', ['name' => 'Fiction']);

        $category = Category::first();

        $this->put(route('categories.update', $category), [
            'name' => 'Literary Fiction',
            'description' => 'Serious, quality fiction.',
        ])->assertRedirect(route('categories.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Literary Fiction']);

        $this->delete(route('categories.destroy', $category))->assertRedirect(route('categories.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_book_pages_load_and_crud(): void
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $this->post(route('books.store'), [
            'category_id' => $category->id,
            'author_id' => $author->id,
            'title' => 'Test Book',
            'isbn' => '978-0123456789',
            'pages' => 300,
            'quantity' => 2,
        ])->assertRedirect(route('books.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('books', ['title' => 'Test Book']);

        $book = Book::first();

        $this->get(route('books.index'))->assertOk()->assertSee('Test Book');
        $this->get(route('books.create'))->assertOk();
        $this->get(route('books.show', $book))->assertOk()->assertSee('Test Book');
        $this->get(route('books.edit', $book))->assertOk()->assertSee('Test Book');

        $this->put(route('books.update', $book), [
            'category_id' => $category->id,
            'author_id' => $author->id,
            'title' => 'Updated Book',
            'isbn' => '978-0987654321',
            'pages' => 350,
            'quantity' => 3,
        ])->assertRedirect(route('books.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('books', ['id' => $book->id, 'title' => 'Updated Book']);

        $this->delete(route('books.destroy', $book))->assertRedirect(route('books.index'));
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_book_validation(): void
    {
        $this->post(route('books.store'), [])
            ->assertSessionHasErrors(['category_id', 'author_id', 'title', 'quantity']);

        $this->post(route('books.store'), [
            'category_id' => 999,
            'author_id' => 999,
            'title' => str_repeat('x', 256),
            'quantity' => 0,
        ])->assertSessionHasErrors(['category_id', 'author_id', 'title', 'quantity']);
    }

    public function test_member_can_be_created_updated_and_deleted(): void
    {
        $this->post(route('members.store'), [
            'member_id_number' => 'MB-0001',
            'full_name' => 'Alice Smith',
            'date_of_birth' => '1990-05-15',
            'gender' => 'Female',
            'contact_number' => '555-0100',
            'email' => 'alice@example.com',
            'address' => '123 Main St',
            'joined_at' => now()->toDateString(),
        ])->assertRedirect(route('members.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('members', ['member_id_number' => 'MB-0001', 'full_name' => 'Alice Smith']);

        $member = Member::first();

        $this->get(route('members.show', $member))->assertOk()->assertSee('Alice Smith');

        $this->put(route('members.update', $member), [
            'member_id_number' => 'MB-0001',
            'full_name' => 'Alice Johnson',
            'date_of_birth' => '1990-05-15',
            'gender' => 'Female',
            'contact_number' => '555-0200',
            'email' => 'alice.johnson@example.com',
            'address' => '456 Oak Ave',
            'joined_at' => now()->toDateString(),
        ])->assertRedirect(route('members.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('members', ['id' => $member->id, 'full_name' => 'Alice Johnson']);

        $this->delete(route('members.destroy', $member))->assertRedirect(route('members.index'));
        $this->assertDatabaseMissing('members', ['id' => $member->id]);
    }

    public function test_borrowing_crud(): void
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create([
            'author_id' => $author->id,
            'category_id' => $category->id,
            'quantity' => 2,
        ]);
        $member = Member::factory()->create();

        $this->post(route('borrowings.store'), [
            'book_id' => $book->id,
            'member_id' => $member->id,
            'borrow_date' => now()->toDateString(),
            'due_date' => now()->addDays(7)->toDateString(),
            'status' => 'Borrowed',
        ])->assertRedirect(route('borrowings.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('borrowings', ['book_id' => $book->id, 'member_id' => $member->id]);

        $borrowing = Borrowing::first();

        $this->get(route('borrowings.index'))->assertOk();
        $this->get(route('borrowings.show', $borrowing))->assertOk();
        $this->get(route('borrowings.edit', $borrowing))->assertOk();

        $this->put(route('borrowings.update', $borrowing), [
            'book_id' => $book->id,
            'member_id' => $member->id,
            'borrow_date' => now()->toDateString(),
            'due_date' => now()->addDays(7)->toDateString(),
            'return_date' => now()->toDateString(),
            'status' => 'Returned',
        ])->assertRedirect(route('borrowings.index'))->assertSessionHas('success');

        $this->assertDatabaseHas('borrowings', ['id' => $borrowing->id, 'status' => 'Returned']);

        $this->delete(route('borrowings.destroy', $borrowing))->assertRedirect(route('borrowings.index'));
        $this->assertDatabaseMissing('borrowings', ['id' => $borrowing->id]);
    }

    public function test_borrowing_validation(): void
    {
        $this->post(route('borrowings.store'), [])
            ->assertSessionHasErrors(['book_id', 'member_id', 'borrow_date', 'due_date', 'status']);

        $this->post(route('borrowings.store'), [
            'book_id' => 999,
            'member_id' => 999,
            'borrow_date' => 'invalid-date',
            'due_date' => 'invalid-date',
            'status' => 'Nonsense',
        ])->assertSessionHasErrors(['book_id', 'member_id', 'borrow_date', 'due_date', 'status']);
    }

    public function test_dependent_records_cannot_be_deleted(): void
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create([
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);

        $this->post(route('borrowings.store'), [
            'book_id' => $book->id,
            'member_id' => Member::factory()->create()->id,
            'borrow_date' => now()->toDateString(),
            'due_date' => now()->addDays(7)->toDateString(),
            'status' => 'Borrowed',
        ])->assertRedirect(route('borrowings.index'));

        $this->delete(route('books.destroy', $book))
            ->assertRedirect(route('books.index'))
            ->assertSessionHas('error');

        $this->delete(route('authors.destroy', $author))
            ->assertRedirect(route('authors.index'))
            ->assertSessionHas('error');
    }
}
