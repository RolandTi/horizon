/* Toggle mobile menu */
const toggle_nav = document.querySelector(".toggle_nav");
const menu = document.querySelector(".navbar");
function toggleMenu() {
	if (menu.classList.contains("active")) {
		menu.classList.remove("active");
		toggle_nav.setAttribute('aria-expanded', 'false');
		console.log('active')
	} else {
		menu.classList.add("active");
		toggle_nav.setAttribute('aria-expanded', 'true');
		console.log('inactive')
	}
}
toggle_nav.addEventListener("click", toggleMenu, false);


/* Close menu if Esc is pressed */
document.addEventListener("keydown", (event) => {
  const escapeKey = 27;

  if (event.keyCode === escapeKey && menu.classList.contains("active")) {
    menu.classList.remove("active");
  }
});
