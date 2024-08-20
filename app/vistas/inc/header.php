<!DOCTYPE html>
<html>
  <head>
    <!-- This tells the browser to use the UTF-8 character encoding when translating machine code into human-readable text. -->
    <meta charset="UTF-8" />

    <!-- This tells the browser how should it render this HTML document. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- This meta tag allows web authors to choose what version of Internet Explorer the page should be rendered as. -->
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>

    <!-- Bootstrap’s compiled CSS or JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- This is the style of the HTML document. -->
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL; ?>/css/estilos.css">
    

    <!-- This is the title of this HTML document. --> 
    <title><?php echo NOMBRESITIO; ?></title>

    <!-- This is the icon you see in the page tab. -->
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/img/logoTransparente.ico">

  </head>
  
  <body>
    
    <header>

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        
      <!-- Container wrapper -->
        <div class="container">
          
        <!-- Toggle button -->
          <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="paginas/inicio.php">
              <img src="img/logoTransparente.ico" class="d-inline-block align-bottom" width="55" height="55" alt="Logo Syntropy">
              <div class="text-wrap fs-6 text-primary lh-1" style="width: 6rem">Syntropy Telecomunicaciones.</div>
            </a>
            <!-- End: Navbar brand -->

            <!-- Left links -->
            <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link mx-5" href="#">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-5" href="#">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-5" href="#">Projects</a>
              </li>
            </ul>
            <!-- End: Left links -->

          </div>
          <!-- End: Collapsible wrapper -->

          <!-- Right elements -->
          <div class="d-flex align-items-center">
            
            <!-- Log in -->

            <!-- Bottom -->
            <a href="#" id="" class="nav-link">
              <span class="clearfix d-none d-sm-inline-block" data-toggle="modal" data-target="#login">Ingresa...
                <i class="fa fa-sign-in mr-1"></i>
              </span>
            </a>
            <!-- End: Bottom -->

            <!-- Modal Log in-->
            <div class="modal fade right" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
              <!--Modal: Contact form-->
              <div class="modal-dialog cascading-modal modal-sm modal-side modal-top-right" role="document">

                <!--Content-->
                <div class="modal-content">

                  <!--Header-->
                  <div class="modal-header info-color white-text">
                    <h4 class="title">
                      <i class="fa fa-id-card-o" aria-hidden="true"></i>
                      Bienvenido!!!
                    </h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>

                  </div>

                  <!--Body-->
                  <div class="modal-body">

                    <!-- Default input name -->
                    <i class="fa fa-user prefix grey-text"></i>
                    <label for="user"> Usuario</label>
                    <input type="text" id="user" class="form-control form-control-sm">

                    <br>

                    <!-- Default input email -->
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label for="password"> Contraseña</label>
                    <input type="password" id="password" class="form-control form-control-sm">

                    <br>

                    <div class="text-center mt-4 mb-2">
                      <button class="btn btn-info">Enviar
                        <i class="fa fa-send ml-2"></i>
                      </button>
                    </div>

                  </div>
                </div>
                <!--/.Content-->
              </div>
              <!--/Modal: Contact form-->
            </div>
            <!-- End: Modal Log in -->

            <!-- End: Log in -->

        </div>

        </div>  

      </nav>
  
      <!-- Navbar -->
    </header>


    <main>

    </main>

    <footer>

    </footer>

    