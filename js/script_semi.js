select();
function select(buscar){
    fetch("operaciones_bd/lista_semi.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        semi_result.innerHTML = response;
    })
}
function Eliminar(id){
    fetch("operaciones_bd/eliminar_semi.php",{
        method: "POST",
        body: id
    }).then(response => response.text()).then(response => {
        console.log(response)
        select();
        
    })
}
function Editar(id){
    fetch("operaciones_bd/editar_semi.php",{
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        console.log(response)
        ids.value = response.no_serie;
        no_serie.value = response.no_serie;
        capacidad.value = response.capacidad;
        dimensiones.value = response.dimensiones;
        extra.value = response.extras;
        sede.value = response.sede_id;
        tipo.value = response.tipo_id;
        estatus.value = response.estatus_id;
        registrar.value = "Actualizar"
    })
}
registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/registro_semi.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        console.log(response)
        registrar.value="Registrar"
        ids.value = "";
        select();
        frm.reset();
    })
})  
buscar.addEventListener("keyup", () => {
    const dato = buscar.value;
    if(dato == ""){
        select();
    }
    else{
        select(dato);
    }
});