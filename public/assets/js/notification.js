document.addEventListener("DOMContentLoaded", () => {
  const toast = document.querySelector(".toast");
  if (toast) {
    toast.classList.remove("translate-x-full", "opacity-0");
    toast.classList.add("translate-x-0", "opacity-100");

    setTimeout(() => {
      toast.classList.remove("opacity-100");
      toast.classList.add("opacity-0");

      setTimeout(() => {
        toast.classList.add("hidden");
      }, 700); // sesuai dengan duration
    }, 2000);
  }
});
