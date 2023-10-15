
document.getElementById("print-button").addEventListener("click", function() {
    // Create a new window to print
    var printWindow = window.open("", "", "width=600,height=600");
    printWindow.document.write("<html><head><title>E - Libing</title></head><body>");

    // Style the table for printing
    printWindow.document.write('<style type="text/css">');
    printWindow.document.write('.btn { display: none; }');
    printWindow.document.write('h1 { font-size: 10px; }');
    printWindow.document.write('#e-libingTable { background-color: #f5f5f5; border-collapse: collapse; width: 100%; }');
    printWindow.document.write('#e-libingTable th, #e-libingTable td { padding: 10px; border: 1px solid #000; }');
    printWindow.document.write('#e-libingTable th {background-color: #f5f5f5; }');
    printWindow.document.write('.due-date { font-weight: bold; color: #FF0000; }');
    printWindow.document.write('.due-warning { font-size: 8px; font-weight: bold; color: #FF0000; }');
    printWindow.document.write('#e-libingTable th:last-child { display: none; }'); 
    printWindow.document.write('#e-libingTable td:last-child { display: none; }');

    printWindow.document.write('</style>');

    // Get the table to print
    var tableToPrint = document.getElementById("e-libingTable");

    // Append the table to the print window
    printWindow.document.write("<h1>Master Profile</h1>");
    printWindow.document.write(tableToPrint.outerHTML);

    // Close the print window and print
    printWindow.document.write("</body></html>");
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
});
