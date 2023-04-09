<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<?php include("_header.php"); ?>
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>
	<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	
	<header class="header">
			<button class="toggle_nav" aria-expanded="false"><span>Menu</span></button>
			<nav class="navbar">
				<div class="navbar_title_container">
				<a href="<?php echo html_encode(getSiteHomeURL()); ?>" 
					class="navbar_title">
					<?php printGalleryTitle(); ?>
				</a>
				</div>
				<?php include("_navbar.php"); // <ul> with all items ?>
			</nav>
			
	</header>
		
	<main class="page" id="main-content">
		<article>
		<h1><?php echo gettext("Object not found"); ?></h1>
		<p class="font-xxl"><?php print404status(isset($album) ? $album : NULL, isset($image) ? $image : NULL, $obj); ?></p>
		</article>
	</main>

	<footer class="footer">
		<?php include("_footer.php"); ?>
	</footer>
</body>
</html>