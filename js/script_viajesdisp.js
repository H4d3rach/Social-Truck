select();
function select(buscar){
    fetch("operaciones_bd/lista_viajes_disp.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        console.log(response);
        lista_viajesdisp.innerHTML = response;
    })
}
buscar.addEventListener("keyup", () => {
    const dato = buscar.value;
    if(dato == ""){
        select();
    }
    else{
        select(dato);
    }
});