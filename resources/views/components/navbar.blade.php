
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://rb.gy/cprnf1" alt="" width="200px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Promotion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/admin/detail">you</a>
          </li>
          
          {{-- <li class=nav-item>
            <a href="/admin" class="nav-link text-success">+ Add Blog</a>
          </li> --}}
        </ul>

        <div class="d-flex gap-2">
            @if (auth()->check())
            <form action="/logout" method="POST">
                @csrf
                <button class="btn p-2 badge text-bg-secondary">Logout</button>
                <a href="" class="btn p-2 badge btn-primary">
                  <i class="fa-solid fa-user"></i>
                  {{auth()->user()->username}}
                </a>
                
            </form>
            @else
                <a href="/login" class="btn p-2 badge btn-secondary btn-sm">Login</a>
                <a href="/register" class="btn badge btn-primary">Register</a>   
            @endif
        </div>
      </div>
    </div>
  </nav>