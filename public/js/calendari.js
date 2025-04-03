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
        calendarTitle.textContent = currentDate.toLocaleDateString("ca-ES", { weekday: 'long', day: 'numeric', month: 'long' });
        calendar.className = "day-view";
        const dayDiv = document.createElement("div");
        dayDiv.textContent = currentDate.toLocaleDateString("ca-ES", { weekday: 'long', day: 'numeric', month: 'long' });
        dayDiv.className = "calendar-day";
        calendar.appendChild(dayDiv);
    }

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
            const dayDiv = document.createElement("div");
            dayDiv.textContent = i;
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

    updateCalendar();
});
