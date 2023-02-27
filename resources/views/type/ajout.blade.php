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
        
    </div><br>
    <div class="card" style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ;">
     <div class="card-header" style="background: rgb(102,205,170); color:white;text-align:center;">Ajouter un type</div>
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
        <form action="{{ route('types.store') }}"  method="POST">
                @csrf
                <label for="">Libellé</label>
                <input type="text" class="form-control" name="libelle">
                <div class="modal-footer">
                <a type="button" class="btn btn-secondary" href="{{route('types.index')}}">Retour</a>
                    <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
