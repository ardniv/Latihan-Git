<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="side/fonts/icomoon/style.css">

    <link rel="stylesheet" href="side/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="side/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="side/css/style.css">

    <title>Dashboard-User</title>
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      
      @include('layout.sidebar')
      
    </aside>
    <main>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">


            @yield('content')

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Change form method to GET -->
                <form action="{{ route('logout') }}" method="GET">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Logout</h5>
                    </div>
                    <div class="modal-body">
                    Are you sure you want to logout?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button> <!-- Submit button triggers GET request -->
                    </div>
                </form>
                </div>
            </div>
            </div>


          </div>
        </div>
      </div>  
    </main>
    
    

    <script src="side/js/jquery-3.3.1.min.js"></script>
    <script src="side/js/popper.min.js"></script>
    <script src="side/js/bootstrap.min.js"></script>
    <script src="side/js/main.js"></script>
  </body>
</html>