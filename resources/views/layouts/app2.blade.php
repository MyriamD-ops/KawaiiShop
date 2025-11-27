<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('KawaiiShop', 'Mon Projet Laravel en DUALCODING')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .navbar { background: #333; padding: 1rem; }
        .navbar a { color: white; text-decoration: none; margin-right: 20px; }
        .navbar a:hover { color: #ddd; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; margin: 10px 0; }
        .btn { 
            display: inline-block; 
            padding: 10px 15px; 
            background: #007bff; 
            color: white; 
            text-decoration: none; 
            border: none; 
            cursor: pointer;
            margin: 5px;
        }
        .btn:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .btn-success { background: #28a745; }
        .btn-success:hover { background: #218838; }
        .row { display: flex; flex-wrap: wrap; margin: 0 -10px; }
        .col { flex: 1; padding: 10px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        .form-control { padding: 8px; margin: 5px 0; width: 100%; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/">Mon Site</a>
            <a href="/products">Produits</a>
            <a href="/categories">Catégories</a>
            @auth
                <a href="/cart">Panier</a>
                <a href="/my-orders">Mes Commandes</a>
                @admin
                    <a href="/admin">Admin</a>
                @endadmin
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>