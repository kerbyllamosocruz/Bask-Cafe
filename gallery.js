function isMobileView() {
  return window.innerWidth <= 360;
}

document.querySelectorAll(".view_all_button").forEach((button) => {
  button.addEventListener("click", () => {
    const container = button.closest(".gallery_container");
    const toggleRows = container.querySelectorAll(".toggle-row");
    const isExpanded = button.classList.contains("expanded");

    toggleRows.forEach((row) => {
      row.classList.toggle("show", !isExpanded);
    });

    button.classList.toggle("expanded");
    button.textContent = isExpanded ? "View All" : "View Less";

    if (isMobileView()) {
      const allItems = container.querySelectorAll(".gallery_item");
      let visibleCount = 0;

      allItems.forEach((item) => {
        const parentRow = item.closest(".gallery_row");
        const isVisible = !parentRow.classList.contains("toggle-row") || parentRow.classList.contains("show");

        if (isVisible) {
          visibleCount++;
          item.style.height = visibleCount % 2 === 1 ? "220px" : "160px";
        }
      });
    }
  });
});

function applyMobileLayout() {
  if (isMobileView()) {
    document.querySelectorAll(".gallery_container").forEach((container) => {
      const visibleItems = container.querySelectorAll(".gallery_row:not(.toggle-row) .gallery_item");
      let count = 0;
      visibleItems.forEach((item) => {
        count++;
        item.style.height = count % 2 === 1 ? "220px" : "160px";
      });
    });
  } else {
    document.querySelectorAll(".gallery_item").forEach((item) => {
      item.style.height = "";
    });
  }
}

window.addEventListener("load", applyMobileLayout);
window.addEventListener("resize", applyMobileLayout);