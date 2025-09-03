select();
function select(buscar){
    fetch("operaciones_bd/lista_trailero.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        console.log(response);
        trailero_result.innerHTML = response;
    })
}
function Eliminar(id){
    fetch("operaciones_bd/eliminar_trailero.php",{
        method: "POST",
        body: id
    }).then(response => response.text()).then(response => {
        console.log(response)
        select();
        
    })
}
function Editar(id){
    fetch("operaciones_bd/editar_trailero.php",{
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        console.log(response)
        ids.value = response.id_usuario;
        id_usuario.value = response.id_usuario;
        modelo.value = response.nombre;
        transmision.value = response.primer_apellido;
        extra.value = response.segundo_apellido;
        marca.value = response.marca_id;
        motor.value = response.motor_id;
        tipo.value = response.tipo_id;
        estatus.value = response.estatus_id;
        sede.value = response.sede_id;
        registrar.value = "Actualizar"
    })
}
registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/registro_trailero.php", {
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