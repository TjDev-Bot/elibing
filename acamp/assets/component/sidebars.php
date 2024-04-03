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

.active-nav {
    width: 220px;
    height: 40px;
    padding: 5px;
    border-radius: 7px;
    border: 2px solid red;
    background: red;
    box-shadow: 0px 0px 6px 0px rgba(39, 121, 157, 0.20);
}
</style>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                <a class="navbar-brand ps-3" href="index.php"><img src="../image/gensanlogo.png" alt="logo"
                        class="topnavlogo"></a>
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <h1 id="office">ACAMP Site</h1>


                        <hr>
                        <a class="nav-link " href="deceased.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-pen"></i></div>
                            Death Record
                        </a>
                        <a class="nav-link " href="IntermentSched.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i></div>
                            Interment Schedule
                        </a>
                        
                        </a>

                    </div>
                </div>


            </nav>


        </div>
    </div>
    <script>
    const nav_links = document.querySelectorAll('.nav-link');
    const windowPathname = window.location.pathname;

    nav_links.forEach(element => {
        const nav_link_name = new URL(element.href).pathname;
        if (windowPathname === nav_link_name) {
            element.classList.add('active-nav');

            const parentCollapse = element.closest('.collapse');
            if (parentCollapse) {

                const parentLink = parentCollapse.previousElementSibling;
                if (parentLink) {
                    parentLink.classList.add('active-nav');
                }
            }
        }
    });
    </script>
</body>