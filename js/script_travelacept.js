select();
function select(buscar){
    fetch("operaciones_bd/lista_partialtravel.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        console.log(response);
        travelacept_result.innerHTML = response;
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