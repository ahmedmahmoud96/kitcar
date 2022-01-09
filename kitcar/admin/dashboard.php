<?php
ob_start();
session_name('adminLogin');
session_start();
$pageTitle = "Dashboard";
if (isset($_SESSION['Admin_email'])) {
    include "init.php";
?>
    <div class="home-stats">
        <div class="container text-center">
            <h1 class="Htitl">Dashboard</h1>
            <div class="row">
                <div class="col-md-3  mt-1">
                    <a href="members.php?do=ManageAdmin">
                        <div class="stat  st-design">
                            <i class="fa fa-users Istyle"></i>
                            <h3> عدد المدراء</h3>
                            <span><?php Calc('admin') ?></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mt-1">
                    <a href="members.php?do=ManageVendor">
                        <div class="stat  st-design">
                            <i class="fa fa-users Istyle"></i>
                            <h3> عدد التجار
                            </h3> <span><?php Calc('vendor') ?></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3  mt-1">
                    <a href="members.php?do=ManageClient">
                        <div class="stat  st-design">
                            <i class="fa fa-users Istyle"></i>
                            <h3> عدد الزبائن</h3>
                            <span><?php Calc('client') ?></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3  mt-1">
                    <a href="members.php?do=ManageActivate">
                        <div class="stat st-design">
                            <i class="fa fa-user-plus Istyle"></i>
                            <h3> التجار الغير مفعلين</h3>
                            <span><?php CalcPending(); ?></span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row mt-3">


                <div class="col-md-12">
                    <a href="members.php?do=CountProduct">
                        <div class="stat st-design">
                            <i class="fa fa-tag Istyle"></i>
                            <h3> عدد المنتجات</h3>
                            <span><?php Calc('product') ?></span>
                        </div>
                    </a>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="members.php?do=countcomment">
                            <div class="stat st-design">
                                <i class="fas fa-user-tie Istyle"></i>
                                <h3>عرض تفاعل </h3>
                                <p class="fs-1">
                                    التجار
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="members.php?do=countclient">
                            <div class="stat st-design">
                                <i class="fas fa-user Istyle"></i>
                                <h3>عرض تفاعل </h3>
                                <p class="fs-1">
                                    الزبائن
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="">
                        <div class="card-header ">
                            <i class="fa fa-users"></i>
                            آخر 5 زبائن مسجلين
                            <span class="toggle-info pull-right">
                                <a href="members.php?do=AddClient" class="plus"><i class="fa fa-plus fa-lg"></i></a>
                            </span>
                        </div>
                        <div class="card p-2 cardSelf">
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table table-sm TableSelf table-bordered table-hover">
                                        <thead>
                                            <th>ألاسم</th>
                                            <th>تاريخ التسجيل</th>
                                        </thead>
                                        <?php
                                        $show_client = "SELECT * FROM client  where id >0 ORDER BY id DESC LIMIT 5 ";
                                        $res = mysqli_query($conn, $show_client);
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>$row[1]</td>";
                                            echo "<td>$row[5]</td>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="">
                        <div class="card-header">
                            <i class="fa fa-users"></i>
                            آخر 5 تجار مسجلين
                            <span class="toggle-info pull-right ">
                                <a href="members.php?do=AddVendor" class="plus"><i class="fa fa-plus fa-lg"></i></a>
                            </span>
                        </div>
                        <div class="card p-2 cardSelf">
                            <div class="table-responsive">
                                <table class="table table-sm TableSelf table-bordered table-hover">
                                    <thead>
                                        <th>ألاسم</th>
                                        <th>تاريخ التسجيل</th>
                                    </thead>
                                    <?php
                                    $show_vendor = "SELECT * FROM vendor  where id >0 ORDER BY id DESC LIMIT 5 ";
                                    $res = mysqli_query($conn, $show_vendor);
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[7]</td>";
                                        echo "</tr>";
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include $tpl . "footer.php";
    checkLastSeen(3, 'client');
    checkLastSeen(3, 'vendor');

} else {
    header("location:index.php");
    exit();
}

ob_end_flush();
