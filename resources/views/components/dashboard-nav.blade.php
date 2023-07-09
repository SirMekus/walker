<nav class="navbar navbar-expand-lg navbar-light nav-sticky bg-white">
  <div class="container navigation">
    <div>
      <input type="search" placeholder="Search" name="text" class="form-control input-sm" />
    </div>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="nav justify-content-end nav-ul">
        <li class="nav-item ">
          <a class="nav-link text-dark" aria-current="page" href="#"><i class="fas fa-bell"></i>Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#"><i class="fas fa-cog"></i>Tools</a>
        </li>

        <li class="nav-item">

          <a href="#"
            class="nav-link text-dark"><i
              class="fas fa-question-circle"></i>Help </a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand ps-4" href="{{ route('home') }}"> <img src="{{ asset('storage/for_site/heart.png')}}" alt=""
              srcset="" width="24px" height="20px"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>