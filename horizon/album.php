<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<?php include("_header.php"); ?>
</head>
<body class="scroll-h">
	<?php zp_apply_filter('theme_body_open'); ?>
	<a href="#main-content" tabindex="0" class="skip-to-content">Skip to main content</a>
	<div class="scroller">
	
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
			
				<figure>
					<picture class="appear">
						  <source media="(min-width: 700px)" srcset="<?php echo html_encode(getCustomImageURL(NULL,NULL,1500,NULL,NULL,NULL,NULL,false,NULL)); ?>">
							<img src="<?php echo html_encode(getCustomImageURL(NULL,500,NULL,NULL,NULL,NULL,NULL,false,NULL)); ?>" 
							  alt="<?php echo getBareImageTitle(); ?>"  width="<?php echo getFullWidth(); ?>" height="<?php echo getFullHeight(); ?>"
							  loading="lazy" >
					</picture>
				</figure>
			<?php endwhile; ?>
			
		</div><!-- .album_photos -->
		
	</main>
		
	<footer>
<!-- 		<script>const swup = new Swup({ containers: ['#hscroll']});</script>-->
		<?php include("_footer.php"); ?>
	</footer>
	</div>
<script>
document.addEventListener("DOMContentLoaded", function(event) { 

	// get all of the elements with the 'scroll' class.
	const scrollList = document.querySelectorAll(".appear")

	const callback = (entries, observer) => {
		entries.forEach((entry) => {

			if (entry.isIntersecting) {

				entry.target.classList.add("appear-in");

			}
	  	})
	}
	
	const options = {}
	
	const myObserver = new IntersectionObserver(callback, options)

	scrollList.forEach(scrollItem => {
		myObserver.observe(scrollItem)
	})

});


	const scrollContainer = document.querySelector(".scroller");
function hijackScroll() {
	event.preventDefault();
	scrollContainer.scrollLeft += event.deltaY;
	}
// https://www.uriports.com/blog/easy-fix-for-unable-to-preventdefault-inside-passive-event-listener/
// VERSION PASSIVE
const nonePassive = {
	passive: false
	};
scrollContainer.addEventListener("wheel", hijackScroll, nonePassive);
//scrollContainer.addEventListener("wheel", hijackScroll);
const mediaQuery = window.matchMedia('(min-width: 950px)')	;
function handleTabletChange(e) {
	  // Check if the media query is true
	  if (e.matches) {
	    scrollContainer.addEventListener("wheel", hijackScroll); // Add hijack
	}
	else {
	    scrollContainer.removeEventListener("wheel", hijackScroll); // Remove hijack
	}
}
mediaQuery.addListener(handleTabletChange);
handleTabletChange(mediaQuery);
		</script>
</body>
</html>