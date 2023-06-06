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
const monthsShort = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
const monthsFull = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const prices = ["50", "75", "125", "250", "375", "500"];
const heights = [];
let total = 0;
for (let i = 0; i < 12; i++) {
    const randomHeight = Math.floor(Math.random() * 100) + 1;
    heights.push(randomHeight);
}

window.addEventListener("DOMContentLoaded", ()=>{
    if (window.location.href.indexOf("dashboard") == -1) return;
    setTimeout(() => {
        fetchData("../api/get-monthly.php?id="+userID).then((data) => {
            let index = 0;
            monthsFull.forEach(month=>{
                const bar = document.createElement("div");
                bar.classList.add("col-1", "stat-bar");
                const container = document.createElement("div");
                container.classList.add("col-1");
                bar.id = monthsFull[index];
                container.textContent = monthsShort[index];
     
                document.querySelector(".bar-container").appendChild(bar);
                document.querySelector(".stats-container .row").appendChild(container);

                if (data[`${month} ${new Date().getFullYear()}`]) {
                    const monthData = data[`${month} ${new Date().getFullYear()}`];
                    let total = 0;
                    monthData.forEach(element => {
                        const spendingAmount = element["SPENDING_AMOUNT"];
                        total += spendingAmount;
                    });
                    const height = (total / 500) * 100;
                    height > 100 ? bar.style.height = "100%" :
                    bar.style.height = height + "%";
                }
                
                index++;
            });
        });
    }, 10);
    for (let i=0;i<prices.length;i++) {
        const element = document.createElement("div");
        element.classList.add("price-amt");
        element.innerHTML = "&euro;"+prices[i];
        document.querySelector(".stats-container-cash").appendChild(element);
    }
});
document.addEventListener("mouseover", hoverEvents, false);
document.addEventListener("mouseout", hoverOff, false);
function hoverEvents(event){
    const target = event.target;
    if (target.matches(".stat-bar")) {
        fetchData("../api/get-monthly.php?id="+userID).then((data) => {
            const searchMonth = `${target.id} ${new Date().getFullYear()}`;
            const spentContainer = document.querySelector(".amount-spent-month");
            spentContainer.style.opacity=1;
            const rect = target.getBoundingClientRect();
            spentContainer.style.top = 200 + 'px';
            spentContainer.style.left = Number(rect.left+ 50) + 'px';
            if (data[searchMonth]) {
                data[searchMonth].forEach(element => {
                    Number(total += element["SPENDING_AMOUNT"]);
                });
                document.getElementById("amount-spent").innerHTML="&euro;"+total
            } else {
                document.getElementById("amount-spent").innerHTML="No results...";
            }
        });
    }
}
function hoverOff() {
    total=0;
    document.querySelector(".amount-spent-month").style.opacity=0;
}