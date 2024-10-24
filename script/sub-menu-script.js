const goBackButton = document.querySelector(".go-back-button");

const goBackButtonClicked = function(){
    window.location.href = "../";
}

goBackButton.addEventListener("click", goBackButtonClicked);


// Function to set the input date to 30 days ago
function setDefaultDateStart() {
    const input = document.getElementById('date-start');
    const date = new Date();
    date.setDate(date.getDate() - 30); // Set the date to 30 days ago

    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    const day = String(date.getDate()).padStart(2, '0');

    // Set the value of the input field in the format YYYY-MM-DD
    input.value = `${year}-${month}-${day}`;
}

function setDefaultDateEnd() {
    const input = document.getElementById('date-end');
    const date = new Date();
    date.setDate(date.getDate()); // Set the date to 30 days ago

    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    const day = String(date.getDate()).padStart(2, '0');

    // Set the value of the input field in the format YYYY-MM-DD
    input.value = `${year}-${month}-${day}`;
}

// Call the function to set the default date
setDefaultDateStart();
setDefaultDateEnd();