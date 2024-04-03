<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include  'dbConn/conn.php';
        require('component/header.php');
        require('component/navbar.php');

        $select = "SELECT * FROM tblNiche WHERE Status = '2' ORDER BY Nno ASC";
        $query = $conn->query($select);
    ?>
    <link rel="stylesheet" href="css/card.css">
    <link href="admin/css/table.css" rel="stylesheet" />


</head>
<style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
}

.column {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* Center the content horizontally */
    max-width: 80%;
    max-height: 100%;
    background-color: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
}

.button-container {
    display: flex;
    justify-content: center;
    margin: 20px;
}

.button-row {
    margin: 10px;
}

.button {
    padding: 10px 120px;
    margin: 10px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
    background-color: #4682B4;
    color: white;
    border: none;
    border-radius: 5px;
}

.button:hover {
    background-color: #191970;
}

.circle-button {
    display: inline-block;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    line-height: 50px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    border: none;
}

.circle-button:hover {
    background-color: #45a049;
}

.button-column {
    display: flex;
    flex-direction: column;
}

.header {
    background-color: #3498db;
    color: #fff;
    text-align: center;
    padding: 15px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
}

/* modal backdrop fix */
.modal:nth-of-type(even) {
    z-index: 1052 !important;
}

.modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
}
</style>
</head>

<body>


    <div class="header">
        <h1> Niche Locations </h1>
        <hr>
    </div>
    <div class="column">
        <div class="button-container">

            <?php        
              $select = "SELECT * FROM tblNicheLocation";
              $query = $conn->query($select);
          
              while($data  = $query->fetch(PDO::FETCH_ASSOC)){
                $loc = $data['LocID'];           
          ?>
            <div class="button-row">
                <!-- <button class="button" data-locid="<?php echo $loc ?>">Apartment
                    <?php echo $loc ?></button> -->
                <button class="button" data-locid="<?php echo $loc ?>">Apartment <?php echo $loc ?></button>

            </div>

            <?php }  ?>
            <button class="circle-button">Common Chamber</button>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" data-dismiss="modal" id="closeModal">&times;</span>
                    <h2>Apartment <span id="modalNicheLoc"></span></h2>
                    <hr>
                    <p style="display: none;">Nid <span id="modalNid"></span></p>

                    <div class="body-niche">
                        <div class="container-niche">
                            <?php
                            $select = "SELECT * FROM tblNiche WHERE Status = '2'ORDER BY Nno ASC";
                            $query = $conn->query($select);
                            $count = 0;
                            $maxColsPerRow = 5;

                            echo '<div class="row">';

                            while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                              $nno = $data['Nno'];
                              $nid = $data['Nid'];
                              $locid = $data['LocID']; // Add this line to get the LocID
                          
                              if ($count % $maxColsPerRow == 0 && $count > 0) {
                                  echo '</div>';
                                  echo '<div class="row">';
                              }
                              echo '<div class="col">';
                              echo '<div class="card-niche" data-niche-no="' . $nno . '" data-nid="' . $nid . '" data-locid="' . $locid . '">';
                              echo '<p>Niche no ' . $nno . '</p>';
                              echo '</div>';
                              echo '</div>';
                              
                          
                              $count++;
                          }

                            echo '</div>';
                            ?>



                            <h2>Niche No. <span id="modalNicheNo"></span></h2>
                            <hr>
                            <p style="display: none;">Nid <span id="modalNid"></span></p>

                            <div class="activity-log-container">
                                <div class="activity-log-container-scroll">
                                    <table class="table-no-border" id="niche-location">
                                        <thead style="background-color: #0074B7">
                                            <br>
                                            <input type="search" id="searchInput" placeholder="Search here...">
                                            <tr>
                                                <th>Deceased Name</th>
                                                <th>Birth Date</th>
                                                <th>Date of Death</th>
                                                <th>Interment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modalTableBody">

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
    const cards = document.querySelectorAll('.card-niche');
    const buttons = document.querySelectorAll('.button');
    const modal = document.getElementById('myModal');
    const closeModal = document.getElementById('closeModal');
    const modalNicheNo = document.getElementById('modalNicheNo');
    const modalNid = document.getElementById('modalNid');
    const modalTableBody = document.getElementById('modalTableBody');
    const modalNicheLoc = document.getElementById('modalNicheLoc');

    function closeModalFunction() {
        modal.style.display = 'none';
        modalTableBody.innerHTML = '';
    }

    function openModal(nicheNo, nid, locid) {
        modalNicheNo.textContent = nicheNo;
        modalNid.textContent = nid;
        modalNicheLoc.textContent = locid;
        modal.style.display = 'block';

        fetch('dbConn/fetch_modal_data.php?nid=' + nid)
            .then(response => response.text())
            .then(data => {
                modalTableBody.innerHTML = data;
            });
    }

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const nicheNo = button.getAttribute('data-niche-no');
            const nid = button.getAttribute('data-nid');
            const locid = button.getAttribute('data-locid');
            openModal(nicheNo, nid, locid);
        });
    });

    closeModal.addEventListener('click', () => {
        closeModalFunction();
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModalFunction();
        }
    });

    // cards.forEach((card) => {
    //     card.addEventListener('click', () => {
    //         const nicheNo = card.getAttribute('data-niche-no');
    //         const nid = card.getAttribute('data-nid');
    //         const locid = card.getAttribute('data-locid');
    //         openModal(nicheNo, nid, locid);
    //     });
    // });

    cards.forEach((card) => {
        card.addEventListener('click', () => {
            const nicheNo = card.getAttribute('data-niche-no');
            const nid = card.getAttribute('data-nid');
            const locid = card.getAttribute('data-locid');

            openModal(nicheNo, nid, locid);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const alumniTable = document.getElementById("niche-location");

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
    });
    </script>
    <?php
    require('admin/assets/component/script.php');
    ?>
</body>

</html>