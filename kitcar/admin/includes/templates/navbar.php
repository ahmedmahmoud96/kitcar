<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #100801b0;" >
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">
            <h1 class="text-center logo hvr-buzz-out">Kit<i class="fas fa-car-crash"></i>Car</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="dashboard.php"><i class="fas fa-home"></i> الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page"  href="sections.php?do=Manage"> <i class="fas fa-car"></i> الأقسام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="members.php?do=ManageVendor"><i class="fa fa-users"></i> التجار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="members.php?do=ManageClient"><i class="fas fa-user-tie"></i> الزبائن</a>
                </li>
                


                <li class="nav-item">
                    <?php
                    $show_vendor = "SELECT * from vendor";
                    $res = mysqli_query($conn, $show_vendor);
                    while ($row = mysqli_fetch_array($res)) {
                        global $count;
                        if ($row['RegStatus'] == 0) {
                            $count++;
                        }
                    }
                    if (@$count > 0) { ?>
                        <div id="bell"> <a class="nav-link " aria-current="page" href="#" id="notification" > <i class="fas fa-bell" style="color:red;"></i> الإشعارات</a> </div>
                        <div class="notifications" id="box">
                            <h2> الإشعارات- <span> <?php CalcPending(); ?></span></h2>
                            <?php for ($i = 1; $i <= $count; $i++) {
                                echo '<div class="notifications-item" > <img src="layout/images/user.png" alt="img">
                                <a href="members.php?do=ManageActivate" >
                                    <div class="text">
                                        <h4>تاجر جديد</h4>
                                        <p> يوجد تاجر قام بالتسجيل مؤخرًا قم بمشاهدت سجلة التجاري وأختيار الأجراء المناسب . . </p>
                                        
                                    </div>
                                </a>
                               </div> ';
                            } ?>
                        </div>
                    <?php } else { ?>
                        <div id="bell"> <a class="nav-link " aria-current="page" href="#" id="notification" > <i class="fas fa-bell"></i> الإشعارات</a> </div>
                        <div class="notifications" id="box" >
                            <h2> الإشعارات- <span> 0</span></h2>
                            <div class="notifications-item" >
                                <div class="text">
                                    <h4> لا يوجد إشعارات جديدة</h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-cog"></i>  <?php echo $_SESSION['name']?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="members.php?do=Edit&id=<?php echo $_SESSION['ID'] ?>"> <i class="fas fa-user-edit"></i> تعديل الملف الشخصي</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
