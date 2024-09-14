$("#Form").on("submit", function (event) {
    event.preventDefault();

    const errorMessageElement = $("#error-message");
    errorMessageElement.hide().empty();

    const formData = $(this).serializeArray();
    const formObject = {};
    formData.forEach((item) => {
        formObject[item.name] = item.value;
    });

    const vehicleId = formObject.id;

    $.ajax({
        url: `/api/edit/${vehicleId}`,
        method: "PUT",
        contentType: "application/json",
        data: JSON.stringify(formObject),
        success: function (data) {
            console.log("Success:", data);
            window.location.href = "/";
        },
        error: function (xhr) {
            let errorMessage = "An unexpected error occurred";
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.errors) {
                    errorMessage = $("<ul>");
                    $.each(response.errors, function (field, messages) {
                        $.each(messages, function (index, message) {
                            $("<li>").text(message).appendTo(errorMessage);
                        });
                    });
                } else if (response.message) {
                    errorMessage = response.message;
                }
            } catch (e) {
                errorMessage = xhr.responseText;
            }
            errorMessageElement.html(errorMessage).show();
        },
    });
});
