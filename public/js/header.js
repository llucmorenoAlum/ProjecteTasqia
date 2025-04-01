window.onload = () => {
    const avatar = document.getElementById("avatar");
    const dropdown = document.getElementById("dropdown-menu");

    avatar.addEventListener("click", function (event) {
        //event.stopPropagation(); // Evita que el clic es propagui al document
        dropdown.classList.toggle("show");
    });

    // Amagar el menú si es fa clic fora
    document.addEventListener("click", function (event) {
        if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("show");
        }
    });
}