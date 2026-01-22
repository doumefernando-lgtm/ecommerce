<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">Admin Panel</span>
</nav>

<div class="container-fluid">
    <div class="row">

        <aside class="col-2 bg-light vh-100 p-3">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/admin/dashboard" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="/admin/products" class="nav-link">Produits</a></li>
                <li class="nav-item"><a href="/admin/categories" class="nav-link">Catégories</a></li>
                <li class="nav-item"><a href="/admin/orders" class="nav-link">Commandes</a></li>
            </ul>
        </aside>

        <main class="col-10 p-4">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
