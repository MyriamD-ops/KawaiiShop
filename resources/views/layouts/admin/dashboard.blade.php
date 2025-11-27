@extends('layouts.app2')

@section('title', 'Dashboard Admin')

@section('content')
<h1>Dashboard Administrateur</h1>

<div class="row">
    <div class="col">
        <div style="background: #007bff; color: white; padding: 20px; margin: 10px;">
            <h3>Utilisateurs</h3>
            <a href="{{ route('admin.users.index') }}" style="color: white;">Gérer les utilisateurs</a>
        </div>
    </div>
    <div class="col">
        <div style="background: #28a745; color: white; padding: 20px; margin: 10px;">
            <h3>Produits</h3>
            <a href="{{ route('admin.products.index') }}" style="color: white;">Gérer les produits</a>
        </div>
    </div>
    <div class="col">
        <div style="background: #ffc107; color: black; padding: 20px; margin: 10px;">
            <h3>Catégories</h3>
            <a href="{{ route('admin.categories.index') }}" style="color: black;">Gérer les catégories</a>
        </div>
    </div>
    <div class="col">
        <div style="background: #17a2b8; color: white; padding: 20px; margin: 10px;">
            <h3>Commandes</h3>
            <a href="{{ route('admin.orders.index') }}" style="color: white;">Gérer les commandes</a>
        </div>
    </div>
</div>
@endsection