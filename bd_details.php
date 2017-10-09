<?php
include_once('utilities.php');
include_once('db/database_utilities.php');
if( !isset( $_SESSION['uid'] ) )
{
  header('Location: index.php');
  die();

}
$user_id = $_SESSION['uid'];
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';


if( $_POST )
{

  $title = isset( $_POST['title'] ) ? $_POST['title'] : '';
  $text = isset( $_POST['text'] ) ? $_POST['text'] : '';
  $ideap = isset( $_POST['ideap'] ) ? $_POST['ideap'] : '';
  update_article($id, $title, $text, $ideap);
  header('Location: profile.php');
  die();
}

$article = get_article_details( $id );

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Manejo de base de datos</h3>
          <p>Artículos</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                  <form method="post">
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Título</p>
                          <input type="text" name="title" value="<?php echo $article['title'] ?>" />
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Texto</p>
                          <textarea name="text"><?php echo $article['text'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>ID</p>
                          <textarea name="text"><?php echo $article['ideap'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Family</p>
                          <textarea name="text"><?php echo $article['family'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Subfamily</p>
                          <textarea name="text"><?php echo $article['subfamily'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Tribe</p>
                          <textarea name="text"><?php echo $article['tribe'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Genus</p>
                          <textarea name="text"><?php echo $article['genus'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Species</p>
                          <textarea name="text"><?php echo $article['species'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-9 columns">
                        <label>Locality Data</p>
                          <textarea name="text"><?php echo $article['locality_data'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-12 columns">
                        <label>Determination Label</p>
                          <textarea name="text"><?php echo $article['deremination_label'] ?></textarea>
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="large-6 columns">
                        <input type="submit" class="button success tiny" value="MODIFICAR" />
                      </div>
                    </div>
                  </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    

    <?php require_once('footer.php'); ?>