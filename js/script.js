window.addEventListener("DOMContentLoaded",()=>{
    const months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
    if (window.location.href.indexOf("dashboard") == -1) return;
    for (let i=0;i<12;i++) {
        const element = document.createElement("div");
        element.classList.add(months[i]);
        element.textContent = months[i];
        document.querySelector(".stats-container").appendChild(element);
    }
});
