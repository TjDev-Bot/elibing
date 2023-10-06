<!DOCTYPE html>
<html lang="en">

<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
?>



<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- <h1 class="mt-4">Niche Location</h1> -->
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Niche Location</li>
                    </ol>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="container">

                            <input type="search" id="search-input" placeholder="Search here...">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Niche No.
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date of Death
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Date of Interment
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            1
                                        </th>
                                        <td class="px-6 py-4">
                                            John Doe
                                        </td>
                                        <td class="px-6 py-4">
                                            07/01/2023
                                        </td>
                                        <td class="px-6 py-4">
                                            07/12/2023
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 "><i
                                        class="fa-solid fa-eye"></i></a> -->
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 "><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            2
                                        </th>
                                        <td class="px-6 py-4">
                                            Ana Laurel
                                        </td>
                                        <td class="px-6 py-4">
                                            12/13/2020
                                        </td>

                                        <td class="px-6 py-4">
                                            12/20/2020
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- <a href="vw-deceased.php" class="font-medium text-blue-600 dark:text-blue-500 "><i
                                        class="fa-solid fa-eye"></i></a> -->
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 "><i
                                                    class="fa-solid fa-trash"></i></a>
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