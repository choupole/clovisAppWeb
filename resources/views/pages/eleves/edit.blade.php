@extends('layouts.app')
@section('title')
	Eleves 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">Eleves</a></li>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modification des informations de l'élève</h5>

          <!-- Horizontal Form -->
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
            <form action="{{ route('eleves.update', $eleve->nelev) }}" method="POST">
                @csrf   
                @method('PUT')
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="nom" value="{{ $eleve->nom }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Postnom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="postnom" value="{{ $eleve->postnom }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Prénom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="prenom" value="{{ $eleve->prenom }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Sexe</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="inputText" name="sexe" value="{{ $eleve->sexe }}">
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-4 col-form-label">Classe de l'élève</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="inputEmail" name="codclas">
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->codclas }}">{{ $classe->codclas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
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