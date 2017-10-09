<?php
include_once('utilities.php');
include_once('db/database_utilities.php');

if( $_POST )
{

  header('Location: admin_user.php');
  //die();
  $name = isset( $_POST['name'] ) ? $_POST['name'] : '';
  $user = isset( $_POST['user'] ) ? $_POST['user'] : '';
  $cargo = isset( $_POST['cargo'] ) ? $_POST['cargo'] : '';
  $departamento = isset( $_POST['departamento'] ) ? $_POST['departamento'] : '';
  $email = isset( $_POST['email'] ) ? $_POST['email'] : '';
  $password = isset( $_POST['password'] ) ? $_POST['password'] : '';

  add( $name, $user, $email, $password, $cargo, $departamento );
  die();

}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header_newuser.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar nuevo registro</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
              <div class="row">
                  <div class="large-12 columns">
                    <label>User
                      <input type="text" name="user" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Nombre
                      <input type="text" name="name" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Cargo
                      <input type="text" name="cargo" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Departamento
                      <input type="text" name="departamento" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Correo
                      <input type="text" name="email" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Contraseña
                      <input type="password" name="password" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" value="AGREGAR" />
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>