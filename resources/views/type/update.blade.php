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
            <form action="{{ route('types.update',$type->id) }}" method="POST">
                @csrf
                <label for="">Libellé</label>
                <input type="text" class="form-control" name="libelle" value="{{$type->libelle}}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary mt-3 offset-4"><i class="fa fa-btn fa-sign-in"></i>Enregistrer</button>
            </form>
        </div>
    </div>
</div>
</div>
