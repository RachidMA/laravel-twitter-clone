import "./bootstrap";

const closeMessage = document.querySelector("#closeFlashMsg");

if (closeMessage) {
    closeMessage.addEventListener("click", () => {
        closeMessage.parentElement.remove();
    });
}
