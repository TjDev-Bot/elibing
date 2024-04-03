<div id="navbar">
    <nav class="navbar-container container">
        <a href="home.php" class="home-link">
            <div class="navbar-logo">
                <img src="image/lgulogogensan.png" alt="" style="height:75px;" class="logo" float="left">
            </div>
        </a>
        <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu"
            aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div id="navbar-menu" aria-labelledby="navbar-toggle">
            <ul class="navbar-links">
                <li class="navbar-item"><a class="navbar-link" href="home.php">Home</a></li>
                <li class="navbar-item"><a class="navbar-link" href="about.php">About</a></li>
                <li class="navbar-item"><a class="navbar-link" href="contact.php">Contact</a></li>
                <!--li class="navbar-item"><a class="navbar-link" href="card.php">Niches</a></li-->
                <li class="navbar-item"><a class="navbar-link btn" href="user-log.php" style="color:white">Login</a></li>
            </ul>
        </div>
    </nav>
</div>

<style>
    :root {
        --navbar-bg-color: whitesmoke;
        --navbar-text-color: hsl(0, 0%, 0%);
        --navbar-text-color-focus: rgb(0, 0, 0);
        --navbar-bg-contrast: hsl(0, 0%, 25%);
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        height: 100vh;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 1.6;
    }
    .btn{
        background-color:#2655f0;
        color: white;
        font-weight: bold;
    }
    .container {

        padding-right: 30px;
        margin-right: auto;
    }

    #navbar {
        --navbar-height: 64px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 70px;
        background: whitesmoke;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 1);
        z-index: 99;
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        height: 100%;
        align-items: center;
    }

    .navbar-item {
        margin: 0.4em;
        width: 100%;
    }

    .home-link,
    .navbar-link {
        color: var(--navbar-text-color);
        text-decoration: none;
        display: flex;
        font-weight: 400;
        align-items: center;
    }

    .home-link:is(:focus, :hover) {
        color: white;
    }

    .navbar-link {
        justify-content: center;
        width: 100%;
        padding: 0.4em 0.8em;
        border-radius: 5px;
    }

    .navbar-link:is(:focus, :hover) {
        background-color: #2655f0;
        color: white;
    }

    .navbar-logo {
        align-items: center;
        margin-left: 10px;

    }

    #navbar-toggle {
        cursor: pointer;
        border: none;
        background-color: transparent;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .icon-bar {
        display: block;
        width: 25px;
        height: 4px;
        margin: 2px;
        background-color: blue;
    }

    #navbar-toggle:is(:focus, :hover) .icon-bar {
        background-color: blue;
    }

    #navbar-toggle[aria-expanded="true"] .icon-bar:is(:first-child, :last-child) {
        position: absolute;
        margin: 0;
        width: 30px;
    }

    #navbar-toggle[aria-expanded="true"] .icon-bar:first-child {
        transform: rotate(45deg);
    }

    #navbar-toggle[aria-expanded="true"] .icon-bar:nth-child(2) {
        opacity: 0;
    }

    #navbar-toggle[aria-expanded="true"] .icon-bar:last-child {
        transform: rotate(-45deg);
    }

    #navbar-menu {
        position: fixed;
        top: var(--navbar-height);
        bottom: 0;
        opacity: 0;
        visibility: hidden;
        left: 0;
        right: 0;
    }

    #navbar-toggle[aria-expanded="true"]+#navbar-menu {
        background-color: rgba(0, 0, 0, 0.4);
        opacity: 1;
        visibility: visible;
    }

    .navbar-links {
        list-style: none;
        position: absolute;
        background-color: var(--navbar-bg-color);
        display: flex;
        flex-direction: column;
        align-items: center;
        left: 0;
        right: 0;
        margin: 1.4rem;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    #navbar-toggle[aria-expanded="true"]+#navbar-menu .navbar-links {
        padding: 1em;
    }

    @media screen and (min-width: 700px) {

        #navbar-toggle,
        #navbar-toggle[aria-expanded="true"] {
            display: none;
        }

        #navbar-menu,
        #navbar-toggle[aria-expanded="true"] #navbar-menu {
            visibility: visible;
            opacity: 1;
            position: static;
            display: block;
            height: 100%;
        }

        .navbar-links,
        #navbar-toggle[aria-expanded="true"] #navbar-menu .navbar-links {
            margin: 0;
            padding: 0;
            box-shadow: none;
            position: static;
            flex-direction: row;
            width: 100%;
            height: 100%;
        }

    }
</style>

<script>
    const navbarToggle = navbar.querySelector("#navbar-toggle");
    const navbarMenu = document.querySelector("#navbar-menu");
    const navbarLinksContainer = navbarMenu.querySelector(".navbar-links");
    let isNavbarExpanded = navbarToggle.getAttribute("aria-expanded") === "true";

    const toggleNavbarVisibility = () => {
        isNavbarExpanded = !isNavbarExpanded;
        navbarToggle.setAttribute("aria-expanded", isNavbarExpanded);
    };

    navbarToggle.addEventListener("click", toggleNavbarVisibility);

    navbarLinksContainer.addEventListener("click", (e) => e.stopPropagation());
    navbarMenu.addEventListener("click", toggleNavbarVisibility);
</script>