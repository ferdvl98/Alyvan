document.getElementById("btn_rutas").addEventListener("click", marcar_rutas);
document.getElementById("btn_casetas").addEventListener("click", marcar_casetas);
document.getElementById("btn_chofer").addEventListener("click", marcar_chofer);
document.getElementById("btn_descargas").addEventListener("click", marcar_descargas);
var rutas = document.getElementById("ru");
var casetas = document.getElementById("cas");
var chofer = document.getElementById("cho");
var descargas = document.getElementById("des");
function marcar_rutas(){
    rutas.className ="selected";
    casetas.className="";
    chofer.className="";
    descargas.className="";
}
function marcar_casetas(){
    rutas.className ="";
    casetas.className="selected";
    chofer.className="";
    descargas.className="";   
}
function marcar_chofer(){
    rutas.className ="";
    casetas.className="";
    chofer.className="selected";
    descargas.className="";
}
function marcar_descargas(){
    rutas.className ="";
    casetas.className="";
    chofer.className="";
    descargas.className="selected";
}