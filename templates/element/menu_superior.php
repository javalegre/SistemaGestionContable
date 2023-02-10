<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
       <ul class="nav navbar-top-reportes welcome-message">
            <!-- < ?php if ($encola): ?>
                <li class="dropdown" id="menu-container">
                    <a class="count-info" href="#" title="Reportes en ejecuci&oacute;n">
                        <i class="fa fa-cogs"></i>  
                        <span class="label label-warning eye-catching">< ?= $encola ?></span>
                    </a>
                </li>
            < ?php endif; ?> -->
            <!-- <li class="dropdown" id="menu-container">
                <a class="count-info" href="/reportes/index" title="Bandeja de Reportes">
                    <i class="fa fa-inbox"></i>  
                    < ?php if ($total_reportes): ?>
                        <span class="label label-warning eye-catching">< ?= $total_reportes ?></span>
                    < ?php endif; ?>
                </a>
            </li> -->
        </ul>

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Bienvenido a <b>ElAgronomo.com</b></span>
            </li>
            <li class="dropdown" id="menu-container">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>  
                    <span class="label label-warning eye-catching">
                    -
                    </span>
                </a>
                <!-- Notificaciones -->
                  <ul class="dropdown-menu dropdown-messages" style="width: 450px; height: auto; max-height: 285px; overflow-y: auto;" id="messages-container"></ul>
            </li>
            <li><?= $this->Html->link('<i class="fa fa-sign-out"></i> Logout', ['plugin' => null, 'controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
            <li>
                <a class="right-sidebar-toggle">
                    <i class="fa fa-tasks"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
<script>
    $(document).ready(function(){
        // /* 
        //  *   Notificaciones
        //  *   En este lugar se cargan las notificaciones
        //  */
        // const MostrarNotificaciones = (notificaciones) => {
        //     /* Escribo la cantidad de mensajes */
        //     $('.dropdown .dropdown-toggle .label').text( notificaciones['total_unread']);
            
        //     $('#messages-container').html('');
            
        //     let Mensajes = notificaciones['mensajes'];
            
        //     for (let i = 0; i < Mensajes.length; i++) {
        //         let Notificacion =  Mensajes[i];
        //         let Titulo = Notificacion.title;
        //         /* Verifico si el titulo es de la Mips y tengo que poner un enlace */
        //         switch (Notificacion.template) {
        //             case 'Galeria':
        //             let TituloGaleria = JSON.parse( Notificacion.vars );
        //                 Titulo = `<a href="/galeria/index/${TituloGaleria.lote_id}/${TituloGaleria.establecimiento_id}/${TituloGaleria.sector_id}/${TituloGaleria.galeria}" class="titulo-notificacion-link">${Notificacion.title}</a>`;
        //                 break;
        //             case 'Mips':
        //                 let TituloMips = JSON.parse( Notificacion.vars );
        //                 /* Recibo los datos del controlador para armar url, recibo el dispositivo y id de comentario mip */
        //                 Titulo = `<a href="/mips/index?dispositivo=${TituloMips.dipositivo}&id=${TituloMips.numero}" class="titulo-notificacion-link">${Notificacion.title}</a>`;
        //                 break;
        //             default:
        //                 break;
        //         }
        //         let mensaje = `<li id="notificacion${ Notificacion.id }"><div class="dropdown-messages-box"> 
        //                     <small class="pull-right">${ moment( Notificacion.created, "YYYY-MM-DD").fromNow() }</small><br>
        //                     <strong>${ Titulo }</strong><br>
        //                     <small class="text-muted">${ Notificacion.body }</small>
        //                     <small class="pull-right"><a href="" data-id="${ Notificacion.id }" type="button" class="btn btn-xs no-padding MarcarLeido"><i class="fa fa-check"></i></a></small>
        //                     <li class="divider"></li>
        //                     </div></li>`;
        //         $('#messages-container').append(mensaje);
        //     }
        //     if (Mensajes.length === 0) {
        //         let mensaje = `<li><div class="dropdown-messages-box"><small class="text-muted">No existen notificaciones</small></div></li>`;
        //         $('#messages-container').append(mensaje);
        //     }
        // };
        // $('#messages-container').on('click', function (e) {
        //     //e.preventDefault();
        //     e.stopPropagation();
        // });
        // $('#messages-container').on('click', 'a.MarcarLeido', function (e) {
        //     e.preventDefault();
        //     e.stopPropagation();
            
        //     let id = e.currentTarget.getAttribute('data-id');

        //     /* Quito la notificacion */
        //     $(`#notificacion${ id }`).fadeOut(800, function(){
        //     });
            
        //     fetch('/notificaciones/leido/' + id )
        //         .then( res => res.json() )
        //         .then( data => {
        //             data.status === "success" && CargarNotificaciones();
        //         }); 
            
        // });

        // const CargarNotificaciones = () => {
        //     fetch('/notificaciones/get-notificationes-total/')
        //         .then( res => res.json() )
        //         .then( data => {
        //             /* Muestro las notificaciones */
        //             MostrarNotificaciones( data );
        //         })
        //         .catch( function(err) {
        //             console.log( err );
        //     });
        // };
        
        // /* Cargo todas las notificaciones */
        // CargarNotificaciones();
    });
</script>