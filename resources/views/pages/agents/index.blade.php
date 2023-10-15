@extends('layouts.app')
@section('title')
	agents 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">Agents</a></li>
<div class="col-md-12 text-end">
  <a href="{{ route('agents.printAgents') }}" class="btn btn-primary text-light">Imprimer la liste des agents</a>
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
    // Sélectionnez le message avec la agent "message"
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
        <h5 class="card-title">Liste des agents</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Numéro agent</th>
                <th scope="col">Nom</th>
                <th scope="col">Postnom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Direction</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($agents as $agent)
                <tr>
                    <td>{{ strval($agent->matri) }}</td>
                    <td> {{$agent->nom}}  </td>
                    <td> {{$agent->postnom}}  </td>
                    <td> {{$agent->prenom}}  </td>
                    <td> {{$agent->sexe}}  </td>
                    <td> {{$agent->coddir}}  </td>
                    <td>
                      <form id="delete-form-{{ $agent->matri }}" action="{{ route('agents.destroy', $agent->matri) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                      <a href="#" class="text-danger me-2" onclick="event.preventDefault(); if (confirm('Voulez-vous supprimer cet enregistrement ?')) { document.getElementById('delete-form-{{ $agent->matri }}').submit(); }">
                          <i class="bi bi-trash"></i> <!-- Icône pour l'action Supprimer -->
                      </a>
                    
                      {{-- <a href="#" class="text-primary me-2">
                        <i class="bi bi-eye"></i> <!-- Icône pour l'action Voir -->
                      </a> --}}
                      <a href="{{ route('agents.edit', $agent->matri) }}" class="text-success">
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