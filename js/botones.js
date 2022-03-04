document.getElementById("btn_inventario").addEventListener("click", marcar_inventario);
document.getElementById("btn_entradas").addEventListener("click", marcar_entradas);
document.getElementById("btn_salidas").addEventListener("click", marcar_salidas);
document.getElementById("btn_clientes").addEventListener("click", marcar_clientes);
document.getElementById("btn_historial").addEventListener("click", marcar_historial);

var inventario = document.getElementById("inv");
var entradas = document.getElementById("ent");
var salidas = document.getElementById("sal");
var clientes = document.getElementById("clien");
var historial = document.getElementById("histo");

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