act.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/actualizar_estatustrans.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        console.log(response)
    })
})  

select();
function select(buscar){
    fetch("operaciones_bd/lista_viajestrans.php",{
        method: "POST",
        body: buscar
    }).then(response => response.text()).then(response => {
        console.log(response);
        viajes_res.innerHTML = response;
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