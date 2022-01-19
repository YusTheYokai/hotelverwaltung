<?php
    require_once "guard.php";
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="pointer-events: none;">Hu-Lerchl</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">
                        Home<img src="/icon/house-fill.svg" class="icon" alt="Home-Icon" />
                    </a>
                </li>
                <?php
                    if (isLoggedIn()) {
                        require_once "menubar/guestMenubarLinks.php";
                    }
                    if (isAdmin()) {
                        require_once "menubar/adminMenubarLinks.php";
                    }
                ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" aria-current="page" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            if (isset($_SESSION["user"])) {
                                echo $_SESSION["user"]["FIRST_NAME"] . " " . $_SESSION["user"]["LAST_NAME"];
                            } else {
                                echo "User";
                            }
                        ?><img src='/icon/person-circle.svg' class='icon' alt='Person-Icon' />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                            if (isset($_SESSION["user"])) {
                                require_once "menubar/loggedInDropdown.php";
                            } else {
                                require_once "menubar/loggedOutDropdown.php";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>