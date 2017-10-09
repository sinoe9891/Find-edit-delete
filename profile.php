<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
if( !isset( $_SESSION['uid'] ) )
{
  header('Location: index.php');
  die();

}elseif (isset( $_SESSION['uid'] )) {
  # code...

$user_id = $_SESSION['uid'];
$user_data = get_user_data_by_id( $user_id );

if( $_POST )
{ 
  $passwordA = htmlspecialchars($_POST['passwordAct']);
  $passwordN = htmlspecialchars($_POST['passwordNew']);
  $passwordNR = htmlspecialchars($_POST['passwordNewRep']);
  $error_encontrado='';
  
  if (validar_clave($passwordA, $error_encontrado) && validar_clave($passwordNR, $error_encontrado) && validar_clave($passwordNR, $error_encontrado)) {
    if ($passwordN==$passwordNR) {
      update_user_address($user_id, $passwordN);
      Echo 'Contraseña Actualizada';
      }else{
        echo 'Contraseña NO Actualizada';}
        Echo 'Contraseñas Validas';
  }else{
    echo 'Contraseñas NO Validas';
    echo "Datos INCORRECTOS, Verifique si su clave cumple con los requisitos ";
    echo "Debe contener al menos una mayuscula, una miniscula y un valor numerico";
    }

  }
        
        

      


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
                        <label><b>name:</b>
                          <h2><?php echo $user_data['name'] ?></h2>
                        </label>
                      </div>
                      <div class="large-6 columns">
                        <label><b>Departamento:</b>
                          <h2><?php echo $user_data['departamento'] ?></h2>
                        </label>
                      </div>
                      <div class="large-6 columns">
                        <label><b>Usuario:</b>
                          <h2><?php echo $user_data['user'] ?></h2>
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
                        
                          <h2>Cambiar Contraseña</h2>
                        <label>La contraseña debe contener al menos una mayuscula, una minuscula, un valor numerico y estar comprendida entre 8 y 16 caracteres</label>

                        <?php //Utilizar Required causa problema con el patron (Pattern) ?>
                        <label>Contraseña Actual
                        <input pattern="[a-zA-Z0-9]+" minlength="8" maxlength="16"  type="password" name="passwordAct" />
                        </label>

                        <label>Nueva Contraseña 
                        <input  pattern="[a-zA-Z0-9]+" minlength="8" maxlength="16" type="password" name="passwordNew" />
                        </label>

                        <label>Confirmar Nueva Contraseña 
                        <input  pattern="[a-zA-Z0-9]+" minlength="8" maxlength="16" type="password" name="passwordNewRep" />
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
    

    <?php require_once('footer.php');

    } ?>
