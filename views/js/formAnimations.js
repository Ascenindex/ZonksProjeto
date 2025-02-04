// Select necessary elements
let loginForm = document.getElementById("login");
let registerForm = document.getElementById("register");
let loginBtn = document.getElementById("loginBtn");
let registerBtn = document.getElementById("registerBtn");
let slider = document.getElementById("btn");

// Function to show the registration form and hide login
export function register() {
    loginForm.style.left = "-100%"; 
    registerForm.style.left = "5%"; 
    slider.style.left = "110px"; 
    registerBtn.style.left = "0";
    loginBtn.style.left = "110px";
    slider.style.width = "130px";
    loginBtn.style.width = "130px";
}

// Function to show the login form and hide register
export function login() {
    loginForm.style.left = "5%";
    registerForm.style.left = "100%";
    slider.style.left = "0";
    registerBtn.style.left = "110px";
    loginBtn.style.left = "0";
}
