<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
$result = run_query();

?>
  <style>

  /* 
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
    .title {display: none;}
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr { 
      display: block; 
      width: 370px
    }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr { 
      position: absolute;
      top: -9999px;
      left: -9999px;
    }
    
    tr { 
      border: 1px solid #ccc; }
    
    td { 
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee; 
      position: relative;
      padding-left: 45%; 
    }
    
    td:before { 
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 60%; 
      padding-right: 10px; 
      white-space: nowrap;
    }
    
    /*
    Label the data
    */
    td:nth-of-type(1):before { content: "ID";}
    td:nth-of-type(2):before { content: "Nombre"; }
    td:nth-of-type(3):before { content: "Usuario"; }
  }
  
  /* Smartphones (portrait and landscape) ----------- */
  @media only screen
  and (min-device-width : 320px)
  and (max-device-width : 480px) {
    body { 
      padding: 0; 
      margin: 0; 
      width: 500px; }
    }
  
  /* iPads (portrait and landscape) ----------- */
  @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    body { 
      width: 495px; 
    }
  }
  
  </style>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/vendor/modernizr.js"></script>

    
    <?php require_once('./header_admin.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Listado de Usuarios de Entomología</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <table>
                <thead>
                  <tr>
                    <th width="10">ID</th>
                    <th width="auto">Nombre</th>
                    <th width="auto">Usuario</th>
                    <th width="150">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($user = $result->fetch_assoc())
                  {
                  ?>
                  <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['user']; ?></td>
                    <td>
                      <a href="./edit_user.php?id=<?php echo $user['id']; ?>" class="button tiny secondary">Modificar</a>
                      <a href="./delete_user.php?id=<?php echo $user['id']; ?>" class="button tiny alert">Eliminar</a>
                    </td>
                    
                  </tr>
                  <?php
                }
                  ?>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>


  </head>
  <body>