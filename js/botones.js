document.getElementById("btn_inventario").addEventListener("click", marcar_inventario);
document.getElementById("btn_entradas").addEventListener("click", marcar_entradas);
document.getElementById("btn_salidas").addEventListener("click", marcar_salidas);
document.getElementById("btn_clientes").addEventListener("click", marcar_clientes);
document.getElementById("btn_historial").addEventListener("click", marcar_historial);

document.getElementById("btn_rutas").addEventListener("click", marcar_rutas);
document.getElementById("btn_casetas").addEventListener("click", marcar_casetas);
document.getElementById("btn_chofer").addEventListener("click", marcar_chofer);
document.getElementById("btn_descargas").addEventListener("click", marcar_descargas);

var inventario = document.getElementById("inv");
var entradas = document.getElementById("ent");
var salidas = document.getElementById("sal");
var clientes = document.getElementById("clien");
var historial = document.getElementById("histo");

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
function marcar_inventario(){
    inventario.className = "selected";
    entradas.className ="";
    salidas.className ="";
    clientes.className ="";
    historial.className = "";
}

function marcar_entradas(){
    inventario.className = "";
    entradas.className ="selected";
    salidas.className ="";
    clientes.className ="";
    historial.className = "";
}
function marcar_salidas(){
    inventario.className = "";
    entradas.className ="";
    salidas.className ="selected";
    clientes.className ="";
    historial.className = "";
}

function marcar_clientes(){
    inventario.className = "";
    entradas.className ="";
    salidas.className ="";
    clientes.className ="selected";
    historial.className = "";
}
function marcar_historial(){
    inventario.className = "";
    entradas.className ="";
    salidas.className ="";
    clientes.className ="";
    historial.className = "selected";
}