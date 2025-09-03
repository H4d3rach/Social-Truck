select();
function select(){
    fetch("operaciones_bd/lista_validacion.php",{
        method: "POST",
    }).then(response => response.text()).then(response => {
        console.log(response)
        validacion_result.innerHTML = response;
    })
}

