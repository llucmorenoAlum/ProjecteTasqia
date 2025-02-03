window.onload = () => {
    const usuari = document.getElementById("usuari")
    usuari.addEventListener("input", (event) => {
        usuari.setCustomValidity("");
        
        let regex = /^[a-zA-Záéíóúàèìòùãõäëïöü\s]+$/

        if(!usuari.validity.valid) return;

        if(!regex.test(usuari.value)){
            usuari.setCustomValidity("Només es permeten lletres")
        }

        usuari.reportValidity();
    })

    const pass = document.getElementById("contrasenya")
    const passRepetida = document.getElementById("contrasenya2")
    passRepetida.addEventListener("input", (event) => {
        passRepetida.setCustomValidity("");

        if(!passRepetida.validity.valid) return;

        if(pass.value !== passRepetida.value){
            passRepetida.setCustomValidity("Les contrasenyes no coincideixen.")
        }

        passRepetida.reportValidity();
    })
}