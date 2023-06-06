// Fetch call
async function fetchData(url = '') {
    // Default options are marked with *
    const response = await fetch(url, {
      method: 'GET', // *GET, POST, PUT, DELETE, etc.
      headers: {
        'Content-Type': 'application/json'
        // 'Content-Type': 'application/x-www-form-urlencoded',
      }
    });
    return response.json(); // parses JSON response into native JavaScript objects
}
const userID = document.getElementById("id").value;
const months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
const prices = ["10", "20", "40", "80", "160", "300"];
const heights = [];
for (let i = 0; i < 12; i++) {
    const randomHeight = Math.floor(Math.random() * 100) + 1;
    heights.push(randomHeight);
}

window.addEventListener("DOMContentLoaded", ()=>{
    if (window.location.href.indexOf("dashboard") == -1) return;
    for (let i=0;i<months.length;i++) {
        const bar = document.createElement("div");
        bar.classList.add("col-1", "stat-bar");
        const container = document.createElement("div");
        container.classList.add(months[i], "col-1");
        container.textContent = months[i];
        setTimeout(() => {
            bar.style.height = heights[i]+"%";
        }, 10);
        document.querySelector(".bar-container").appendChild(bar);
        document.querySelector(".stats-container .row").appendChild(container);
    }
    for (let i=0;i<prices.length;i++) {
        const element = document.createElement("div");
        element.classList.add("price-amt");
        element.innerHTML = "&euro;"+prices[i];
        document.querySelector(".stats-container-cash").appendChild(element);
    }
    const bars = document.querySelectorAll(".stat-bar");
    bars.forEach(bar => {
        bar.addEventListener("mouseover",()=>{
            fetchData("../api/get-monthly.php?id="+userID).then((data) => {
                console.log(data);
            });
        });
    });
});
