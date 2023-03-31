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
		
	<main class="album_horizontal" id="hscroll">
		
		<div class="album_head">
			<h1><?php printAlbumTitle(); ?></h1>
			<?php printAlbumDesc(); ?>
		</div><!-- .album_header -->
		
		<div class="album_photos">
			<?php 
			while (next_image()):?>
				<figure><img 
				src="<?php echo html_encode(getCustomImageURL(NULL,NULL,700,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
				alt="<?php echo getBareImageTitle(); ?>" 
				width="<?php echo getFullWidth(); ?>" 
				height="<?php echo getFullHeight(); ?>" /></figure>
			<?php endwhile; ?>
		</div><!-- .album_photos -->
		
	</main>
		
	<footer>
		<script>
		
//		const scrollContainer = document.querySelector("main");

//scrollContainer.addEventListener("wheel", (evt) => {
//    evt.preventDefault();
//    scrollContainer.scrollLeft += evt.deltaY;
//});
		
//	const mediaQuery = window.matchMedia('(min-width: 950px)')	;	
//	function handleTabletChange(e) {
//		  // Check if the media query is true
//		  if (e.matches) {
//			console.log('Taille OK');
//		    scrollContainer.addEventListener("wheel", (evt) => {
//				evt.preventDefault();
//				console.log('fonction ok');
//				scrollContainer.scrollLeft += evt.deltaY;});
//		}
//	}
//	// Register event listener
//	mediaQuery.addListener(handleTabletChange);
//	
//	// Initial check
//	handleTabletChange(mediaQuery);
	
		</script>
		
<!--		<script type="text/javascript">
			function force_scroll_sideways(element) {
			  element.addEventListener("wheel", (event) => {
			    event.preventDefault();
			
			    let [x, y] = [event.deltaX, event.deltaY];
			    let magnitude;
			
			    if (x === 0) {
			      magnitude = y > 0 ? -30 : 30;
			    } else {
			      magnitude = x;
			    }
			
			    //console.log({ x, y, magnitude });
			    element.scrollBy({
			      left: magnitude
			    });
			  });
			}		
			const element = document.querySelector("#hscroll");	
		</script>-->
		<?php include("_footer.php"); ?>
	</footer>
</body>
</html>