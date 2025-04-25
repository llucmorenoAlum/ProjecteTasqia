document.addEventListener("DOMContentLoaded", function () {
    const calendarTitle = document.getElementById("calendarTitle");
    const calendar = document.getElementById("calendar");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const viewButtons = document.querySelectorAll(".calendar-controls button");

    let currentDate = new Date();
    let currentView = "month";

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
        calendarTitle.textContent = `Setmana de ${currentDate.toLocaleDateString("ca-ES")}`;
        calendar.className = "week-view";
        calendar.innerHTML = "";
    
        const diaActual = new Date(currentDate);
        const diaSetmana = diaActual.getDay(); // 0 (diumenge) - 6 (dissabte)
        const offsetDilluns = (diaSetmana === 0) ? -6 : 1 - diaSetmana;
    
        const dilluns = new Date(diaActual);
        dilluns.setDate(diaActual.getDate() + offsetDilluns);
    
        for (let i = 0; i < 7; i++) {
            const dia = new Date(dilluns);
            dia.setDate(dilluns.getDate() + i);
    
            const diaString = dia.toISOString().slice(0, 10);
            const tasquesDelDia = tasques.filter(t => t.data_inici.startsWith(diaString));
    
            const dayDiv = document.createElement("div");
            dayDiv.className = "calendar-day";
    
            dayDiv.innerHTML = `
                <span class="day-name">${dia.toLocaleDateString("ca-ES", { weekday: 'short' })}</span>
                <span class="day-number">${dia.getDate()}</span>
                <span class="task-count">${tasquesDelDia.length > 0 ? tasquesDelDia.length + ' tasques' : ''}</span>
            `;
    
            // Clic per anar a la vista diària
            dayDiv.addEventListener("click", () => {
                currentDate = new Date(dia);
                currentView = "day";
                updateCalendar();
            });
    
            calendar.appendChild(dayDiv);
        }
    }
    

    function renderMonthView() {
        calendarTitle.textContent = currentDate.toLocaleDateString("ca-ES", { month: 'long', year: 'numeric' });
        calendar.className = "month-view";
    
        const any = currentDate.getFullYear();
        const mes = currentDate.getMonth();
    
        const primerDiaMes = new Date(any, mes, 1);
        const ultimDiaMes = new Date(any, mes + 1, 0);
        const diaSetmanaInici = primerDiaMes.getDay(); // 0 (diumenge) - 6 (dissabte)
        
        // Ens assegurem que comença en dilluns (com a la majoria de calendaris europeus)
        const offsetInici = (diaSetmanaInici === 0) ? 6 : diaSetmanaInici - 1;
    
        const diesDelMesAnterior = offsetInici;
        const diesDelMesActual = ultimDiaMes.getDate();
    
        // Total dies a mostrar (per completar files senceres de 7 dies)
        const totalDies = Math.ceil((diesDelMesAnterior + diesDelMesActual) / 7) * 7;
    
        // Data inicial a mostrar (pot ser final del mes anterior)
        const dataInici = new Date(any, mes, 1 - diesDelMesAnterior);
    
        for (let i = 0; i < totalDies; i++) {
            const dia = new Date(dataInici);
            dia.setDate(dataInici.getDate() + i);
    
            const diaString = dia.toISOString().slice(0, 10); // "YYYY-MM-DD"
    
            // Comptar quantes tasques té aquest dia
            const tasquesDelDia = tasques.filter(t => t.data_inici.startsWith(diaString));
    
            const dayDiv = document.createElement("div");
            dayDiv.className = "calendar-day";
    
            // Afegim una classe per identificar dies fora del mes actual
            if (dia.getMonth() !== mes) {
                dayDiv.classList.add("outside-month");
            }
    
            dayDiv.innerHTML = `
                <span class="day-number">${dia.getDate()}</span>
                <span class="task-count">${tasquesDelDia.length > 0 ? tasquesDelDia.length + ' tasques' : ''}</span>
            `;
    
            // Clic per anar a la vista diària
            dayDiv.addEventListener("click", () => {
                currentDate = new Date(dia);
                currentView = "day";
                updateCalendar();
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
