<header>
    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Site X</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto">
                  <li class="nav-item">
                      <a class="nav-link active fw-bold" aria-current="page" href="/">Início</a>
                  </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('meetings.index') }}">Salas</a>
                </li>
              </ul>
              <div class="navbar-nav">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Config</a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="btn btn-primary mx-3" ><i class="fa-solid fa-right-from-bracket"></i> Sair</button>                         
                          </form>
                      </ul>
                  </li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
</header>