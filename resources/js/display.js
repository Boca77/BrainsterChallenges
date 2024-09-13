document.addEventListener("DOMContentLoaded", (event) => {
    const tableBody = document.getElementById("display-vehicle");
    let counter = 1;

    fetch("/api/home")
        .then((response) => response.json())
        .then((response) => {
            console.log(response.data);

            response.data.forEach((vehicle) => {
                let tableRow = document.createElement("tr");

                const vehicleData = [
                    counter,
                    vehicle.model,
                    vehicle.brand,
                    vehicle.plate_number,
                    vehicle.insurance_date,
                ];

                vehicleData.forEach((data) => {
                    tableRow.appendChild(createCell(data));
                });

                let actionEdit = document.createElement("a");
                actionEdit.textContent = "Edit";
                actionEdit.href = `/edit/${vehicle.id}`;

                let actionDelete = document.createElement("a");
                actionDelete.textContent = "Delete";
                actionDelete.dataset.vehicleId = vehicle.id;
                actionDelete.href = "#";
                actionDelete.addEventListener("click", handleDelete);

                let actionCell = document.createElement("td");
                actionCell.appendChild(actionEdit);
                actionCell.appendChild(document.createTextNode(" | "));
                actionCell.appendChild(actionDelete);

                tableRow.appendChild(actionCell);
                tableBody.appendChild(tableRow);

                counter++;
            });
        })
        .catch((error) => {
            console.error(
                "There has been a problem with your fetch operation:",
                error
            );
        });

    const createCell = (content) => {
        const cell = document.createElement("td");
        cell.textContent = content;
        return cell;
    };

    const handleDelete = (event) => {
        event.preventDefault();

        const vehicleId = event.target.dataset.vehicleId;

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");

        fetch(`/api/delete/${vehicleId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": csrfToken,
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                event.target.closest("tr").remove();
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    };
});
