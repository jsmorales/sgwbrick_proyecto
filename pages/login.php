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
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->                                
                            </fieldset>
                        </form>
                        <button id="btn_login" class="btn btn-lg btn-success btn-block">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
  include 'footer.php';
?>

<script src="../js/scripts_cont/login_script.js"></script>

</body>

</html>
