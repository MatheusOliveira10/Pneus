<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px">
  <a class="navbar-brand" href="/home">SEMB Toshiba</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/clientes">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/vendas">Vendas</a>
      </li><li class="nav-item">
        <a class="nav-link" href="/categorias">Categorias</a>
      </li>
      <div class="dropdown-divider"></div>
      @if(Auth::check())
    </ul>
    <ul class="navbar-nav float-right">
      <li class="nav-item">
      <a class="nav-link">{{Auth::user()->name}}</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
      </li>
    </ul>
      @else
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register')}}">Registrar</a>
        </li>
        </ul>
      @endif       
    </ul>
  </div>
</nav>
