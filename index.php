<?php
define('RASPMONITOR_VERSION', '0.2');

/* Project under WTFPL licence */
/* Projet sous la licence WTFPL */

require('classes/RaspStats.php');

// Récupérer la version du serveur web
$webserver_version = RaspStats::getWebserverVersion();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RaspMonitor</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- NAV -->
    <nav class="navbar navbar-default" style="margin: 0">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">RaspMonitor</a>	  
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://outout.tech/">Site du développeur</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Jumbo -->
    <div class="jumbotron" style="padding: 1%">
      <h1>RaspMonitor</h1>
      <p>Gardez un œil sur votre Raspberry Pi !</p>
    </div>


    <!-- Container -->
    <div class="container">

      <!-- Panel -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Informations de RaspMonitor</h3>
        </div>
        <div class="panel-body">
          <p>Version : <?= RASPMONITOR_VERSION ?></p>
        </div>
      </div>
      <!-- end panel -->

      <!-- Panel -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Informations du Raspberry Pi</h3>
        </div>
        <div class="panel-body">
          <p>
            <p>Adresse Ip :
              <?= RaspStats::getIpAddress() ?>
            </p>
            <p>Version de PHP :
              <?= RaspStats::getPHPVersion() ?>
            </p>

            <?php if(!$webserver_version): ?>
              <p>Impossible de trouver la version du serveur</p>
            <?php else: ?>
              <p>Version <?= $webserver_version['server'] ? 'de' : 'du serveur HTTP' ?> :
                <?= $webserver_version['version'] ?>
              </p>
            <?php endif; ?>

            
            <p>Information sur l'OS :
              <?= RaspStats::getOSInformation() ?>
            </p>
            <p>Version du noyau :
              <?= RaspStats::getOSKernel() ?></p>
            <p>Température :
            <input value="<?= RaspStats::getTemperature() ?>" id="tempValue">
              <div id="raspitemp"></div>
            </p>
          </p>
        </div>
      </div>
      <!-- end panel -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/progressbar.js"></script>
    <script src="assets/raspitempbar.js"></script>
  
  </body>
</html>
