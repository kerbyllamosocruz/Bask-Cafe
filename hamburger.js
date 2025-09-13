document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const nav = document.getElementById("mainNav");

    hamburger.addEventListener("click", function () {
      nav.classList.toggle("active");
      if (nav.classList.contains("active")) {
        hamburger.textContent = "✖";
      } else {
        hamburger.textContent = "☰";
      }
    });
  });