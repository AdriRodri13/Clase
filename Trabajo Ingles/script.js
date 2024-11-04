const messages = [
    "18.2% of young people have tried some type of illegal drug",
    "Two out of three young people have tried alcohol and 20% drink regularly",
    "In Spain there are a 1000 deaths a year due to overdose",
    "28.5% of young people have tried cannabis and 15% smoke weed regularly"
];

function showMessage(index) {
    const messageBox = document.getElementById("message");
    const infoText = document.getElementById("infoText");

    infoText.textContent = messages[index];
    messageBox.style.display = "block";
}
