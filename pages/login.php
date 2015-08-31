<?php
    include 'encabezado.php';
 ?>

<body>

    <div class="container">
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">                
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingresa a Brick</h3>
                    </div>
                    <div class="panel-body">
                        <!-- --> 
                           <h3 class="text-center">Brick</h3>               
                           <h1 class="flaticon-wall20 text-center logo-icono"></h1>
                        <!-- -->
                        <form role="form" action="../controller/login_autentica.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input id="username" name="username" class="form-control" placeholder="Usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password" name="password" class="form-control" placeholder="Contraseña" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form --> 
                                <button id="btn_login" class="btn btn-lg btn-success btn-block">Ingresar</button>                               
                            </fieldset>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
  include 'footer.php';
?>

</body>

</html>
