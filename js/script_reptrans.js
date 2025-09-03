select();
function select(buscar){
    fetch("operaciones_bd/lista_reptrans.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        console.log(response);
        reptrans_result.innerHTML = response;
    })
}
function Eliminar(id){
    fetch("operaciones_bd/eliminar_reptrans.php",{
        method: "POST",
        body: id
    }).then(response => response.text()).then(response => {
        console.log(response)
        select();
        
    })
}

registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/registro_reptrans.php", {
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