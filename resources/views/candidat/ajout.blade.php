@include('navbar.app')
@include('layouts.app')

<div
  class="bg-image"
  style="
    background-image: url('https://previews.123rf.com/images/vska/vska1507/vska150700041/42383701-abstract-background-le-style-futuriste-de-la-technologie-elegant-background-pour-les-pr%C3%A9sentations-e.jpg');
    height: 100vh;
  "
>

<div class="container mt-5">
    
<div class="card" style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ;">
     <div class="card-header" style="background: rgb(102,205,170); color:white;text-align:center;">Ajouter un Candidat</div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> 
            </div>
        @endif
            <form action="{{ route('candidats.store') }}" id="form" method="POST">
                @csrf
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom">

                <label for="">Prénom</label>
                <input type="text" class="form-control" name="prenom">

                <label for="">Email</label>
                <input type="text" class="form-control" name="email">

                <label for="">Age</label>
                <input type="number" max="35" class="form-control" name="age">

                <label for="">Niveau d'Etude</label>
                <input type="text" class="form-control" name="niveauEtude">

                <label for="">Sexe</label>
                <select name="sexe" id="" class="form-control">
                    <option value="Masculin">Masculin</option>
                    <option value="Feminin">Feminin</option>
                </select>

                <label for="">Veuillez Choisir la Formation</label>
                <select name="formation" id="" class="form-control">
                    @foreach($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                    @endforeach
                </select>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{route('candidats.index')}}">Retour</a>
                    <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
