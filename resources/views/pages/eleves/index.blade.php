@extends('layouts.app')
@section('title')
	Eleves 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="#">Eleves</a></li>
<div class="col-md-12 text-end">
  <a href="{{ route('eleves.printEleves') }}" class="btn btn-primary text-light">Imprimer la liste des élèves</a>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    @if(Session::has('info'))
    <div class="alert alert-info message" role="alert">
        {{ Session::get('info') }}
    </div>
@endif
@if(Session::has('info'))
<script>
    // Sélectionnez le message avec la eleve "message"
    var message = document.querySelector('.message');

    // Vérifiez si le message existe
    if (message) {
        // Masquez le message après 3 secondes
        setTimeout(function() {
            message.style.display = 'none';
        }, 3000);
    }
</script>
@endif
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste des eleves</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Numéro eleve</th>
                <th scope="col">Nom</th>
                <th scope="col">Postnom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($eleves as $eleve)
                <tr>
                    <td>{{ strval($eleve->nelev) }}</td>
                    <td> {{$eleve->nom}}  </td>
                    <td> {{$eleve->postnom}}  </td>
                    <td> {{$eleve->prenom}}  </td>
                    <td> {{$eleve->sexe}}  </td>
                    <td> {{$eleve->codclas}}  </td>
                    <td>
                      <form id="delete-form-{{ $eleve->nelev }}" action="{{ route('eleves.destroy', $eleve->nelev) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                      <a href="#" class="text-danger me-2" onclick="event.preventDefault(); if (confirm('Voulez-vous supprimer cet enregistrement ?')) { document.getElementById('delete-form-{{ $eleve->nelev }}').submit(); }">
                          <i class="bi bi-trash"></i> <!-- Icône pour l'action Supprimer -->
                      </a>                    
                      
                      <a href="{{ route('eleves.edit', $eleve->nelev) }}" class="text-success">
                        <i class="bi bi-pencil"></i> <!-- Icône pour l'action Éditer -->
                      </a>
                    </td>
                  </tr>  
                @endforeach
            </tbody>
          </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>
</div>
@include('layouts.delete')
@endsection


@section('scripts')
<script>
    function supprimer(event){
        event.preventDefault();
        a = event.target.closest('a');

        let deleteForm = document.getElementById('deleteForm');
        deleteForm.setAttribute('action', a.getAttribute('href'));

        let textDelete = document.getElementById('textDelete');
        textDelete.innerHTML = a.getAttribute('item') + " ?";

        let titleDelete = document.getElementById('titleDelete');
        titleDelete.innerHTML = "Suppression";           
        
    }
</script>
@endsection