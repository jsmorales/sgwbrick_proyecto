<?php 
    $nombre = $_COOKIE["log_usuario_nombre"];
    $alias = $_COOKIE["log_usuario_alias"];
    $tipo = $_COOKIE["log_usuario_tipo"];
 ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_p.php"><span class="flaticon-wall20"></span> Brick</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">          
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?php echo $nombre ?></a>
                        </li>
                        <li><a href="#"><i class="fa fa-tag fa-fw"></i> <?php echo $tipo ?></a>
                        </li>                        
                        <li class="divider"></li>
                        <li><a href="../controller/logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir de Brick</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links acaba menu superior-->

            