function loadPage() {
	var timeWait;
    timeWait = setTimeout(showPage, 2000);
}

function showPage() {
	$( "#loader" ).fadeIn( "slow", function() {
	  document.getElementById("loader").style.display = "none";
		$( "#loader" ).fadeOut( "slow", function() {
			  document.getElementById("loader").style.display = "none";
			$( "#pagecontent" ).fadeIn( "slow", function() {
		  });
	});
	});
}