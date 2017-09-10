<?php
header("Content-Type: application/javascript");

function notify($text = "Une erreur système est survenue.", $class = "error")
{
?>
			$(document).ready(function(){
			$.notify(
			"<?= $text ?>", 
			{className: '<?= $class ?>', position: 'top-right'}
			);
			});
<?php
}
	
	
if(isset($_GET['update']) && is_numeric($_GET['update'])) {
	switch ($_GET['update']) {
    case 666:
		notify("Impossible de vérifier l'existance de mises à jour, connexion au serveur impossible ", "error");
		break;
    case 1:
        notify("Une mise à jour est disponible, rendez vous vite sur le github de RaspMonitor!", "success"); 
        break;
    case 0:
        notify("Aucune mise à jour n'est disponible. Vous pouvez dormir tranquille !", "info");
        break;
    default:
       notify();
}
}
?>
