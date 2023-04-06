const scrollContainer = document.querySelector("html");
function hijackScroll() {
	event.preventDefault();
	scrollContainer.scrollLeft += event.deltaY;
	}
// https://www.uriports.com/blog/easy-fix-for-unable-to-preventdefault-inside-passive-event-listener/
// VERSION PASSIVE
//		const nonePassive = {
//			passive: false
//			};
//			scrollContainer.addEventListener("wheel", hijackScroll, nonePassive);

scrollContainer.addEventListener("wheel", hijackScroll);
const mediaQuery = window.matchMedia('(min-width: 950px)')	;
function handleTabletChange(e) {
	  // Check if the media query is true
	  if (e.matches) {
	  	// Add hijack
	    scrollContainer.addEventListener("wheel", hijackScroll);
	}
	else {
		// Remove hijack
	    scrollContainer.removeEventListener("wheel", hijackScroll);
	}
}
mediaQuery.addListener(handleTabletChange);
handleTabletChange(mediaQuery);