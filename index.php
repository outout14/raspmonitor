<?php
define('RASPMONITOR_VERSION', '1');

/* Project under WTFPL licence */
/* Projet sous la licence WTFPL */

require('php/RaspStats.php');

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
    <title>RaspMonitor - <?= RaspStats::getSrvName() ?></title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- favicon -->
	<link rel="icon" type="image/png" href="logo.png" />
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
			<li><a href="https://github.com/outout14/raspmonitor">Github RaspMonitor</a></li>
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
          <h3 class="panel-title">Informations de <?= RaspStats::getSrvName() ?></h3>
        </div>
        <div class="panel-body">
          <p>
            <p>Adresse Ip :
              <?= RaspStats::getIpAddress() ?>
            </p>
			<p>Nom réseau :
			<?= RaspStats::getSrvName() ?>
			</p>
            <p>Version de PHP :
              <a href="<?= RaspStats::getPHPVersion()[1] ?>" target="_blank"><?= RaspStats::getPHPVersion()[0] ?></a>
            </p>

			<p>Serveur HTTP :
			<?= RaspStats::getServerSoftware() ?>
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
			
			<?php
			if(!RaspStats::checkLinux() == False) {
			?>
            <p>Version du noyau :
              <?= RaspStats::getOSKernel() ?></p>
            <p>Température :
            <input value="<?= RaspStats::getTemperature() ?>" id="tempValue">
              <div id="raspitemp"></div></p>
			<?php 
			}
			?>
        </div>
      </div>
      <!-- end panel -->

	  <!-- Panel -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Ports ouverts sur <?= RaspStats::getSrvName() ?></h3>
        </div>
        <div class="panel-body">
          <p>Port SSH : <?= RaspStats::checkSSH() ?></p>
		  <p>Port FTP : <?= RaspStats::checkFTP() ?></p>
        </div>
      </div>
      <!-- end panel -->

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

    </div>

	<script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/progressbar.js"></script>
    <script src="assets/raspitempbar.js"></script>
	<script src="assets/notify.min.js"></script>
	<?php 
	// IF WINDOWS //
	if(RaspStats::checkLinux() == False) 
	{
	?>
<script src="assets/win.js"></script>
	<?php
	}
	?>
  </body>
</html>
