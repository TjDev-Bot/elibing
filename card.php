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
        $query = $conn->query($select);
        $count = 0;
        $maxColsPerRow = 5;

        echo '<div class="row">';

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $nno = $data['Nno'];

            if ($count % $maxColsPerRow == 0 && $count > 0) {
                echo '</div>';
                echo '<div class="row">';
            }
            echo '<div class="col">';
            echo '<div class="card-niche" data-niche-no="' . $nno . '">';
            echo '<p>Niche no ' . $nno . '</p>';
            echo '</div>';
            echo '</div>';

            $count++;
        }

        echo '</div>';
        ?>
    </div>
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