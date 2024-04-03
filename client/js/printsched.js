
document.getElementById("print-schedule").addEventListener("click", function() {
    // Create a new window to print
    var printWindow = window.open("", "", "width=600,height=600");
    printWindow.document.write("<html><head><title>E - Libing</title></head><body>");

    // Style the table for printing
    printWindow.document.write('<style type="text/css">');
    printWindow.document.write('.btn { display: none; }');
    printWindow.document.write('h1 { font-size: 10px; }');
    printWindow.document.write('#table-no-border { background-color: #f5f5f5; border-collapse: collapse; width: 100%; }');
    printWindow.document.write('#table-no-border th, #table-no-border td { padding: 10px; border: 1px solid #000; }');
    printWindow.document.write('#table-no-border th {background-color: #f5f5f5; }');

    printWindow.document.write('</style>');

    // Get the table to print
    var tableToPrint = document.getElementById("table-no-border");

    // Append the table to the print window
    printWindow.document.write("<h1>Schedule</h1>");
    printWindow.document.write(tableToPrint.outerHTML);

    // Close the print window and print
    printWindow.document.write("</body></html>");
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
});


function filterScheduleByDateRange() {
    const startDate = new Date(document.getElementById("startDate").value);
    const endDate = new Date(document.getElementById("endDate").value);

    // Get all the rows in the table body
    const rows = document.querySelectorAll("#table-no-border tbody tr");

    rows.forEach(function(row) {
        const dateStr = row.querySelector("td:nth-child(2)").textContent;
        const scheduleDate = new Date(dateStr);

        if (scheduleDate >= startDate && scheduleDate <= endDate) {
            row.style.display = ""; // Show the row
        } else {
            row.style.display = "none"; // Hide the row
        }
    });
}

document.getElementById("filter-button").addEventListener("click", filterScheduleByDateRange);
document.getElementById("print-schedule").addEventListener("click", function() {
    // Print code here
});