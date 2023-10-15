@extends('layouts.app')
@section('title')
	documents 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">documents</a></li>
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
    // Sélectionnez le message avec la document "message"
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
        <h5 class="card-title">Liste des documents</h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Libellé </th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr>
                    <td>{{ strval($document->ndoc) }}</td>
                    <td> {{$document->libdoc}}  </td>
                    <td> {{$document->datdoc}}  </td>
                    <td> {{$document->codtypedoc}}  </td>
                    <td>
                        <form id="delete-form-{{ $document->ndoc }}" action="{{ route('documents.destroy', $document) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#" class="text-danger me-2" onclick="event.preventDefault(); if (confirm('Voulez-vous supprimer cet enregistrement ?')) { document.getElementById('delete-form-{{ $document->ndoc }}').submit(); }">
                            <i class="bi bi-trash"></i> <!-- Icône pour l'action Supprimer -->
                        </a>
                    
                      <a href="{{ route('documents.edit', $document) }}" class="text-success">
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
          <h5 class="card-title">Création d'un document</h5>

          <!-- Horizontal Form -->
          <form action="{{ route('documents.store') }}" method="POST">
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
              <label for="inputEmail3" class="col-sm-4 col-form-label">Libellé </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputText" name="libdoc">
              </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-4 col-form-label">Type</label>
                <div class="col-sm-8">
                    <select class="form-select" id="inputEmail" name="codtypedoc">
                        @foreach ($type_documents as $type_document)
                            <option value="{{ $type_document->codtypedoc }}">{{ $type_document->libtypedoc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Date</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" id="inputEmail" name="datdoc">
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