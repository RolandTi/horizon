<?php if (!defined('WEBPATH')) die(); ?>
<!doctype html>
<html<?php printLangAttribute(); ?>>
<head>
	<?php include("_header.php"); ?>
</head>
<body>
	<?php zp_apply_filter('theme_body_open'); ?>
	<a href="#hscroll" tabindex="0" class="skip-to-content">Skip to main content</a>
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
	
	<main id="hscroll" class="index">
		
		<div class="index_header">
			<h1><?php printGalleryTitle(); ?></h1>
			<p class="font-xxl"><?php printGalleryDesc(); ?></p>
		</div><!-- .album_header -->
		
		<div class="album_photos">
				<?php while (next_album()): ?>
				<figure class="appear"><a href="<?php echo html_encode(getAlbumURL()); ?>"><?php printCustomAlbumThumbImage(getAnnotatedAlbumTitle(), NULL, NULL, 900, NULL, NULL, NULL, null, NULL,NULL); ?></a><figcaption><?php printAlbumTitle(); ?></figcaption>
				</figure>
				<?php endwhile; ?>
		</div><!-- .album_photos -->
		
	</main>
	
	<footer>
		<?php include("_footer.php"); ?>
	</footer>
	
	</div><!-- .scroller -->
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