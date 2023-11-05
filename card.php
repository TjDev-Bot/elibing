<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <?php 
        include  'dbConn/conn.php';
        require('component/header.php');
        require('component/navbar.php');
    ?>
    <link rel="stylesheet" href="css/card.css">
    <link href="admin/css/table.css" rel="stylesheet" />
</head>

<body class="body-niche">
    <div class="container-niche">
        <?php
        $select = "SELECT * FROM tblNiche WHERE Status = '2' ORDER BY Nno ASC";
=======
<?php
require('component/header.php');
require('component/navbar.php');
include 'dbConn/conn.php';
?>
<link rel="stylesheet" href="css/card.css">

<body class="body-niche">

    <div class="container-niche">
        <?php
        $select = "SELECT * FROM tblNiche";
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
        $query = $conn->query($select);
        $count = 0;
        $maxColsPerRow = 5;

        echo '<div class="row">';

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $nno = $data['Nno'];
<<<<<<< HEAD
            $nid = $data['Nid'];
=======
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f

            if ($count % $maxColsPerRow == 0 && $count > 0) {
                echo '</div>';
                echo '<div class="row">';
            }
            echo '<div class="col">';
<<<<<<< HEAD
            echo '<div class="card-niche" data-niche-no="' . $nno . '" data-nid="' . $nid . '">';
=======
            echo '<div class="card-niche" data-niche-no="' . $nno . '">';
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
            echo '<p>Niche no ' . $nno . '</p>';
            echo '</div>';
            echo '</div>';

            $count++;
        }

        echo '</div>';
        ?>
    </div>
<<<<<<< HEAD

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p>Niche No <span id="modalNicheNo"></span></p>
            <p style="display: none;">Nid <span id="modalNid"></span></p>

            <div class="activity-log-container">
                <div class="activity-log-container-scroll">
                    <table class="table-no-border">
                        <thead>
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

    <script>
    const cards = document.querySelectorAll('.card-niche');
    const modal = document.getElementById('myModal');
    const closeModal = document.getElementById('closeModal');
    const modalNicheNo = document.getElementById('modalNicheNo');
    const modalNid = document.getElementById('modalNid');
    const modalTableBody = document.getElementById('modalTableBody');

    function closeModalFunction() {
        modal.style.display = 'none';
        // Clear the modal table content
        modalTableBody.innerHTML = '';
    }

    function openModal(nicheNo, nid) {
        modalNicheNo.textContent = nicheNo;
        modalNid.textContent = nid;
        modal.style.display = 'block';


        fetch('dbConn/fetch_modal_data.php?nid=' + nid) // Replace with the correct PHP file and parameters
            .then(response => response.text())
            .then(data => {
                modalTableBody.innerHTML = data;
            });
    }

    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            const nicheNo = card.getAttribute('data-niche-no');
            const nid = card.getAttribute('data-nid');
            openModal(nicheNo, nid);
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
    </script>
</body>

</html>
=======
</body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <p>Niche No <span id="modalNicheNo"></span></p>
    </div>
</div>

<script>
const cards = document.querySelectorAll('.card-niche');
const modal = document.getElementById('myModal');
const closeModal = document.getElementById('closeModal');
const modalNicheNo = document.getElementById('modalNicheNo');

function openModal(nicheNo) {
    modalNicheNo.textContent = nicheNo;
    modal.style.display = 'block';
}

function closeModalFunction() {
    modal.style.display = 'none';
}

cards.forEach((card, index) => {
    card.addEventListener('click', () => {
        const nicheNo = card.getAttribute('data-niche-no');
        openModal(nicheNo);
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
</script>
>>>>>>> c9be5642966b076214c66ae87a16a96449635e9f
