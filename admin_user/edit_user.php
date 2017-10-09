<?php
include_once('utilities.php');
include_once('db/database_utilities.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

if( $_POST )
{

  header('Location: admin_user.php');
  //die();
  $user = isset( $_POST['user'] ) ? $_POST['user'] : '';
  $name = isset( $_POST['name'] ) ? $_POST['name'] : '';
  $email = isset( $_POST['email'] ) ? $_POST['email'] : '';
  $cargo = isset( $_POST['cargo'] ) ? $_POST['cargo'] : '';
  $password = isset( $_POST['password'] ) ? $_POST['password'] : '';
  $departamento = isset( $_POST['departamento'] ) ? $_POST['departamento'] : '';
  
  update( $id, $name, $email, $cargo, $password, $departamento );
  die();

}

$user = get_user_by_id( $id );

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Usuario | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header_edituser.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Modifica registro de </b><?php echo $user['name']; ?></h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                <div class="row">
                  <div class="large-12 columns">
                    <label>User
                      <input type="text" name="user" value="<?php echo $user['user']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Nombre
                      <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Email
                      <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Contraseña
                      <input type="password" name="password" value="<?php echo $user['password']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Cargo
                      <input type="text" name="cargo" value="<?php echo $user['cargo']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-12 columns">
                    <label>Departamento
                      <input type="text" name="departamento" value="<?php echo $user['departamento']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" value="MODIFICAR" />
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>