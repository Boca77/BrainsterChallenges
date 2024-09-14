const tableBody = $("#display-vehicle");
let counter = 1;

$.ajax({
    url: "/api/home",
    method: "GET",
    dataType: "json",
    success: function (response) {
        console.log(response.data);

        response.data.forEach((vehicle) => {
            let tableRow = $("<tr>");

            const vehicleData = [
                counter,
                vehicle.model,
                vehicle.brand,
                vehicle.plate_number,
                vehicle.insurance_date,
            ];

            vehicleData.forEach((data) => {
                tableRow.append(createCell(data));
            });

            let actionEdit = $("<a>")
                .text("Edit")
                .attr("href", `/edit/${vehicle.id}`);

            let actionDelete = $("<a>")
                .text("Delete")
                .attr("href", "#")
                .data("vehicle-id", vehicle.id)
                .on("click", handleDelete);

            let actionCell = $("<td>")
                .append(actionEdit)
                .append(" | ")
                .append(actionDelete);

            tableRow.append(actionCell);
            tableBody.append(tableRow);

            counter++;
        });
    },
    error: function (xhr, status, error) {
        console.error(
            "There has been a problem with your Ajax operation:",
            error
        );
    },
});

const createCell = (content) => {
    return $("<td>").text(content);
};

const handleDelete = function (event) {
    event.preventDefault();

    const vehicleId = $(this).data("vehicle-id");

    const csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: `/api/delete/${vehicleId}`,
        method: "DELETE",
        contentType: "application/json",
        headers: {
            "X-CSRF-Token": csrfToken,
        },
        success: function (data) {
            $(event.target).closest("tr").remove();
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
};
