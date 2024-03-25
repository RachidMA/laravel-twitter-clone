import "./bootstrap";

const closeMessage = document.querySelector("#closeFlashMsg");

if (closeMessage) {
    closeMessage.addEventListener("click", () => {
        closeMessage.parentElement.remove();
    });
}

//POPULATING CITIES INPUT FOR THE SEARCH COMPOMENT
const country = "Morocco";
let requestOptions = {
    method: "POST",
    body: JSON.stringify({ country: country }), // Make sure to use the correct country name
    headers: {
        "Content-Type": "application/json",
    },
    redirect: "follow",
};

const getCities = () => {
    return new Promise((resolve, reject) => {
        fetch(
            "https://countriesnow.space/api/v0.1/countries/cities",
            requestOptions
        )
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((result) => {
                resolve(result.data.sort());
            })
            .catch((error) => {
                reject(error);
            });
    });
};

// Using the promise
getCities()
    .then((data) => {
        data.forEach((element) => {
            const selectDiv = document.querySelector("#cities");
            let option = document.createElement("option");
            option.text = element;
            option.value = element;
            selectDiv.appendChild(option);
        });
    })
    .catch((error) => {
        console.error("Error:", error);
    });
