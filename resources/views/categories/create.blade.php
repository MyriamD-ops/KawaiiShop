@extends('categories.form')

@section('title', 'Créer une Catégorie')
@section('description', 'Ajoutez une nouvelle catégorie à votre boutique')
@section('form-action', route('categories.store'))
@section('button-text', 'Créer la catégorie')