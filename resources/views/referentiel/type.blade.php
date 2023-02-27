@include('navbar.app')
@include('layouts.app')

<style>
    .t1{
  border : 2px solid black;
}
.t2 td, .t2 th{
  border: 1px solid orange;
}
</style>

<div class="container mt-5">
    <div class="row bg-sucess p-3 mb-4">
        <h3 style="box-shadow:2px 2px 20px pink,2px 2px 20px grey ; text-align:center;"> NOMBRES DE REFERENTIEL PAR TYPE</h3>
    </div>

    <table class="t1 t2">
  
  <tr>
    <th>Type &ensp; &ensp; &ensp; &ensp; &ensp;</th>
    <th>Référenciel &ensp; &ensp; &ensp;</th>
  </tr>
  
  @foreach ($referentiels as $referentiel) 
  <tr>
  <td>{{$referentiel->libelle}}</td>
    <td>{{$referentiel->formations_count}}</td>
    
  </tr>
  
  @endforeach
</table>
    
</div>