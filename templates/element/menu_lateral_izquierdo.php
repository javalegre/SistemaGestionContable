<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><?= $this->Html->image($this->request->getSession()->read('Auth.ruta_imagen'), ['class' => 'img-circle img-md']) ?></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span><strong><span class="text-xs block m-t-xs"><?= $this->request->getSession()->read('Auth.nombre') ?> <b class="caret"></b></span></strong></span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><?= $this->Html->link('<i class="fa fa-user"></i> Mi Perfil', ['controller' => 'users', 'action' => 'view', $this->request->getSession()->read('Auth.id')], ['escape' => false]) ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link('<i class="fa fa-key"></i> Cambiar clave', ['controller' => 'users', 'action' => 'password2', $this->request->getSession()->read('Auth.id')], ['escape' => false]) ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link('<i class="fa fa-sign-out"></i> Logout', ['controller' => 'users', 'action' => 'logout'], ['escape' => false]) ?></li>
                    </ul>
                </div>
                <div class="logo-element"><?= $system_abbr ?></div>
            </li>
            <li><a href="/"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span>  </a></li>
        </ul>
    </div>
</nav>
