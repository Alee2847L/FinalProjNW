<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{SITE_TITLE}}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Iconos de FontAwesome solo para las redes sociales -->
    <script src="https://kit.fontawesome.com/6f8515ba1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link rel="stylesheet" href="public/css/style2.css" />

     <!-- Menu de navegacion -->

    <div class="navbar-fixed">
      <nav class="cyan lighten-1">
        <div class="nav-wrapper container">
          <a href="index.php?page=iniciopublico" class="brand-logo">SysTech <i class="far fa-lightbulb material-icons left"></i></a>
          <a href="#" data-target="menu-side" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
          {{with login}}
              <li><span>{{userName}}</span></li>
            {{endwith login}}>
            {{foreach NAVIGATION}}
            <li><a href="{{nav_url}}">{{nav_label}}</a></li>
            {{endfor NAVIGATION}}
            
            <li>
              <a href="index.php?page=sec_login">Salir</a>
            </li>
 
          </ul>
        </div>
      </nav>
    </div>

    <ul class="sidenav" id="menu-side">
      <li>
              <a href="index.php"
                ><i class="fas fa-home material-icons left"></i>Inicio</a
              >
            </li>
            <li>
              <a class="dropdown-trigger" href="#" data-target="Movil1"
                >Móviles<i class="fas fa-mobile material-icons left"></i></i></a
              >
            </li>
            <li>
              <a class="dropdown-trigger" href="#" data-target="Tecnologia1"
                >Computadoras<i class="fas fa-laptop material-icons left"></i>
                </a
              >
            </li>
            <li>
              <a class="dropdown-trigger" href="#" data-target="Servicios"
                >Servicios<i class="fas fa-briefcase aterial-icons left"></i></a>
            </li>
    </ul>


    <!-- Movil -->

    <ul id="Movil1" class="dropdown-content">
      <li>
        <a href="#" class="blue-text">Lo nuevo en móviles</a>
      </li>
      <li><a href="#" class="blue-text">Android</a></li>
      <li><a href="#" class="blue-text">IOS</a></li>
    </ul>

    <ul id="Movil2" class="dropdown-content blue darken-2">
      <li>
        <a href="#l" class="white-text">Lo nuevo en móviles</a>
      </li>
      <li><a href="#" class="white-text">Android</a></li>
      <li><a href="#" class="white-text">IOS</a></li>
    </ul>
    <!-- Fin Movil -->
    <!-- Tecnologías -->

    <ul id="Tecnologia1" class="dropdown-content">
      <li>
        <a href="pages/tecnologiadelfuturo.html" class="blue-text"
          >Tecnologías del Futuro</a
        >
      </li>
      <li>
        <a href="pages/tecnologiaenlamedicina.html" class="blue-text"
          >Tecnología en la medicina</a
        >
      </li>
      <li><a href="#" class="blue-text">Tecnología 5G</a></li>
      <li><a href="#" class="blue-text">Tecnología Blockchain</a></li>
      <li><a href="#" class="blue-text">Realidad virtual</a></li>
      <li>
        <a href="pages/InteligenciaArtificial.html" class="blue-text"
          >Inteligencia artificial</a
        >
      </li>
      <li><a href="pages/robotica.html" class="blue-text">Robotica</a></li>
    </ul>
    <ul id="Tecnologia2" class="dropdown-content blue darken-2">
      <li>
        <a href="pages/tecnologiadelfuturo.html" class="white-text"
          >Tecnologías del Futuro</a
        >
      </li>
      <li>
        <a href="pages/tecnologiaenlamedicina.html" class="white-text"
          >Tecnología en la medicina</a
        >
      </li>
      <li><a href="#" class="white-text">Tecnología 5G</a></li>
      <li><a href="#" class="white-text">Tecnología Blockchain</a></li>
      <li><a href="#" class="white-text">Realidad virtual</a></li>
      <li>
        <a href="pages/InteligenciaArtificial.html" class="white-text"
          >Inteligencia artificial</a
        >
      </li>
      <li><a href="pages/robotica.html" class="white-text">Robotica</a></li>
    </ul>
    <!-- Fin Tecnologías-->
    <!-- Tecnologías -->
</head>


<body>
    {{{page_content}}}
</body>

<!-- Footer -->
<footer class="page-footer cyan lighten-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <th><i class="fas fa-store-alt colorh1">Mi Tienda</i></th>
                <h5 class="white-text">Un sitio Web creado en Negocios Web</h5>
                <p class="grey-text text-lighten-4">
                    Ejercicio de ejemplo para fines de aprendizaje
                </p>
            </div>
        </div>
    </div>

    <div class="footer-copyright grey darken-3">
        <div class="container center">
            Mi Tiendita - Todos los derechos reservados 2021 &copy;
        </div>
    </div>
</footer>

</html>