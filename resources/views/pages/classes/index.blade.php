@extends('layouts.app')
@section('title')
	Classes 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">Classes</a></li>
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
    // Sélectionnez le message avec la classe "message"
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
        <h5 class="card-title">Liste des classes</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Code classe</th>
                <th scope="col">Libellé classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                <tr>
                    <td>{{ strval($classe->codclas) }}</td>
                    <td> {{$classe->libclas}}  </td>
                    <td>
                        <form id="delete-form-{{ $classe->codclas }}" action="{{ route('classes.destroy', $classe->codclas) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#" class="text-danger me-2" onclick="event.preventDefault(); if (confirm('Voulez-vous supprimer cet enregistrement ?')) { document.getElementById('delete-form-{{ $classe->codclas }}').submit(); }">
                            <i class="bi bi-trash"></i> <!-- Icône pour l'action Supprimer -->
                        </a>
                    
                      <a href="{{ route('classes.edit', $classe->codclas) }}" class="text-success">
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
          <h5 class="card-title">Création d'une classe</h5>

          <!-- Horizontal Form -->
          <form action="{{ route('classes.store') }}" method="POST">
            @csrf
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
              <label for="inputEmail3" class="col-sm-4 col-form-label">Code classe</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputText" name="codclas">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Libellé classe</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail" name="libclas">
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