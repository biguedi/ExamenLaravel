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
    <div class="row bg-sucess p-3 mb-4">
      
    </div>
<div class="card" style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ;">
     <div class="card-header" style="background: rgb(102,205,170); color:white;text-align:center;">Ajouter une Formation</div>
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
        <form action="{{ route('formations.store') }}"  method="POST">
                @csrf
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom">
                <label for="">Durée</label>
                <input type="number" class="form-control" name="duree">
                <label for="">Description</label>
                <input type="text" class="form-control" name="descrition">
                <label for="">A t-il Démarer</label>
                <select name="isStarted" class="form-control">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
                <label for="">Date de Début</label>
                <input type="date" class="form-control" name="dateD">
                <label for="">Veuillez Choisir Le Référentiel</label>
                <select name="referentiel" id="" class="form-control">
                    @foreach($referentiels as $referentiel)
                        <option value="{{ $referentiel->id }}">{{ $referentiel->libelle }}</option>
                    @endforeach
                </select>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{route('formations.index')}}">Retour</a>
                    <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
