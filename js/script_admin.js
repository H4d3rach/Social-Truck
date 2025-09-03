registrar.addEventListener("click", () => {
    const frm = document.getElementById("frm")
    fetch("operaciones_bd/actualizar_admin.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        console.log(response)
        ids.value = "";
    })
})  