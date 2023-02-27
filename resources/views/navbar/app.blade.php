   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('types.index') }}"><i class="fas fa-bell pe-1"></i>Type</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('referentiels.index') }}"><i class="fas fa-bell pe-1"></i>Référentiel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('formations.index') }}"><i class="fas fa-bell pe-1"></i>Formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('candidats.index') }}"><i class="fas fa-plus-circle pe-1"></i>Candidat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('grapheIsStarted') }}"><i class="fas fa-bell pe-1"></i> Statistique_Des_Formation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('grapheSexe') }}"><i class="fas fa-bell pe-1"></i>Candidat/Sexe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('grapheAge') }}"><i class="fas fa-bell pe-1"></i>Tranches_Ages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="{{ route('candidat.form') }}"><i class="fas fa-bell pe-1"></i>Candidats/Formation</a>
          </li>
          <li>
            <a class="nav-link mx-1" href="{{ route('formation.type') }}"><i class="fas fa-bell pe-1"></i>Formations/Type</a>
          </li>
          <li>
            <a class="nav-link mx-1" href="{{ route('formation.ref') }}"><i class="fas fa-bell pe-1"></i>Formations/Référentiel</a>
          </li>

        </ul>  
      </div>
    </div>
  </nav>
  <!-- Navbar -->