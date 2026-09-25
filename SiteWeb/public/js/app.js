// Date cible : 6 octobre à 9h00
const targetDate = new Date("2026-10-06T09:00:00").getTime();

function updateCountdown() {
    const daysElement = document.getElementById("days");
    const hoursElement = document.getElementById("hours");
    const minutesElement = document.getElementById("minutes");
    const secondsElement = document.getElementById("seconds");

    if (!daysElement || !hoursElement || !minutesElement || !secondsElement) {
        return;
    }

    const distance = targetDate - new Date().getTime();

    if (distance < 0) {
        daysElement.innerText = "00";
        hoursElement.innerText = "00";
        minutesElement.innerText = "00";
        secondsElement.innerText = "00";
        return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    daysElement.innerText = String(days).padStart(2, "0");
    hoursElement.innerText = String(hours).padStart(2, "0");
    minutesElement.innerText = String(minutes).padStart(2, "0");
    secondsElement.innerText = String(seconds).padStart(2, "0");
}

updateCountdown();
setInterval(updateCountdown, 1000);
