@extends('categories.form')

@section('title', 'Modifier la Catégorie')
@section('description', 'Modifiez les informations de la catégorie')
@section('form-action', route('categories.update', $category))
@section('method')
@method('PUT')
@endsection
@section('button-text', 'Mettre à jour')