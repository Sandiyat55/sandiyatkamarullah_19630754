    <!--  BEGIN NAVBAR  -->
    <header class="desktop-nav header navbar fixed-top">
        <div class="nav-logo mr-sm-5 ml-sm-4">
            <a href="javascript:void(0);" class="nav-link sidebarCollapse d-inline-block mr-sm-5" data-placement="bottom">
                <i class="flaticon-menu-line-3"></i>
            </a>
            <a href="#" class=""> <img src="../assets/img/2.png" class="img-fluid" alt="logo"></a>
        </div>

        <ul class="navbar-nav flex-row ml-lg-auto">
            <ul class="navbar-nav flex-row ">
                <li class="nav-item dropdown  align-self-center">
                    <span class=""><?= $_SESSION['users']; ?></span>
                </li>
            </ul>
            <li class="nav-item dropdown user-profile-dropdown pl-4 pr-lg-0 pr-2 ml-lg-2 mr-lg-4  align-self-center">
                <a href="#" class="dropdown-toggle user">
                    <div class="user-profile d-lg-block d-none">
                        <img src="../assets/img/90x90.jpg" alt="admin-profile" class="img-fluid">
                    </div>
                    <i class="flaticon-user-7 d-lg-none d-block"></i>
                </a>
            </li>
        </ul>
    </header>
    <!--  END NAVBAR  -->