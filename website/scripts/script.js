// Affiche l'année courante dans le footer
document.getElementById("year").textContent = new Date().getFullYear();

// Compteur de clics sur le bouton (présent seulement sur index.html)
const btn = document.getElementById("action-btn");
const counter = document.getElementById("click-count");

if (btn && counter) {
  let count = 0;
  btn.addEventListener("click", () => {
    count++;
    counter.textContent = `Cliqué ${count} fois`;
  });
}
