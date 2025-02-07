// Import functions from formAnimations.js
import { login, register } from "./formAnimations.js";

// Import event handling functions from events.js
import { toggleClick } from './events.js';

// Add event listeners to your buttons and other elements here
document.addEventListener("DOMContentLoaded", function() {
  // All your event listener code
  let loginBtn = document.getElementById("loginBtn");
  let registerBtn = document.getElementById("registerBtn");

  if (loginBtn) {
      loginBtn.addEventListener("click", login);
  }
  if (registerBtn) {
      registerBtn.addEventListener("click", register);
  }
  toggleClick();  // Initialize your toggle function
});
