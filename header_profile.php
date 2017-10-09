<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entomology | Zamorano University</title>
    <link rel="icon" href="./img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
    <script>
      document.write('<script src=./js/vendor/' +
      ('__proto__' in {} ? 'zepto' : 'jquery') +
      '.js><\/script>')
    </script>
    <script src="./js/zepto.js"></script>
    <script src="./js/vendor/jquery.js"></script>
    <script src="./js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
    <script src="./js/vendor/jquery.js"></script>
    <script src="./js/foundation/foundation.js"></script>
    <script>
          $(document).foundation();

          var doc = document.documentElement;
          doc.setAttribute('data-useragent', navigator.userAgent);
        </script>
  </head>
  <body>
<div class="row">
      <div class="large-3 columns">
        <p><h1><img href="https://www.zamorano.edu/entomology" src="./img/logo.png" /></h1></p>
      </div>
      <div align="right"> 
      <div class="large-9 columns">
              <div class="right button-group">
                <a href="./admin.php" class="button">Go back</a>
                <?php if( !isset($_SESSION['uid']) ){ ?>
                <a href="./login.php" class="button">Login</a>
                <?php } ?>
                <?php if( isset($_SESSION['uid']) ){ ?>
                <a href="./logout.php" class="button">Logout</a>
                <?php } ?>
              </div>
              </div>         
        </div>
      </div>
      
        </div>       
        </div>
      </div>
    </div>