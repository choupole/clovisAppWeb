@extends('layouts.app')
@section('title')
	agents 
@endsection
@section('filsAriane')
<li class="breadcrumb-item"><a href="index.html">agents</a></li>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Modification d'un agent</h5>
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
            <form action="{{ route('agents.update', $agent) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="nom" value="{{ $agent->nom }}">
                    </div>
                </div>  
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Postnom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="postnom" value="{{ $agent->postnom }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Prénom</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputText" name="prenom" value="{{ $agent->prenom }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Sexe</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="inputText" name="sexe" value="{{ $agent->sexe }}">
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-4 col-form-label">Direction de l'agent</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="inputEmail" name="coddir">
                            @foreach ($directions as $direction)
                                <option value="{{ $direction->coddir }}">{{ $direction->libdir }}</option>
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