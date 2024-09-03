const goBackButton = document.querySelector(".go-back-button");

const goBackButtonClicked = function(){
    window.location.href = "../";
}

goBackButton.addEventListener("click", goBackButtonClicked);