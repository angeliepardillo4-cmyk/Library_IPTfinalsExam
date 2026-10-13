# Library Management System

A Laravel-based web application for managing a library's books, authors, categories, members, and borrowing records.

## Features

- **Books** - catalog books with title, ISBN, publication date, pages, and quantity
- **Authors** - manage author profiles with contact info and biography
- **Categories** - organize books by genre and subject
- **Members** - register library members with personal details
- **Borrowings** - track borrowing activity with borrow date, due date, and return date

## Requirements

- PHP 8.3+
- Composer
- SQLite (default) or MySQL

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan serve
```

## Testing

```bash
php artisan test
```

## Database

The project uses five related tables:

| Table         | Description                          |
|---------------|--------------------------------------|
| authors       | Book authors with name and contact   |
| categories    | Book categories for organization     |
| books         | Library books (belongs to author/category) |
| members       | Registered library members           |
| borrowings    | Borrow records (belongs to book/member) |
