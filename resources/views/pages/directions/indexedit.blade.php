@extends('layouts.app')
@section('title')
	directions 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">directions</a></li>
@endsection
@section('content')
<div class="col-lg-6">
    @if(Session::has('info'))
    <div class="alert alert-info message" role="alert">
        {{ Session::get('info') }}
    </div>
@endif
@if(Session::has('info'))
<script>
    // Sélectionnez le message avec la direction "message"
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
        <h5 class="card-title">Liste des directions</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Code direction</th>
                <th scope="col">Libellé direction</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($directions as $direction)
                <tr>
                    <td>{{ strval($direction->coddir) }}</td>
                    <td> {{$direction->libdir}}  </td>
                    <td>
                        <form id="delete-form-{{ $direction->coddir }}" action="{{ route('directions.destroy', $direction->coddir) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#" class="text-danger me-2" onclick="event.preventDefault(); if (confirm('Voulez-vous supprimer cet enregistrement ?')) { document.getElementById('delete-form-{{ $direction->coddir }}').submit(); }">
                            <i class="bi bi-trash"></i> <!-- Icône pour l'action Supprimer -->
                        </a>
                    
                      
                      <a href="{{ route('directions.edit', $direction) }}" class="text-success">
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
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modification d'une direction</h5>

          <!-- Horizontal Form -->
          <form action="{{ route('directions.update', $direction) }}" method="POST">
            @csrf
            @method('PUT')
            @if(Session::has('success'))
                <div class="alert alert-success success-message">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('success'))
                <script>
                    setTimeout(function() {
                        var successMessage = document.querySelector('.success-message');
                        if (successMessage) {
                            successMessage.style.display = 'none';
                        }
                    }, 3000);
                </script>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        
            <script>
                setTimeout(function() {
                    document.getElementById('error-alert').style.display = 'none';
                }, 3000);
            </script>
        @endif
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Code direction</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputText" name="coddir" value="{{ $direction->coddir }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Libellé direction</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail" name="libdir" value="{{ $direction->libdir }}">
              </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </form><!-- End Horizontal Form -->

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