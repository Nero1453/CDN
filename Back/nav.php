<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">CDN</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
                <a class="nav-link" href="index.php                                                                                                                                                                                                                       ">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tareas">
                <a class="nav-link" href="todo.php">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">Tareas</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Calendario">
                <a class="nav-link" href="calendario.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Calendario</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Estadisticas">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Estadisticas</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="posiciones.php">Posiciones</a>
                    </li>
                    <li>
                        <a href="goleadores.php">Goleadores</a>
                    </li>
                    <li>
                        <a href="sanciones.php">Sanciones</a>
                    </li>
                </ul>
            </li>
            <?php require_once 'controller\validacion.php';
            if ($navRol == true) : ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modificar">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Modificar</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents2">
                        <li>
                            <a href="player.php">Jugadores</a>
                        </li>
                        <li>
                            <a href="team.php">Equipos</a>
                        </li>
                        <li>
                            <a href="arbitro.php">Arbitros</a>
                        </li>
                        <li>
                            <a href="cancha.php">Canchas</a>
                        </li>
                        <li>
                            <a href="user.php">Usuarios</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li> -->
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modificar Fixture">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Modf. Fixture</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents4">
                        <li>
                            <a href="fixture.php">Crear Fixture</a>
                        </li>
                        <li>
                            <a href="configFixture.php">Editar Fixture</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Modificar Sitio Web">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Modf. Contenido</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents3">
                        <li>
                            <a href="modInicio.php">Inicio</a>
                        </li>
                        <li>
                            <a href="modAbout.php">Quienes Somos</a>
                        </li>
                        <li>
                            <a href="modService.php">Servicios</a>
                        </li>
                        <li>
                            <a href="#">Contacto</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Messages
                        <span class="badge badge-pill badge-primary">12 New</span>
                    </span>
                    <span class="indicator text-primary d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">Mensajes</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>David Miller</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>Jane Smith</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <strong>John Doe</strong>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">Ver Mensajes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Notificaciones
                        <span class="badge badge-pill badge-warning">6 Nuevas Notificaciones</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Nuevas Notificaciones:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-danger">
                            <strong>
                                <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">11:21 AM</span>
                        <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">Ver Todas las Notificaciones</a>
                </div>
            </li> -->
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="¿Que buscas?...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Salir</a>
            </li>
        </ul>
    </div>
</nav>