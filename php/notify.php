<?php
include("lang/lang.php");
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
		notify($lang['ALERT_UPDATE_A'], "error");
		break;
    case 1:
        notify($lang['ALERT_UPDATE_B'], "success"); 
        break;
    case 0:
        notify($lang['ALERT_UPDATE_C'], "info");
        break;
    default:
       notify();
}
}
?>
