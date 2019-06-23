var toggleMenu = document.querySelector('.duk-icon-bars');
var menuMain   = document.querySelector('.menu--main');

function toggle() {
  if ( (menuMain.style['display'] === '') || (menuMain.style['display'] === 'none') ) {
    menuMain.style['display'] = 'block';
    toggleMenu.className = "duk-icon-close";
  } else {
    menuMain.style["display"] = "none";
    toggleMenu.className = "duk-icon-bars";

  }
}

toggleMenu.addEventListener('click', toggle);