select1();
select2();
select3();
function select1(buscar){
    fetch("operaciones_bd/lista_mispostulaciones.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        lista_mispostulaciones.innerHTML = response;
        console.log(response);
    })
}
buscar1.addEventListener("keyup", () => {
    const dato = buscar1.value;
    if(dato == ""){
        select1();
    }
    else{
        select1(dato);
    }
});
function select2(buscar){
    fetch("operaciones_bd/lista_mistrabajos_actuales.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        lista_mistrabajos_actuales.innerHTML = response;
    })
}
buscar2.addEventListener("keyup", () => {
    const dato = buscar2.value;
    if(dato == ""){
        select2();
    }
    else{
        select2(dato);
    }
});
function select3(buscar){
    fetch("operaciones_bd/lista_historial.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        lista_historial.innerHTML = response;
    })
}
buscar3.addEventListener("keyup", () => {
    const dato = buscar3.value;
    if(dato == ""){
        select3();
    }
    else{
        select3(dato);
    }
});