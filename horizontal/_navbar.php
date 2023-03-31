<?php if (function_exists("printAlbumMenu")) { 
	printAlbumMenu("list-top", false, "albums", "menu-active", "", "menu-active", '');
	} else { echo '<p class="note">printAlbumMenu plugin need to be activate.</p>'; } ?>

<?php if (ZP_PAGES_ENABLED) { 
	printPageMenu("list", "pages", "menu-active", "submenu", "menu-active"); } ?>
		
<?php if (extensionEnabled('contact_form')) {
echo '<ul><li>';
printCustomPageURL(gettext('Contact us'), 'contact', '', '');
echo '</li></ul>';
} else { }
?>
