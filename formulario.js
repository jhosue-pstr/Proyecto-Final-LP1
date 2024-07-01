document.getElementById("registroForm").addEventListener("submit", function(event){
    event.preventDefault();

    let formData = new FormData(this);

    fetch("procesar_registro.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => {
        console.error("Error:", error);
    });
});