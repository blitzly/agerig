<header>
    <div id="brand">
        <h1>Adrian Gerig</h1>
        <div id="brand-cover-letter">A</div>
    </div>
    <div id="nav-container">
        <?php if (isset($_SESSION['id'])){ ?>
            <div class="pb-1 user-avatar mx-auto"><?php echo ucfirst(substr($_SESSION['fullname'], 0, 1))  ?></div>
            <div class="pb-1"><?php echo $_SESSION['fullname'] ?></div>
        <?php } ?>
            <div class="pb-3" >
            <?php if (isset($_SESSION['id']) && ($_SESSION['type'] == 'administrator' || $_SESSION['type'] == 'master')){ ?>
                <a href="/user/dashboard" class='p-3' title="Go to Dashboard"><i class="bi bi-speedometer2"></i></a>
            <?php } if (isset($_SESSION['id'])){ ?>
                <a href="#" id="btn-logout" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
            </div>
            <?php } ?>
        <div class="nav-divider"></div>
        <!-- SIDE MENU -->
        <nav>
            <ul>
                <li><a href="/#showcase">Home</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#skills">Skills</a></li>
                <li><a href="/#portfolio">Portfolio</a></li>
                <li><a href="/#contact">Contact</a></li>
                <?php echo !isset($_SESSION['id']) ? '<li><a href="login">Login</a></li>' : "" ?>
                <?php echo isset($_SESSION['id']) ? '<li><a href="login">Portfolio</a></li>' : "" ?>
            </ul>
        </nav>
        <div class="nav-divider"></div>
    </div>
    <div class="social-icons">
        <a href="https://www.linkedin.com/in/adrian-gerig" target="blank"><i class="bi bi-linkedin"></i></a>
    </div>
</header>
<h1 id="navbar-toggle"><i class="bi bi-list"></i></h1>