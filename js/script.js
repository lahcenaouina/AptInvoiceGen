let Title = document.querySelector("#title");
let loginBtn = document.querySelector("#loginbtn")
//Title Responsive
const windowWidth = window.innerWidth;
function navres(windowWidth) {
  if (windowWidth < 955) {
        Title.innerHTML = "CDM";
        loginBtn.innerHTML ="<ion-icon id='icon_log' name=\"arrow-forward-outline\"></ion-icon>"
  }else {
        Title.innerHTML = "Gestion Cité Marine";
        loginBtn.innerHTML ="Se connecter"

  }}
navres(windowWidth);
window.addEventListener('resize', function() {
  const windowWidth = window.innerWidth;
    navres(windowWidth);
});


