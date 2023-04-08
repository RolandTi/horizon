<?php
if (extensionEnabled('zenpage')) {
	if (checkForPage(getOption('horizon_homepage'))) {
		require_once('pages.php');
	} else {
		require_once('gallery.php');
	}
} else {
	require_once('gallery.php');
}
?>