<nav class="navbar navbar-expand-lg navbar-light nav-sticky bg-white">
  <div class="container navigation">
    <div>
      <input type="search" name="text" class="form-control input-sm" />
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
            class="nav-link @if(Route::currentRouteName() == 'login') home-color text-white @endif text-dark"><i
              class="fas fa-question-circle"></i>Help </a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="{{ route('home') }}"> <img src="{{ asset('storage/for_site/heart.png')}}" alt=""
              srcset="" width="24px" height="20px"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-end gap-1">
  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:#f8ac21de'>
    <span>$500</span>
    <div class='d-flex justify-content-end'>
      <span>Revenue</span>
    </div>
    <div class='d-flex'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+112.23</span>
      </div>
      <div class="flex-grow-1 ms-3 justify-content-end">
        <span class='float-end fs-6'>(Last 30 days)</span>
      </div>
    </div>
  </div>

  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:green;'>
    <span>$300</span>
    <div class='d-flex mt-3'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+12.5</span>
      </div>
      <div class="flex-grow-1 ms-3 justify-content-end">
        <span class='float-end fs-6'>Gross Margin</span>
      </div>
    </div>
  </div>

  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:green;'>
    <span>$200</span>
    <div class='d-flex justify-content-end'>
      <span>ROI</span>
    </div>
    <div class='d-flex mt-3'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+12.5</span>
      </div>
      <div class="flex-grow-1 ms-3 justify-content-end">
        <span class='float-end fs-6'>Gross Margin</span>
      </div>
    </div>
  </div>

  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:green;'>
    <span>$200</span>
    <div class='d-flex justify-content-end'>
      <span>ROI</span>
    </div>
    <div class='d-flex mt-3'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+12.5</span>
      </div>
      <div class="flex-grow-1 ms-3 justify-content-end">
        <span class='float-end fs-6'>Gross Margin</span>
      </div>
    </div>
  </div>

  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:green;'>
    <span>$200</span>
    <div class='d-flex justify-content-end'>
      <span>ROI</span>
    </div>
    <div class='d-flex mt-3'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+12.5</span>
      </div>
      <div class="flex-grow-1 ms-3 justify-content-end">
        <span class='float-end fs-6'>Gross Margin</span>
      </div>
    </div>
  </div>

  <div class="flex-shrink-1 border px-2 rounded-3 text-white fw-bold" style='background-color:green;'>
    <span>$200</span>
    <div class='d-flex justify-content-end'>
      <span>ROI</span>
    </div>
    <div class='d-flex mt-3'>
      <div class="flex-shrink-0">
        <span class="pt-5">%+12.5</span>
      </div>
      <div class="flex-grow-1 ms-2 justify-content-end">
        <span class='float-end fs-6'>Gross Margin</span>
      </div>
    </div>
  </div>
  
</div>