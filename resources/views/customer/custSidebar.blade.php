<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  @if (session('welcome-from-data-input'))
  <div class="alert-con">
    <div class="alert alert-light alert-dismissible fade show" style="text-align:center;height:75px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);" role="alert">
      <label>{{ session('welcome-from-data-input') }}</label>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  <body>
    <nav style="background-color:white">
      <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class='bx bx-arrow-back'></i>
          <span class="logo-name"><img src="{{asset('images/keynlock-logo.png')}}" alt="Logo" style="width:100%"></span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="/customer-dashboard" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            <li class="list">
              <a href="/customer-order-history" class="nav-link">
                <i class="bx bx-bar-chart-alt-2 icon"></i>
                <span class="link">Order History</span>
              </a>
            </li>
            <li class="list">
              <a href="/customer-account-settings" class="nav-link">
                <i class="bx bx-cog icon"></i>
                <span class="link">Settings</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <form action="/logout" method="post">
                @csrf
                <button class="nav-link"type="submit"><i class="bx bx-log-out icon"></i>Logout</button>
              </form> 
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="main-content">
      <div class="container">
        @section('content')
        
        @show
        
      </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
 
    <script>
      const navBar = document.querySelector("nav"),
  menuBtns = document.querySelectorAll(".logo"),
  overlay = document.querySelector(".overlay");

menuBtns.forEach((menuBtn) => {
  menuBtn.addEventListener("click", () => {
    navBar.classList.toggle("open");
    document.querySelector('.main-content').classList.toggle("shifted");
  });
});

overlay.addEventListener("click", () => {
  navBar.classList.remove("open");
  document.querySelector('.logo').classList.remove("shifted");
});
    </script>
    
  </body>
</html>
