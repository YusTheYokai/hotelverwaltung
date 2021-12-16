<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hotelverwaltung</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/imprint.html">
                        Impressum<img src="/icon/info-circle-fill.svg" class="icon" alt="Info-Icon" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/help.html">
                        Hilfe<img src="/icon/question-circle-fill.svg" class="icon" alt="Question-Icon" />
                    </a>
                </li>
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
                                echo "<li><a class='dropdown-item' href='/pages/profile.php'>Profil bearbeiten<img src='/icon/pencil-fill.svg' class='icon' alt='Bearbeiten-Icon' /></a></li>";
                                echo "<li><a class='dropdown-item' href='/index.php?logout=true'>Logout<img src='/icon/box-arrow-right.svg' class='icon' alt='Logout-Icon' /></a></li>";
                            } else {
                                echo "<li><a class='dropdown-item' href='/pages/login.php'>Login<img src='/icon/box-arrow-in-left.svg' class='icon' alt='Login-Icon' /></a></li>";
                                echo "<li><a class='dropdown-item' href='/pages/registration/registration.php'>Registrierung<img src='/icon/key-fill.svg' class='icon' alt='Key-Icon' /></a></li>";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>