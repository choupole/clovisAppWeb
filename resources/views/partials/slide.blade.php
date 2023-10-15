<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href=" {{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-fill"></i><span>Eleves</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('eleves.create') }}">
              <i class="bi bi-circle"></i><span>Nouveau</span>
            </a>
          </li>
          <li>
            <a href="{{ route('eleves.index') }}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#agents-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Agents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="agents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('agents.create') }}">
              <i class="bi bi-circle"></i><span>Nouveau</span>
            </a>
          </li>
          <li>
            <a href="{{ route('agents.index') }}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#enseignants-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-award-fill"></i><span>Enseignants</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="enseignants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('enseignants.create') }}">
              <i class="bi bi-circle"></i><span>Nouveau</span>
            </a>
          </li>
          <li>
            <a href="{{ route('enseignants.index') }}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#paies-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Paies</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="paies-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('paies.create') }}">
              <i class="bi bi-circle"></i><span>Nouveau</span>
            </a>
          </li>
          <li>
            <a href="{{ route('paies.index') }}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#configurations-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Configurations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="configurations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('classes.index') }}">
              <i class="bi bi-cash-stack"></i><span>Classes</span>
            </a>
          </li>
          <li>
            <a href="{{ route('documents.index') }}">
              <i class="bi bi-file-text"></i><span>Documents</span>
            </a>
          </li>
          <li>
            <a href="{{ route('type_documents.index') }}">
              <i class="bi bi-building"></i><span>Type document</span>
            </a>
          </li>
          <li>
            <a href="{{ route('prestations.index') }}">
              <i class="bi bi-building"></i><span>prestations</span>
            </a>
          </li>
          <li>
            <a href="{{ route('directions.index') }}">
              <i class="bi bi-building"></i><span>Directions</span>
            </a>
          </li>
          <li>
            <a href="{{ route('caisses.index') }}">
              <i class="bi bi-building"></i><span>Caisses</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside>