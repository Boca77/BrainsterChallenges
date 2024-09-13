document.getElementById("Form").addEventListener("submit", function (event) {
    event.preventDefault();

    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.style.display = "none";
    errorMessageElement.textContent = "";

    const formData = new FormData(this);

    const formObject = {};
    formData.forEach((value, key) => {
        formObject[key] = value;
    });

    fetch("/api/store", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(formObject),
    })
        .then((response) => {
            if (response.ok) {
                const contentType = response.headers.get("Content-Type");
                if (contentType && contentType.includes("application/json")) {
                    return response.json();
                } else {
                    return response.text().then((text) => {
                        throw new Error(
                            `Expected JSON but received ${contentType}: ${text}`
                        );
                    });
                }
            } else {
                return response.json().then((data) => {
                    if (data.errors) {
                        throw new Error(JSON.stringify(data.errors));
                    } else {
                        throw new Error(
                            data.message || "An unexpected error occurred"
                        );
                    }
                });
            }
        })
        .then((data) => {
            console.log("Success:", data);
            window.location.href = "/";
        })
        .catch((error) => {
            errorMessageElement.style.display = "block";

            try {
                const errors = JSON.parse(error.message);
                if (typeof errors === "object") {
                    const ul = document.createElement("ul");
                    Object.values(errors).forEach((messages) => {
                        messages.forEach((message) => {
                            const li = document.createElement("li");
                            li.textContent = message;
                            ul.appendChild(li);
                        });
                    });
                    errorMessageElement.appendChild(ul);
                } else {
                    errorMessageElement.textContent = error.message;
                }
            } catch (e) {
                errorMessageElement.textContent = error.message;
            }
        });
});
