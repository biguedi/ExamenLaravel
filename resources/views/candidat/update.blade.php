@include('layouts.app')

<div
  class="bg-image"
  style="
    background-image: url('https://previews.123rf.com/images/vska/vska1507/vska150700041/42383701-abstract-background-le-style-futuriste-de-la-technologie-elegant-background-pour-les-pr%C3%A9sentations-e.jpg');
    height: 100vh;
  "
>


<div class="container mt-2">
    <div class="row bg-sucess p-3 mb-4">
        
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            return {{session('success')}}
        </div>
    @endif
<div class="col-md-6 offset-3">
            <div class="card" style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ;">
            <div class="card-header" style="background: rgb(102,205,170); color:white;text-align:center;">Modifier Candidant</div>
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
            <form action="{{ route('candidats.update',$candidat->id) }}" method="POST">
                @csrf
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{$candidat->nom}}">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{$candidat->prenom}}">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{$candidat->email}}">
                <label for="">Age</label>
                <input type="number" max="35" class="form-control" name="age" value="{{$candidat->age}}">
                <label for="">Niveau d'Etude</label>
                <input type="text" class="form-control" name="niveauEtude" value="{{$candidat->niveauEtude}}">
                <label for="">Sexe</label>
                <select name="sexe" id="sexe" class="form-control">
                    <option value="Masculin" {{ $candidat->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Feminin" {{ $candidat->sexe == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                </select>
                <label for="">Veuillez Choisir La Formation</label>
                <select name="formation" id="" class="form-control">
                    @foreach($formations as $formation)
                        <option value="{{ $formation->id }}" {{ $formation->id == $candidat->formations->first()->id ? 'selected' : '' }}>{{ $formation->nom }}</option>
                    @endforeach
                </select>
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
            <button type="submit" class="btn btn-primary mt-3 offset-4"><i class="fa fa-btn fa-sign-in"></i>Enregistrer</button>
            </form>
        </div>
    </div>
</div>
