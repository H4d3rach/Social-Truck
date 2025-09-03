select();
function select(buscar){
    fetch("operaciones_bd/lista_adminperfiles.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        adminperfiles_result.innerHTML = response;
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