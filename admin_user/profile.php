<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
if( !isset( $_SESSION['uid'] ) )
{
  header('Location: index.php');
  die();

}
$user_id = $_SESSION['uid'];


if( $_POST )
{
  $address = isset( $_POST['address'] ) ? $_POST['address'] : '';
  update_user_address($user_id, $address);
}

$user_data = get_user_data_by_id( $user_id );

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header_profile.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h2>Tu Perfil</h2>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                  <form method="post">
                    <div class="row">
                      <div class="large-6 columns">
                        <label><b>Nombre:</b>
                          <h2><?php echo $user_data['nombre'] ?></h2>
                        </label>
                      </div>
                      <div class="large-6 columns">
                        <label><b>Departamento:</b>
                          <h2><?php echo $user_data['departamento'] ?></h2>
                        </label>
                      </div>
                      <div class="large-6 columns">
                        <label><b>Usuario:</b>
                          <h2><?php echo $user_data['usuario'] ?></h2>
                        </label>
                      </div>
                      <div class="large-6 columns">
                        <label>Cargo:
                          <h2><?php echo $user_data['cargo'] ?></h2>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns">
                        <label>Contraseña
                          <textarea name="password" id="txapassword"><?php echo $user_data['password'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns">
                        <input type="submit" class="button success tiny" value="MODIFICAR CONTRASEÑA" />
                      </div>
                    </div>
                  </form>
                  </div>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>