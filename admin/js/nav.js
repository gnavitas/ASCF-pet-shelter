document.addEventListener("DOMContentLoaded", function() {
    const mainNavLinks = document.querySelectorAll(".main-nav");
  
    mainNavLinks.forEach(function(mainNavLink) {
      mainNavLink.addEventListener("click", function(event) {
        const subnav = this.nextElementSibling;
        const arrowIcon = this.querySelector(".arrow-down");
        if (subnav.style.display === "block") {
          subnav.style.display = "none";
          arrowIcon.classList.remove("arrow-up");
        } else {
          // Hide all other subnavs
          const allSubnavs = document.querySelectorAll(".subnav");
          allSubnavs.forEach(function(nav) {
            nav.style.display = "none";
          });
          // Show the clicked subnav
          subnav.style.display = "block";
          arrowIcon.classList.add("arrow-up");
        }
        event.preventDefault();
      });
    });
  
    // Toggle subnav visibility when clicking on a subnav item
    const subNavLinks = document.querySelectorAll(".subnav li a");
  
    subNavLinks.forEach(function(subNavLink) {
      subNavLink.addEventListener("click", function(event) {
        const subnav = this.parentElement.parentElement;
        const arrowIcon = subnav.previousElementSibling.querySelector(".arrow-down");
        if (subnav.style.display === "block") {
          subnav.style.display = "none";
          arrowIcon.classList.remove("arrow-up");
        } else {
          subnav.style.display = "block";
          arrowIcon.classList.add("arrow-up");
        }
        event.stopPropagation(); // Prevent event from bubbling up to main nav
      });
    });
  
    // Close subnav when clicking outside
    document.addEventListener("click", function(event) {
      const target = event.target;
      if (!target.matches(".main-nav") && !target.matches(".subnav")) {
        const allSubnavs = document.querySelectorAll(".subnav");
        allSubnavs.forEach(function(nav) {
          nav.style.display = "none";
        });
        const arrowIcons = document.querySelectorAll(".arrow-down");
        arrowIcons.forEach(function(icon) {
          icon.classList.remove("arrow-up");
        });
      }
    });
  });
  