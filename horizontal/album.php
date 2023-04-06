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
		
	<main id="hscroll" class="transition-fade">
		
		<div class="album_head">
			<h1><?php printAlbumTitle(); ?></h1>
			<?php printAlbumDesc(); ?>
			
		</div><!-- .album_header -->
		
		<div class="album_photos">
			<?php 
			while (next_image()):?>
			
				<figure><img 
				src="<?php echo html_encode(getCustomImageURL(NULL,NULL,1200,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
				alt="<?php echo getBareImageTitle(); ?>" 
				width="<?php echo getFullWidth(); ?>" 
				height="<?php echo getFullHeight(); ?>" /></figure>
			<?php endwhile; ?>
			
		</div><!-- .album_photos -->
		
	</main>
		
	<footer>
<!-- 		<script src="<?php echo $_zp_themeroot; ?>/js/swup3.0.5.js"></script>
 		<script>const swup = new Swup({ containers: ['#hscroll']});</script> -->
		<script src="<?php echo $_zp_themeroot; ?>/js/horizon.album.js?v=1"></script>
		
		<?php include("_footer.php"); ?>
	</footer>
</body>
</html>