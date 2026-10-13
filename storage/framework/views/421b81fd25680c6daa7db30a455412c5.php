<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> | Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        :root {
            --bs-primary: #8B5E3C;
            --bs-primary-rgb: 139, 94, 60;
            --bs-secondary: #D2B48C;
            --bs-secondary-rgb: 210, 180, 140;
        }
        body { background-color: #F5F0E6; }
        .navbar { background-color: #8B5E3C; }
        .bg-white-card { background-color: #ffffff; }
        .text-brown { color: #8B5E3C; }
        .border-brown { border-color: #8B5E3C; }
        .badge { font-weight: 500; }
        .table th { color: #8B5E3C; }
        a.text-decoration-none:hover { text-decoration: none; }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('dashboard')); ?>">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="mainNavigation">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    <a class="nav-link <?php echo e(request()->routeIs('authors.*') ? 'active' : ''); ?>" href="<?php echo e(route('authors.index')); ?>">Authors</a>
                    <a class="nav-link <?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>" href="<?php echo e(route('categories.index')); ?>">Categories</a>
                    <a class="nav-link <?php echo e(request()->routeIs('books.*') ? 'active' : ''); ?>" href="<?php echo e(route('books.index')); ?>">Books</a>
                    <a class="nav-link <?php echo e(request()->routeIs('members.*') ? 'active' : ''); ?>" href="<?php echo e(route('members.index')); ?>">Members</a>
                    <a class="nav-link <?php echo e(request()->routeIs('borrowings.*') ? 'active' : ''); ?>" href="<?php echo e(route('borrowings.index')); ?>">Borrowings</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="container py-4 py-lg-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\USER\Documents\LARAVEL\Library\resources\views/layouts/app.blade.php ENDPATH**/ ?>