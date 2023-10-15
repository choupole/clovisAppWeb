@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
      ClovisApp
    </div>
    <div class="card-body">
      <h5 class="card-title">Gestion des paies</h5>
      <p class="card-text">"Notre application de gestion est un outil puissant conçu pour simplifier et optimiser la gestion des tâches, des projets et des équipes au sein de votre organisation. Avec une interface conviviale et des fonctionnalités avancées, notre application offre une solution complète pour améliorer l'efficacité et la productivité de votre équipe.</p>
      <a href=" {{route('enseignants.create')}} " class="btn btn-primary">Commencer</a>
    </div>
  </div>
@endsection

@section('scripts')

@endsection