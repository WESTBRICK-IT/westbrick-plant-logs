const hotOil2Button = document.querySelector(".hot-oil-2-button");
const nP_DailyProduction2Button = document.querySelector(".np-daily-production-2-button");
const plantLog2Button = document.querySelector(".plant-log-2-button");
const pLC_Changes2Button = document.querySelector(".plc-changes-2-button");
const safetyBypassLog2Button = document.querySelector(".safety-bypass-log-2-button");
const treater101_2Button = document.querySelector(".treater-101-2-button");
const volcano2Button = document.querySelector(".volcano-2-button");
const goBackButton = document.querySelector(".go-back-button");

const hotOil2ButtonClick = function() {
    window.location.href = "./hot-oil-2/";
}
const nP_DailyProduction2ButtonClick = function() {
    window.location.href = "./np-daily-production-2/";
}
const plantLog2ButtonClick = function() {
    window.location.href = "./plant-log-2/";
}
const pLC_Changes2ButtonClick = function() {
    window.location.href = "./plc-changes-2-button/";
}
const safetyBypassLog2ButtonClick = function() {
    window.location.href = "./safety-bypass-log-2/";
}
const treater101_2ButtonClick = function() {
    window.location.href = "./treater-101-2/";
}
const volcano2ButtonClick = function() {
    window.location.href = "./volcano-2/";
}
const goBackButtonClick = function() {
    window.location.href = "../";
}

hotOil2Button.addEventListener("click", hotOil2ButtonClick);
nP_DailyProduction2Button.addEventListener("click", nP_DailyProduction2ButtonClick);
plantLog2Button.addEventListener("click", plantLog2ButtonClick);
pLC_Changes2Button.addEventListener("click", pLC_Changes2ButtonClick);
safetyBypassLog2Button.addEventListener("click", safetyBypassLog2ButtonClick);
treater101_2Button.addEventListener("click", treater101_2ButtonClick);
volcano2Button.addEventListener("click", volcano2ButtonClick);
goBackButton.addEventListener("click", goBackButtonClick);