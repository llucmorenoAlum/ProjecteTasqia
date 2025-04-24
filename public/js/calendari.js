document.addEventListener("DOMContentLoaded", function () {
    const calendarTitle = document.getElementById("calendarTitle");
    const calendar = document.getElementById("calendar");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const viewButtons = document.querySelectorAll(".calendar-controls button");

    let currentDate = new Date();
    let currentView = "month";

    const urlParams = new URLSearchParams(window.location.search);
    const viewFromURL = urlParams.get('view');
    const dateFromURL = urlParams.get('data');
    if (viewFromURL) currentView = viewFromURL;
    if (dateFromURL) currentDate = new Date(dateFromURL);

    function updateCalendar() {
        calendar.innerHTML = "";
        if (currentView === "day") renderDayView();
        if (currentView === "week") renderWeekView();
        if (currentView === "month") renderMonthView();
    }


    function renderDayView() {
        const diaActual = currentDate.toISOString().slice(0, 10); // format "YYYY-MM-DD"
        calendarTitle.textContent = currentDate.toLocaleDateString("ca-ES", { weekday: 'long', day: 'numeric', month: 'long' });
        calendar.className = "day-view";
    
        const tasquesDelDia = tasques.filter(tasca => 
            tasca.data_inici.startsWith(diaActual)
        );
    
        const dayDiv = document.createElement("div");
        dayDiv.className = "calendar-day";
        dayDiv.textContent = diaActual;
    
        tasquesDelDia.forEach(tasca => {
            const card = document.createElement("div");
            card.className = "task-card";
        
            const titol = document.createElement("h3");
            titol.textContent = tasca.nom;
        
            const hora = document.createElement("p");
            hora.textContent = `Inici: ${new Date(tasca.data_inici).toLocaleTimeString("ca-ES", {
                hour: '2-digit', minute: '2-digit'
            })}`;
        
            const descripcio = document.createElement("p");
            descripcio.textContent = tasca.descripcio || "";
        
            card.appendChild(titol);
            card.appendChild(hora);
            if (tasca.descripcio) card.appendChild(descripcio);
        
            dayDiv.appendChild(card);
        });
        
        calendar.appendChild(dayDiv);
    }
    
    // function renderDayView() {
    //     calendarTitle.textContent = currentDate.toLocaleDateString("ca-ES", { weekday: 'long', day: 'numeric', month: 'long' });
    //     calendar.className = "day-view";
    //     const dayDiv = document.createElement("div");
    //     dayDiv.textContent = currentDate.toLocaleDateString("ca-ES", { weekday: 'long', day: 'numeric', month: 'long' });
    //     dayDiv.className = "calendar-day";
    //     calendar.appendChild(dayDiv);
    // }

    function renderWeekView() {
        const startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay());

        calendarTitle.textContent = `Setmana de ${startOfWeek.toLocaleDateString("ca-ES")}`;
        calendar.className = "week-view";

        for (let i = 0; i < 7; i++) {
            const dayDiv = document.createElement("div");
            const day = new Date(startOfWeek);
            day.setDate(startOfWeek.getDate() + i);
            dayDiv.textContent = day.toLocaleDateString("ca-ES", { weekday: 'short', day: 'numeric' });
            calendar.appendChild(dayDiv);
        }
    }

    function renderMonthView() {
        calendarTitle.textContent = currentDate.toLocaleDateString("ca-ES", { month: 'long', year: 'numeric' });
        calendar.className = "month-view";

        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

        for (let i = 1; i <= lastDay.getDate(); i++) {
            const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
            const dayString = dayDate.toISOString().slice(0, 10); // "YYYY-MM-DD"

            // Comptar quantes tasques té aquell dia
            const tasquesDelDia = tasques.filter(t => t.data_inici.startsWith(dayString));

            const dayDiv = document.createElement("div");
            dayDiv.className = "calendar-day";
            dayDiv.innerHTML = `
                <span class="day-number">${i}</span>
                <span class="task-count">${tasquesDelDia.length > 0 ? tasquesDelDia.length + ' tasques' : ''}</span>
            `;

            // Clica per anar a la vista diària
            dayDiv.addEventListener("click", () => {
                renderDayView();
            });

            calendar.appendChild(dayDiv);
        }
    }

    viewButtons.forEach(button => {
        button.addEventListener("click", () => {
            currentView = button.getAttribute("data-view");
            updateCalendar();
        });
    });

    prevBtn.addEventListener("click", () => {
        if (currentView === "day") currentDate.setDate(currentDate.getDate() - 1);
        if (currentView === "week") currentDate.setDate(currentDate.getDate() - 7);
        if (currentView === "month") currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
    });

    nextBtn.addEventListener("click", () => {
        if (currentView === "day") currentDate.setDate(currentDate.getDate() + 1);
        if (currentView === "week") currentDate.setDate(currentDate.getDate() + 7);
        if (currentView === "month") currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });

    function carregarTasques(data) {
        fetch(`api/obtenirTasques.php?data=${data}`)
        .then(response => response.json())
        .then(tasques => {
            mostrarTasques(tasques);
        })
        .catch(error => console.error("Error carregant tasques:", error));
    }

    function mostrarTasques(tasques) {
        const tasquesContainer = document.getElementById("tasquesContainer");
    tasquesContainer.innerHTML = ""; // Neteja el contingut anterior

    if (tasques.length === 0) {
        tasquesContainer.innerHTML = "<p>No hi ha tasques per aquest dia.</p>";
        return;
    }

    tasques.forEach(tasca => {
        const div = document.createElement("div");
        div.classList.add("tasca");
        div.innerHTML = `
            <strong>${tasca.nom}</strong> - ${tasca.descripcio || "Sense descripció"}
        `;
        tasquesContainer.appendChild(div);
    });
    }

    updateCalendar();
});
