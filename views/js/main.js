// Importações
import { register, login } from './formAnimations.js'; 

import { setupButtons, load, saveEvent, closeModal, deleteEvent, setupListeners } from './calendar.js';

setupButtons();
load();


// Eventos de click
document.getElementById('registerBtn').addEventListener('click', register);
document.getElementById('loginBtn').addEventListener('click', login);
