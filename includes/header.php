<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <!--<i class="bi bi-list toggle-sidebar-btn"></i>-->
        <a href="dashboard.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo_cnw.png" alt="">
            <span class="d-none d-lg-block">Lab Testing Automation for Road Research & Materials </span>
        </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/noImg.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['display_name']; ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $_SESSION['username']; ?></h6>
                        <span><?php echo $_SESSION['designation']; ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users_profile.php">
                            <i class="bi bi-person"></i>
                            <span><i class="fa-duotone fa-solid fa-id-card"></i>&nbsp;My Profile</span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">-->
<!--                            <i class="bi bi-gear"></i>-->
<!--                            <span>Account Settings</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <hr class="dropdown-divider">-->
<!--                    </li>-->
<!---->
<!--                    <li>-->
<!--                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">-->
<!--                            <i class="bi bi-question-circle"></i>-->
<!--                            <span>Need Help?</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="services/logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span><i class="fa-duotone fa-solid fa-right-from-bracket"></i>&nbsp;Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->