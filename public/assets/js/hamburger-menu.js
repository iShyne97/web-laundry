const toggleBtn = document.getElementById("toggleSidebar");
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const links = document.querySelectorAll("a.sidebar-link");

function openSidebar() {
  sidebar.classList.remove("-translate-x-full");
  overlay.classList.remove("hidden");
}

function closeSidebar() {
  sidebar.classList.add("-translate-x-full");
  overlay.classList.add("hidden");
}

toggleBtn.addEventListener("click", () => {
  if (window.innerWidth < 768) {
    if (sidebar.classList.contains("-translate-x-full")) {
      openSidebar();
    } else {
      closeSidebar();
    }
  }
});

overlay.addEventListener("click", closeSidebar);

links.forEach((link) => {
  link.addEventListener("click", () => {
    if (window.innerWidth < 768) {
      closeSidebar();
    }
  });
});

window.addEventListener("resize", () => {
  if (window.innerWidth >= 768) {
    sidebar.classList.remove("-translate-x-full");
    overlay.classList.add("hidden");
  } else {
    sidebar.classList.add("-translate-x-full");
  }
});
