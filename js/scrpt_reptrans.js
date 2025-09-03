function Eliminar(id){
    fetch("operaciones_bd/eliminar_reptrans.php",{
        method: "POST",
        body: id
    }).then(response => response.text()).then(response => {
        console.log(response)
        location.replace('../Social Truck/login.php');
        
    })
}
registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    let a = document.getElementById("ids")
    console.log(a)
    fetch("operaciones_bd/registro_reptrans.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        console.log(response)
        ids.value = "";
    })
})  