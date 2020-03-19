<li class="nav-item">
  <a class="dropdown-item" href="{{ route('logout') }}"
     onclick="event.preventDefault();
     document.getElementById('logout-form').submit();"
  >
      {{ __("Cerrar sesión") }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</li>
