select();
function select(buscar){
    fetch("operaciones_bd/lista_admintravel.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        admintravel_result.innerHTML = response;
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