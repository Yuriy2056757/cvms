var sideNav = document.getElementById('sideNav');
var button = document.getElementById('hamburgerContainer');

button.onclick = function name() {
  if (sideNav.style.display === 'none') {
    sideNav.style.setProperty('display', 'block', 'important');
  } else {
    sideNav.style.setProperty('display', 'none', 'important');
  }
}
