/*Menu*/
const toggleButton = document.querySelector(".toggle_button");
const toggleButtonIcon = document.querySelector(".toggle_button i");
const mobileMenu = document.querySelector("#mobile_dropdown_menu");

toggleButton.addEventListener("click", () => {
    console.log("fired");
  
    if (mobileMenu.classList.contains("show")) {
      // Hide the menu
      mobileMenu.classList.remove("show");
      mobileMenu.classList.add("hide");
  
      // wait for animation to finish before hide the menu
      setTimeout(() => {
        mobileMenu.classList.remove("hide");
        mobileMenu.style.display = "none";
      }, 500); // 500ms matches the animation duration
  
      toggleButtonIcon.classList.remove("fa-regular", "fa-circle-xmark");
      toggleButtonIcon.classList.add("fa-solid", "fa-bars");
    } else {
      // showing the hidden menu
      mobileMenu.style.display = "block";
      mobileMenu.classList.add("show");
  
      toggleButtonIcon.classList.remove("fa-solid", "fa-bars");
      toggleButtonIcon.classList.add("fa-regular", "fa-circle-xmark");
    }
  });