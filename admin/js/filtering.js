function updateCountdown() {
    var dueDateElements = document.querySelectorAll('.due-date');
    var dueWarningElements = document.querySelectorAll('.due-warning');

    dueDateElements.forEach(function(dueDateElement, index) {
        var dueDateString = dueDateElement.textContent;
        var dueDate = new Date(dueDateString);
        var currentDate = new Date();

        var timeDifference = dueDate - currentDate;
        var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
        var hoursDifference = Math.floor((timeDifference % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
        var minutesDifference = Math.floor((timeDifference % (60 * 60 * 1000)) / (60 * 1000));
        var secondsDifference = Math.floor((timeDifference % (60 * 1000)) / 1000);

        var dueWarning = '';
        var warningColor = '';

        if (currentDate > dueDate) {
            dueWarning = 'Past Due (' + daysDifference + ' days ' + hoursDifference + 'h ' +
                minutesDifference + 'm ' + secondsDifference + 's)';
            warningColor = 'red';
            dueDateElement.style.color = 'red';
        } else if (daysDifference >= 7 && daysDifference < 30) {
            dueWarning = 'A week (' + daysDifference + ' days)';
            warningColor = 'blue';
            dueDateElement.style.color = 'blue';
        } else if (hoursDifference >= 168) {
            dueWarning = 'A month or more (' + hoursDifference + 'h ' + minutesDifference + 'm ' +
                secondsDifference + 's left)';
            warningColor = 'green';
            dueDateElement.style.color = 'green';
        } else if (daysDifference >= 1 && daysDifference <= 6) {
            dueWarning = 'a (' + daysDifference + ' day/s left)';
            warningColor = 'orange';
            dueDateElement.style.color = 'orange';
        } else if (daysDifference === 0) {
            dueWarning = 'Today (' + hoursDifference + 'h ' + minutesDifference + 'm ' + secondsDifference +
                's left)';
            warningColor = 'orange';
            dueDateElement.style.color = 'orange';
        } else if (daysDifference >= 30) {
            dueWarning = 'A month or more (' + daysDifference + ' days)';
            warningColor = 'green';
            dueDateElement.style.color = 'green';
        }

        dueWarningElements[index].textContent = dueWarning;
        dueWarningElements[index].style.color = warningColor;
    });
}


function updateCountdownInterval() {
    updateCountdown();
    setInterval(updateCountdown, 1000); // Update countdown every second
}

document.addEventListener("DOMContentLoaded", function() {
    updateCountdownInterval();

    const searchInput = document.getElementById("searchInput");
    const alumniTable = document.getElementById("e-libingTable");

    searchInput.addEventListener("input", function() {
        const searchText = searchInput.value.toLowerCase();
        const rows = alumniTable.querySelectorAll("tbody tr");

        rows.forEach(function(row) {
            const rowData = row.textContent.toLowerCase();
            if (rowData.includes(searchText)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });



   function filterTable() {
    var selectedValue = document.getElementById('timeFilter').value;
    var table = document.getElementById('e-libingTable');
    var rows = table.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var dueCell = row.querySelector('.due-date');
        var name = row.getElementsByTagName('td')[0];

        if (name && dueCell) {
            var nameText = name.textContent.toLowerCase();
            var dueDate = new Date(dueCell.textContent);
            var currentDate = new Date();

            switch (selectedValue) {
                case 'all':
                    row.style.display = '';
                    break;
                case '1_year':
                    var timeDifference = dueDate - currentDate;
                    var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                    if (daysDifference >= 1 && daysDifference <= 1825) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                    break;
                case '1_month':
                    var timeDifference = dueDate - currentDate;
                    var daysDifference = Math.floor(timeDifference / (24 * 60 * 60 * 1000));
                    if (daysDifference >= 0 && daysDifference <= 30) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                    break;
            }
        }
    }
}

// Add an event listener for the filter change event
document.getElementById('timeFilter').addEventListener('change', filterTable);

// Initial table filtering
filterTable();


    // Add an event listener for the filter change event
    document.getElementById('timeFilter').addEventListener('change', filterTable);

    // Initial table filtering
    filterTable();


});
