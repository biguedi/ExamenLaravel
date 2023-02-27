@include('navbar.app')
@include('layouts.app')
<div class="container mt-5">
    <div class="row bg-sucess p-3 mb-4">
        
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

<a type="button" class="btn btn-primary" href="{{route('ajoutCandidat')}}">
  Ajouter un Candidat
</a>
</div>
<div class="card-body" style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ; text-align:center;">
    <div class="card-header" style="background: rgb(102,205,170); color:white;text-align:center;">Liste Des Candidats</div>
        <table class="table table-bordered" id="list">
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>Email</th>
                <th>AGE</th>
                <th>NIVEAU D'ETUDE</th>
                <th>SEXE</th>
                <th>Formation</th>
                <th>ACTIONS</th>
            </tr>
            @foreach($candidats as $candidat)
            <tr>
                <td>{{ $candidat->nom }}</td>
                <td>{{ $candidat->prenom }}</td>
                <td>{{ $candidat->email }}</td>
                <td>{{ $candidat->age }}</td>
                <td>{{ $candidat->niveauEtude }}</td>
                <td>{{ $candidat->sexe }}</td>
                <td>{{ $candidat->formations->first()->nom}}</td>
                <td>
                    <a href="{{ route('upCand',$candidat->id)}}" class="btn btn-warning">✍🏽</a>
                    <form method="POST" action="{{route('candidats.destroy',$candidat->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()" title="Supprimer Candidat"><i class="fa fa-trash-o" aria-hidden="true"></i>🗑</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>  
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
<script>
$(document).ready(function () {
 
 $('#list').DataTable({

     language: {  url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json" }

 });

});
</script>

<script>
    function confirmDelete() {
        if (!confirm("Etes Vous sûr de vouloir supprimer ce Candidat?")) {
            return false;
        }
    }
</script>






