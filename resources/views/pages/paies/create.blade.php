@extends('layouts.app')
@section('title')
	paies 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">paies</a></li>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Création d'une fiche de paie</h5>

          <!-- Horizontal Form -->
          <form action="{{ route('paies.store') }}" method="POST">
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
                <label for="inputEmail" class="col-sm-4 col-form-label">Direction</label>
                <div class="col-sm-8">
                    <select class="form-select" id="inputEmail" name="coddir">
                        @foreach ($directions as $direction)
                            <option value="{{ $direction->coddir }}">{{ $direction->coddir }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-4 col-form-label">Enseignant</label>
                <div class="col-sm-8">
                    <select class="form-select" id="inputEmail" name="nens">
                        @foreach ($enseignants as $enseignant)
                            <option value="{{ $enseignant->nens }}">{{ $enseignant->nens }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Montant</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputText" name="mont">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Date paiement</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="inputText" name="datpaie">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail" class="col-sm-4 col-form-label">Document</label>
                <div class="col-sm-8">
                    <select class="form-select" id="inputEmail" name="ndoc">
                        @foreach ($documents as $document)
                            <option value="{{ $document->ndoc }}">{{ $document->ndoc }}</option>
                        @endforeach
                    </select>
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