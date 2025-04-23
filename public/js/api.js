document.getElementById("canviImatgeForm").addEventListener("submit", async function (e) {
e.preventDefault(); // Evita que es recarregui la pàgina

const urlImatge = document.getElementById("urlImatge").value;

// Ajusta la URL de la teva API real
const apiUrl = "http://api.tasqia.pentinats.cat/api/update_profile_image.php";

try {
    const resposta = await fetch(apiUrl, {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        imatge_url: urlImatge
    })
    });

    const resultat = await resposta.json();

    if (resposta.ok) {
    alert("Imatge actualitzada correctament!");
    // Aquí podries actualitzar la imatge de perfil immediatament al DOM si vols
    } else {
    alert("Error: " + resultat.message);
    }
} catch (error) {
    console.error("Error en enviar la sol·licitud:", error);
    alert("Error de connexió amb el servidor.");
}
});
