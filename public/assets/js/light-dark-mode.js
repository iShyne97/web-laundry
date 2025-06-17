const themeToggle = document.getElementById("themeToggle");
const htmlRoot = document.getElementById("htmlRoot");
const radialElements = document.querySelectorAll(".radial");

// Cek preferensi dari localStorage
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
  htmlRoot.setAttribute("data-theme", savedTheme);
  themeToggle.checked = savedTheme === "dark";
  updateBlendMode(savedTheme);
} else {
  // Set default theme jika belum ada
  htmlRoot.setAttribute("data-theme", "light");
  updateBlendMode("light");
}

// Fungsi untuk mengubah blend mode berdasarkan tema
function updateBlendMode(theme) {
  radialElements.forEach((el) => {
    el.style.mixBlendMode = theme === "dark" ? "screen" : "multiply";
  });
}

// Event listener saat toggle diklik
themeToggle.addEventListener("change", function () {
  const newTheme = themeToggle.checked ? "dark" : "light";
  htmlRoot.setAttribute("data-theme", newTheme);
  localStorage.setItem("theme", newTheme);
  updateBlendMode(newTheme);
});
