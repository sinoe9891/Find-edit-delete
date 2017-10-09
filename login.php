<?php 
include_once('utilities.php');
include_once('db/database_utilities.php');


if(isset( $_SESSION['uid'] ) )
{
  header('Location: admin.php');
  die();

}
if( $_POST )
{


   $error_encontrado="";
   $u = htmlspecialchars($_POST['user']);
   $p = htmlspecialchars($_POST["password"]);

   if (validar_clave($p, $error_encontrado)){


  $user_data = get_user_data_by_user($u);
  if($p == $user_data['password'])
  { 
    session_start();
    $_SESSION = array();
    $_SESSION['uid'] = $user_data['id'];
    header('Location: admin.php');
    die();
  }else{
      echo "PASSWORD INCORRECTO: " . $error_encontrado;
   }
}else{echo "PASSWORD INVALIDO";}

}


?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entomology | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>INGRESO DE REGISTROS</h3>
         <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <form method="post">
                  <div class="row">
                    <div class="large-6 columns">
                      <label>Usuario
                        <input pattern="[a-z]+" type="text" name="user" required />
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="large-6 columns">
                      <label>Contraseña
                        <input minlength="8" maxlength="16" pattern="[a-zA-Z0-9]+" type="password" name="password" required />
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


