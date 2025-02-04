// Import functions from formAnimations.js
import { login, register } from "./formAnimations.js";

// Get buttons
let loginBtn = document.getElementById("loginBtn");
let registerBtn = document.getElementById("registerBtn");

// Attach event listeners to buttons
loginBtn.addEventListener("click", login);
registerBtn.addEventListener("click", register);
