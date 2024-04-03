<!DOCTYPE html>
<html lang="en">

<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebars.php');
?>



<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Due Cadavers</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">
                            <h1>Due Cadavers</h1>
                        </li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">
                            <input type="search" id="search-input" placeholder="Search here...">
                            <select name="" id="">
                                <option value=""></option>
                                <option value="">1 month</option>
                                <option value="">2 months</option>
                            </select>
                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Niche No
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date of Burial
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Date of Transfer
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                </th>
                                                <td class="px-6 py-4">
                                                </td>
                                                <td class="px-6 py-4">
                                                </td>
                                                <td class="px-6 py-4">
                                                </td>
                                                <td class="px-6 py-4">
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary " onclick="addLocation(<?php echo $id; ?>)">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </button>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </main>
        </div>
    </div>

    <script>
        // JavaScript code for searching the table, same as before
        function searchTable() {
            const input = document.getElementById("search-input").value.toLowerCase();
            const tableRows = document.querySelectorAll("#table-body tr");

            for (const row of tableRows) {
                const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase();
                const dateOfDeath = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
                const intermentDate = row.querySelector("td:nth-child(4)").innerText.toLowerCase();

                if (name.includes(input) || dateOfDeath.includes(input) || intermentDate.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        document.getElementById("search-input").addEventListener("input", searchTable);
    </script>



    <?php
    require('assets/component/script.php');
    ?>


</body>

</html>