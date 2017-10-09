<?php
include_once('utilities.php');
include_once('db/database_utilities.php');

if( $_POST )
{

  $usuario = htmlspecialchars( $_POST['usuario'] ) ;
  $password = htmlspecialchars( $_POST['password'] );

  $user_data = get_user_data_by_usuario( $usuario );

  if($password == $user_data['password'])
  {
    $_SESSION['uid'] = $user_data['id'];
    header('Location: admin_user.php');
    die();
  }

}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>INGRESO DE SUPER USUARIOS</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <form method="post">
                  <div class="row">
                    <div class="large-6 columns">
                      <label>Usuario
                        <input type="text" name="usuario"  />
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-6 columns">
                      <label>Contraseña
                        <input type="password" name="password"  />
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-6 columns">
                      <input type="submit" class="button success tiny" value="ENTRAR" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>