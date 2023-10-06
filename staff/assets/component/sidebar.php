<style>
#office {
    text-align: center;
    font-size: 30px;
    justify-content: center;
    margin: 5px;
    color: white;
}

.sidebar-avatar {
    display: flex;
    align-items: center;
}

.sidebar-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.sidebar-avatar .name {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
    color: white;
}

.sidebar-avatar .job-title {
    margin: 0;
    font-size: 14px;
    color: white;
}
</style>


<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <h1 id="office">Staff</h1>

                       
                        <hr>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="file.php" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"> <i class='bx bx-user'></i>
                            </div>
                            Master Profile
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="niche.php">Niche</a>
                                <a class="nav-link" href="deceased.php">Deceased</a>
                            </nav>
                        </div>


                        <a class="nav-link " href="appointment.php">
                            <div class="sb-nav-link-icon"> <i class='bx bx-clipboard'></i>
                            </div>
                            Appointment
                        </a>

                        <a class="nav-link " href="DueCadavers.php">
                            <div class="sb-nav-link-icon"> <i class='bx bx-error'></i>
                            </div>
                            Due Cadavers
                        </a>

                        <a class="nav-link " href="IntermentSched.php">
                            <div class="sb-nav-link-icon"> <i class='bx bx-calendar'></i>
                            </div>
                            Interment Schedule
                        </a>

                        <a class="nav-link " href="renewal.php">
                            <div class="sb-nav-link-icon"> <i class='bx bx-file'></i>
                            </div>
                            Renewal
                        </a>
                        <a class="nav-link " href="location.php">
                            <div class="sb-nav-link-icon"> <i class='bx bx-map'></i>
                            </div>
                            Location
                        </a>
                       
                    </div>
                </div>


            </nav>


        </div>
    </div>
</body>