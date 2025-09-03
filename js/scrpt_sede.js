select();
function select(buscar){
    fetch("operaciones_bd/lista_sede.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        sede_result.innerHTML = response;
    })
}
function Eliminar(id){
    fetch("operaciones_bd/eliminar_sede.php",{
        method: "POST",
        body: id
    }).then(response => response.text()).then(response => {
        console.log(response)
        select();
        
    })
}
function Editar(id){
    fetch("operaciones_bd/editar_sede.php",{
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        ids.value = response.id_sede;
        nombre_sede.value = response.nombre;
        direccion_sede.value = response.direccion;
        registrar.value = "Actualizar"
    })
}
registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/registro_sede.php", {
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
