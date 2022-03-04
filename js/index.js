document.getElementById("btn__registrarse").addEventListener("click", register);
document.getElementById("btn__inicar-sesion").addEventListener("click", login);

var contendor__login_register = document.querySelector(".contendor__login-register");
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var caja__trasera_login = document.querySelector(".caja__tracera-login");
var caja__tracera_register = document.querySelector(".caja__tracera-register");

function login(){
    formulario_register.style.display = "none";
    contendor__login_register.style.left = "10px";
    formulario_login.style.display = "block";
    caja__tracera_register.style.opacity = "1";
    caja__trasera_login.style.opacity = "0";
}

function register(){
    formulario_register.style.display = "block";
    contendor__login_register.style.left = "410px";
    formulario_login.style.display = "none";
    caja__tracera_register.style.opacity = "0";
    caja__trasera_login.style.opacity = "1";
}