<?php
session_name('siteLogin');
session_start();
$pageTitle = "KitCar";
if (isset($_SESSION['user_email'])) {
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'home';
    $st = "SELECT mange from admin";
    $res = mysqli_query($conn, $st);
    $row = mysqli_fetch_array($res);
    Delete_vendor($row['mange']);
    if ($do == 'home') { ?>
        <header>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="layout/images/sl1.jpg" class="d-block w-100" alt="" height=" 550px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>KitCar </h5>
                            <p>هي منظومة متكاملة فريدة من نوعها في الأردن ورائدة لمفاهيم بيع قطع السيارات من خلال ترسيخ معايير الجودة وتسهيل عملية الشراء </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="layout/images/sl2.jpg" class="d-block w-100" alt="..." height=" 550px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>KitCar</h5>
                            <p>نقدم مجموعة خدمات لتسهيل عملية البحث عن القطعة التي تبحث عنها </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="layout/images/1-l.jpg" class="d-block w-100" alt="..." height=" 550px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>KitCar</h5>
                            <p>إعرض منتجاتك مجانًا وتمتع بالعديد من الخدمات عند تسجيلك بصفة تاجر </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>
        <section class="section_members ">
            <div class="container mb-5">
                <div class="row ">
                    <?php
                    $st = "SELECT * FROM product ";
                    $res = mysqli_query($conn, $st);
                    while ($row = mysqli_fetch_array($res)) { ?>
                        <div class="col-lg-3">

                            <form action="?do=showInfo" method="POST">

                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                <div class="card item-box mt-3  ">
                                    <span class="price-tag"><?php echo $row['price']; ?> دينار </span>
                                    <?php
                                    if (!empty($row['image'])) { ?>
                                        <img src="image_product/<?php echo $row['image'] ?>" alt="" class="img-responsice effect " height="210px">
                                    <?php } else { ?>
                                        <img src="image_product/default.png" alt="" class="img-responsice effect" height="210px">
                                    <?php  }
                                    ?>
                                    <div class="caption">
                                        <h3><?php echo $row['name'] ?></h3>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['date'] ?></small></p>
                                    </div>

                                    <input type="submit" value="عرض التفاصيل" class="btn btn-outline-info btn-primary btn-lg text-white ">
                                </div>

                            </form>
                        </div>


                    <?php }
                    ?>
                </div>
            </div>
        </section>

        <section class="phot text-center">
            <div class="tem">
                <div class="container">
                    <h2 class="mb-5">فريق العمل</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <img class="rounded-circle" src="layout/images/user.png" alt="">
                            <h4>أحمد محمود</h4>
                            <p class="lead"><i class="far fa-sticky-note"></i> بكالوريوس نظم معلومات حاسوبية</p>
                            <p class="lead aabu"><i class="fas fa-university"></i> جامعة آل البيت</p>
                            <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram-square"></i>
                            <i class="fab fa-linkedin"></i>
                        </div>

                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <img class="rounded-circle" src="layout/images/user.png" alt="">
                            <h4>عبدالله النعاجي</h4>
                            <p class="lead"> <i class="far fa-sticky-note"></i> بكالوريوس نظم معلومات ادارية</p>
                            <p class="lead aabu"> <i class="fas fa-university"></i> جامعة آل البيت </p>
                            <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram-square"></i>
                            <i class="fab fa-linkedin"></i>
                        </div>

                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <img class="rounded-circle" src="layout/images/user.png" alt="">
                            <h4>عبد الفتاح الكيلاني</h4>
                            <p class="lead"> <i class="far fa-sticky-note"></i> بكالوريوس نظم معلومات ادارية</p>
                            <p class="lead aabu"><i class="fas fa-university"></i> جامعة آل البيت</p>

                            <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram-square"></i>
                            <i class="fab fa-linkedin"></i>
                        </div>



                    </div>
                </div>
            </div>
        </section>


        <section class="sub text-center">
            <div class="subsi">
                <div class="container">
                    <H2>إشترك معنا . . </H2>
                    <p class="lead">على الراغبين بالإشتراك في خدمة الإشعارات عن طريق الرسائل القصيرة على الهاتف المحمول </p>
                    <p class="lead"> في حال وجود عروض وخصومات يرجى دخال رقم الهاتف : </p>
                    <form>
                        <input type="text" class="form-control" placeholder="00962-000-0000-00">
                        <button class="btn btn-danger"><i class="fas fa-edit"></i> إشتراك </button>
                    </form>
                </div>
                <h3 class="soon">قريباً</h3>
            </div>
        </section>

        <section class="ban text-center">
            <div class="p4">
                <div class="container">
                    <h3>إحصائيات الموقع</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <i class="fas fa-users"></i>
                            <p>عدد الزبائن</p>
                            <div class="num"><?php Calc("client"); ?></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <i class="fas fa-user-tie"></i>
                            <p>عدد التجار</p>
                            <div class="num"><?php Calc("vendor"); ?></div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <i class="fas fa-shopping-cart"></i>
                            <p>عدد المنتجات</p>

                            <div class="num"><?php Calc("product"); ?></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



    <?php } elseif ($do == 'add') { ?>

        <div class="container mb-5 bak_chek ">
            <h1 class="text-center mt-3 Htitl"> اضافة منتج جديد</h1>
            <h6 class="titsec"> القطعة لأي قسم تتبع ؟ </h6>
            <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
                <div class="form-group form-group-lg col-md-6 a_h">
                    <?php
                    if (!(@$_GET['nextone'])) {
                        global $conn;
                        $st = "SELECT id , name from sections where parents=0 ";
                        $res = mysqli_query($conn, $st);
                        while ($row = mysqli_fetch_array($res)) {

                            echo
                            '<div class="sectionshow">
                        '
                                . '<label for=' . $row['name'] . '>
                        <h4> 
                        <a href="members.php?do=add&nextone=' . $row[0] . '" class="text-decoration-none text-white " id=' . $row['name'] . '">' . $row['name'] . '</a> </h4></label>  </div>';
                        }
                    }

                    if (@$_GET['nextone']) {
                        $ste = "SELECT id , name from sections where parents=0 and id=$_GET[nextone] ";
                        $resu = mysqli_query($conn, $ste);
                        $ror = mysqli_fetch_array($resu);
                        echo "<div class='section_dis mb-3'><h4>" . $ror['name'] . "</h4></div><br/>";
                    ?>
                        <label for="" class="titsec">لعرض كافة الأقسام الرئيسية</label>
                        <a href="members.php?do=add">أنقر هنا</a>
                        <div class="mt-3">
                            <?php
                            echo "<h6 class='titsec'> القطعة لأي قسم فرعي تتبع ؟ </h6>";
                            echo '  <input type="hidden" name="section" value=' . $_GET['nextone'] . '>';
                            $sts = "SELECT * FROM sections where parents=" . $_GET['nextone'];
                            $ress = mysqli_query($conn, $sts);
                            echo '   <div class="form-group form-group-lg">';
                            if (!empty(mysqli_num_rows($ress))) {
                                while ($rowsection = mysqli_fetch_array($ress)) {

                                    echo ' <div class="sectionshow"> <input type="radio" name="namesub" value=' . $rowsection['name'] . ' id=' . $rowsection['name'] . '> ' . '<label for=' . $rowsection['name'] . ' class="background"><h4 >' . $rowsection['name'] . '</h4></label></div>';
                                }
                            } ?>
                        </div>
                </div>

        </div>
        <div class="form-group form-group-lg">
            <h6 class='titsec'>الحالة </h6>
            <div class="sectionshow">
                <input type="radio" name="status" id="new" value="جديد" checked>
                <label for="new" class="background ">
                    <h4>جديد
                    </h4>
                </label>
            </div>
            <div class="sectionshow">
                <input type="radio" name="status" id="stats" value="مستعمل">
                <label for="stats" class="background ">
                    <h4>مستعمل
                    </h4>
                </label>
            </div>

        </div>
        <div class="form-group form-group-lg mt-4" style="width:50%;">
            <h6 class='titsec '> بلد الصنع </h6>
            <select name="made" id="" class="form-select form-control" size="3">
                <option value="الصين" selected>الصين</option>
                <option value="اليابان">اليابان</option>
                <option value="أمريكيا">أمريكيا</option>
                <option value="ألمانيا">ألمانيا</option>
                <option value="كوريا ">كوريا </option>
                <option value="الهند">الهند</option>
                <option value="البرازيل">البرازيل</option>
                <option value="تايلاند">تايلاند</option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
        <div class="form-group form-group-lg mt-2">
            <h6><label class="col-sm-2 control-label titsec"> أسم القطعة </label> </h6>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="name" class="form-control live-d" minlength="1" required />
            </div>
        </div>

        <div class="form-group form-group-lg mt-2">
            <h6><label class="col-sm-2 control-label titsec"> الوصف </label> </h6>
            <div class="col-sm-10 col-md-6">
                <input type="text" name="description" class="form-control live-d" minlength="1" required />
            </div>
        </div>

        <div class="form-group form-group-lg">
            <h6><label class="col-sm-2 control-label titsec">العدد المتوفر </label></h6>
            <div class="col-sm-10 col-md-6">
                <input type="number" name="num" class="form-control live-d" minlength="1" required />
            </div>
        </div>

        <div class="form-group form-group-lg">
            <h6><label class="col-sm-2 control-label titsec">السعر </label> </h6>
            <div class="col-sm-10 col-md-6">
                <input type="number" name="price" class="form-control live-p" required maxlength="5" required />
            </div>
        </div>

        <div class="form-group form-group-lg">
            <h6 class='titsec'>صورة المنتج </h6>

            <div class="col-sm-10 col-md-6">
                <input type="file" name="image" id="" class="form-control " required>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="حفظ" class="btn btn-primary btn-lg mt-3" />
            </div>
        </div>

    <?php }


    ?>
    </div>
    </form>

    </div>

<?php
    } elseif ($do == 'Insert') {
        global $conn;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            @$namesub = filter_var($_POST['namesub'], FILTER_SANITIZE_STRING);
            $section = $_POST['section'];
            $st = "SELECT id from sections where name='$namesub' AND parents='$section'";
            $rs = mysqli_query($conn, $st);
            while ($rowname = mysqli_fetch_array($rs)) {
                $sub = $rowname['id'];
            }
            global  $sub;
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $id   =    $_SESSION['id'];
            $des  = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $price = $_POST['price'];
            $num = $_POST['num'];
            $made = filter_var($_POST['made'], FILTER_SANITIZE_STRING);
            $status = $_POST['status'];
            $image = $_FILES["image"]["name"];
            $Newname = rand(0, 1000000) . '_' . $image;
            $destination = "image_product/" . $Newname;
            @move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
            if (isset($_POST['namesub'])) {
                $insert_product = "INSERT INTO product (name , description ,num, price ,date, country_made , image ,status,vendor_id ,section_id ,subsection_id ) VALUES ('$name','$des','$num','$price',now(),'$made','$Newname','$status','$id','$section','$sub')";
                $result = mysqli_query($conn, $insert_product);
                $up = "UPDATE vendor set countproduct=countproduct+1 where id=$id";
                $towresult = mysqli_query($conn, $up);
                echo "<div class='text-center mt-5 alert alert-success '> تم اضافة البيانات بنجاح . .</div>";
            } else {
                error("لم يتم تحديد القسم الفرعي . . !");
            }
        } else {
            echo  error("ERROR 404");
            @header("refresh:5;url=members.php");
        }
    } elseif ($do == 'ManagePRO') {  ?>
    <h1 class="text-center mt-3 Htitl">المنتجات</h1>
    <div class="container">
        <a href="members.php?do=add" class="btn btn-primary mb-4">
            <i class="fa fa-plus"></i> اضافة منتج </a>
        <div class="row">
            <?php
            $id = $_SESSION['id'];
            $show = "SELECT product.* ,sections.* FROM product INNER join sections ON product.section_id=sections.id where product.vendor_id=$id";
            $res = mysqli_query($conn, $show); ?>

            <div class="container">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-mange">
                        <thead class="table-dark">
                            <td>ID</td>
                            <td>أسم القطعة</td>
                            <td>عدد مرات الشراء</td>
                            <td>عدد القطع المتبقية</td>
                            <td>السعر</td>
                            <td>متوسط التقييم</td>
                            <td>تاريخ النشر </td>
                            <td>الأجراء</td>
                        </thead>
                        <?php @$count = 0;
                        while ($row = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><?php echo $count = $count + 1 ?></td>
                                <td><?php echo $row[1];  ?></td>
                                <td><?php echo $row['countsell']; ?></td>
                                <td><?php if ($row[3] == 0) {
                                        echo "تم نفاذ الكمية";
                                    } else {
                                        echo $row[3];
                                    } ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php
                                    $stt = "SELECT avg(rating) from evaluation where product_id=$row[0]";
                                    $r = mysqli_query($conn, $stt);
                                    $r = mysqli_fetch_array($r);
                                    if (@$r[0] <= 0) {
                                        echo "لم يتم تقييم هذا المنتج";
                                    } else {
                                        echo $r[0];
                                    }
                                    ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>
                                    <?php
                                    echo "  <a href='members.php?do=EditProduct&id=" . $row[0] . "' class='btn btn-success'><i class='fa fa-edit'></i> تعديل</a>
<a href='members.php?do=Delete&id=" . $row[0] . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> حذف </a>";
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } elseif ($do == 'Delete') { //Delete
        $id = $_GET['id'];
        delete("product", $id);
    } elseif ($do == 'EditProduct') {

        // Check If Get Request ID Is Numeric & Get Its Integer Value

        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        // Select All Data Depend On This ID

        $check = "SELECT * FROM product where id=$id";
        $res = mysqli_query($conn, $check);
        $row = mysqli_fetch_array($res);

        if ($row > 0) {  ?>
        <h1 class="text-center mt-3 Htitl"> تعديل المنتج</h1>
        <div class="container">
            <form class="form-horizontal" action="?do=UpdateProduct" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <!-- Start product name Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">أسم القطعة</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $row['name'] ?>" />
                    </div>
                </div>

                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">الوصف</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="description" class="form-control" autocomplete="off" value="<?php echo $row['description'] ?>" />
                    </div>
                </div>

                <!-- End product name Field -->
                <!-- Start description Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">العدد المتوفر </label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="num" class="form-control" value="<?php echo $row['num'] ?>" />
                    </div>
                </div>
                <!-- End description Field -->
                <!-- Start price Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">السعر </label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>" />
                    </div>
                </div>
                <!-- End price Field -->
                <!-- Start country_made Field -->

                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">بلد الصنع</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="made" class="form-control" value="<?php echo $row['country_made'] ?>" />
                    </div>
                </div>

                <!-- End country_made Field -->

                <!-- Start status Field -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">الحالة</label>
                    <div class="col-sm-10 col-md-6">
                        <div class="form-control">
                            <input type="radio" name="status" id="status-n" value="جديد" <?php if ($row['status'] == 'جديد') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            <label for="status-n">جديد</label>
                        </div>
                        <div class="form-control">
                            <input type="radio" name="status" id="status-o" value="مستعمل" <?php if ($row['status'] == 'مستعمل') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            <label for="status-o">مستعمل</label>
                        </div>
                    </div>
                </div>
                <!-- End status Field -->


                <div class="form-group form-group-lg col-md-6">
                    <label for="" class="ml-2">القسم :</label>
                    <select name="section" id="" class="form-select">
                        <?php
                        global $conn;
                        $st = "SELECT id , name from sections";
                        $res = mysqli_query($conn, $st);
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<option value=' $row[0]' > $row[1] </option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Start image Field -->
                <!-- <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">صورة المنتج</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="file" name="image" id="" class="form-control  ">
                        </div>
                    </div> -->
                <!-- End image Field -->

                <!-- Start Submit Field -->
                <div class="form-group form-group-lg">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="حفظ" class="btn btn-primary btn-lg mt-3" />
                    </div>
                </div>
                <!-- End Submit Field -->
            </form>
        </div>

    <?php
            // If There's No Such ID Show Error Message

        } else {
            echo "<div class='alert-danger> ERROR 404 </div>";
        }
    } elseif ($do == 'UpdateProduct') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<div class='container'>";
            // Get Variables From The Form

            @$id = $_POST['id'];
            @$name = $_POST['name'];
            @$des = $_POST['description'];
            @$num = $_POST['num'];
            @$price = $_POST['price'];
            @$made = $_POST['made'];
            @$status = $_POST['status'];
            // $image = $_FILES["image"]["name"];
            $section = $_POST['section'];
            // $destination = "image_product/" . basename($_FILES["image"]["name"]);
            // @move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
            $update_product = "UPDATE product set name = '$name',  description ='$des' , num='$num', price = '$price', date =now() , country_made = '$made',status= '$status', section_id = '$section' WHERE id='$id'";
            $sts = "UPDATE evaluation set rating = 5 where product_id = '$id'";
            $result = mysqli_query($conn, $update_product);
            $res = mysqli_query($conn, $sts);

            echo "<div class='text-center mt-5 alert alert-success'> تم تحديث معلومات المنتج  بنجاح . .</div>";
        } else {
            echo "<div class='alert-danger'> ERROR 404 </div>";
            @header("refresh:5;url=dashboard.php");
        }
        echo "</div>";
    } elseif ($do == 'showInfo') {
        $_SESSION['idp'] = $_POST['id'];
        $id = $_SESSION['idp'];
        $st = "SELECT product.* ,vendor.phone ,vendor.id , vendor.address  ,vendor.name AS name_vendor FROM  product INNER JOIN vendor ON product.vendor_id = vendor.id where product.id='$id'";
        $res = mysqli_query($conn, $st);
        $row = mysqli_fetch_array($res) ?>

    <div class="container mt-5">
        <div class="row">
          <?php if ($row['num'] >0){ ?>
              
            <div class="col-lg-6 item-info">
                <ul class="list-unstyled">
                    <li><i class="fas fa-car fa-fw"></i><span>أسم القطعة </span> : <?php echo $row['name']; ?></li>
                    <li><i class="fas fa-info-circle fa-fw"></i><span>الوصف</span> : <?php echo $row['description']; ?></li>
                    <li><i class="fas fa-info-circle fa-fw"></i><span>العدد المتوفر</span> : <?php echo $row['num']; ?></li>
                    <li><i class="fa fa-building fa-fw"></i><span>بلد الصنع </span> : <?php echo $row['country_made']; ?></li>
                    <li><i class="fas fa-question fa-fw"></i><span>الحالة </span> : <?php echo $row['status']; ?></li>
                    <li><i class="fa fa-money fa-fw"></i><span>السعر </span> : <?php echo $row['price']; ?> دينار </li>
                    <li><i class="fa fa-user fa-fw"></i><span>أسم التاجر </span> : <?php echo $row['name_vendor']; ?></li>
                    <li><i class="fas fa-map-marker-alt fa-fw"></i><span>الموقع </span> : <?php echo $row['address']; ?></li>
                    <li><i class="fas fa-phone-square fa-fw"></i><span>رقم الهاتف </span> : 0<?php echo $row['phone']; ?></li>
                    <li><i class="fas fa-shopping-cart fa-fw"></i><span> عدد مرات الشراء </span> : <?php echo $row['countsell']; ?></li>
                    <li><i class="fa fa-calendar fa-fw"></i><span>تاريخ النشر </span> : <?php echo $row['date'] ?></li>
                    <li><i class="fas fa-star"></i><span> متوسط التقييم </span> : <?php
                                                                                    $stt = "SELECT avg(rating) from evaluation where product_id=$row[0]";
                                                                                    $r = mysqli_query($conn, $stt);
                                                                                    $r = mysqli_fetch_array($r);
                                                                                    if (@$r[0] <= 0) {
                                                                                        echo "لم يتم تقييم هذا المنتج";
                                                                                    } else {
                                                                                        echo $r[0];
                                                                                    }
                                                                                    ?></li>
                    <?php
                    @$email_ch = $_SESSION['user_email'];
                    @$cheksell = "SELECT email from client where email='$email_ch'";
                    $resultclient = mysqli_query($conn, $cheksell);
                    if (mysqli_num_rows($resultclient) > 0) {
                    ?>
                        <form action="members.php?do=sendsell" method="post" class="mt-3">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for=""> إذا كنت ترغب في عملية الشراء قم بإدخال رقم هاتفك </label>
                            <input class=" mt-1" type="number" name="accphone" required>
                            <input class="btn btn-success mt-1" type="submit" value="إضغظ هنا">
                        </form>
                    <?php }    ?>

                </ul>

            </div>

            <div class="col-lg-6">
                <div class="card">
                    <?php
                    if (!empty($row['image'])) { ?>
                        <img src="image_product/<?php echo $row['image'] ?>" alt="" class="card-img-bottom" height="400px">
                    <?php } else { ?>
                        <img src="image_product/default.png" alt="" class="card-img-bottom" width="400px" height="400px">
                    <?php  }
                    ?>
                </div>
            </div>
        </div>
              
              
              
        



        <?php if (isset($_SESSION['user_email'])) {

            @$email_ch = $_SESSION['user_email'];
            @$cheksell = "SELECT email from client where email='$email_ch' and accept>0";
            $resultclient = mysqli_query($conn, $cheksell);
            if (mysqli_num_rows($resultclient) > 0) {
        ?>
                <div class="rat">
                    <form action="?do=rating" method="post">
                        <div class="rating"> <input type="submit" name="rating" value="5" id="5"><label for="5">☆</label> <input type="submit" name="rating" value="4" id="4"><label for="4">☆</label> <input type="submit" name="rating" value="3" id="3"><label for="3">☆</label> <input type="submit" name="rating" value="2" id="2"><label for="2">☆</label> <input type="submit" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                    </form>
                </div>
            <?php }    ?>





            <div class="add-comment">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <h3>أضف تعليق</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF'] . '?do=comment' ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment" required></textarea>
                                <input class="btn btn-primary mt-1" type="submit" value="تعليق">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <hr class="custom-hr">
        <?php
        $product = $_SESSION['idp'];
        $st = "SELECT client.* ,evaluation.* FROM client INNER JOIN evaluation on client.id = evaluation.client_id WHERE client.id>0 AND evaluation.product_id =$product";
        $res = mysqli_query($conn, $st); ?>
        <div class="comment-box">
            <div class="row">
                <div class="col-md-3">
                    <h5>الأشخاص</h5>
                </div>
                <div class="col-md-9">
                    <h5>التعليقات</h5>
                </div>
                <hr class="custom-hr">
                <?php while ($row = mysqli_fetch_array($res)) { ?>

                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="img.png" alt="user" class="img-responsice img-user">
                            <div class=""><?php echo '<i class="fas fa-user"></i>' . $row['name']; ?></div>
                        </div>
                        <div class="col-md-9">
                            <p class="lead"><?php echo $row['comment']; ?></p>
                        </div>
                    </div>

                    <hr class="custom-hr"> <?php  }
                                        $stt = "SELECT vendor.* ,commentvendor.* FROM vendor INNER JOIN commentvendor on vendor.id = commentvendor.id_vendor WHERE vendor.id AND commentvendor.id_product =$product";
                                        $ress = mysqli_query($conn, $stt); ?>
                <?php while ($row = mysqli_fetch_array($ress)) { ?>
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="img.png" alt="user" class="img-responsice img-user">

                            <div class=""> <?php echo '<i class="fas fa-check-circle" style="color:#2098d1;"></i>' . $row['name']; ?></div>
                        </div>
                        <div class="col-md-9">
                            <p class="lead"><?php echo $row['comment']; ?></p>
                        </div>
                    </div>
                    <hr class="custom-hr"> <?php  }
                                            ?>
            </div>
        </div>
    </div>

    <?php } else
          {error("لم يعد هذا المنتج متوفراً ");}
          ?>
    <?php } elseif ($do == 'comment') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_email'])) {
                @$id_User = $_SESSION['id'];
                @$product = $_SESSION['idp'];
                @$email = $_SESSION['user_email'];
                @$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                @$check_vendor = "SELECT email,password FROM vendor where email = '$email' ";
                @$check_client = "SELECT email,password FROM client where email = '$email' ";
                @$res_client = mysqli_query($conn, $check_client);
                if (mysqli_num_rows($res_client)) {
                    global $conn;
                    @$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                    $insert = "INSERT INTO evaluation (comment ,date,product_id,client_id	) VALUES ('$comment',now(),'$product','$id_User')";
                    $update_co_cli = "UPDATE client SET  countcomment=countcomment+1 WHERE id=$id_User ";
                    $res = mysqli_query($conn, $update_co_cli);
                    mysqli_query($conn, $insert); ?>
                <div class="alert alert-primary mt-5" role="alert">
                    نشكرك على إضافة التعليقات والتفاعل معنا . .
                </div>
            <?PHP
                    @header("Refresh:3; url=members.php");
                }
                $res_vendor = mysqli_query($conn, $check_vendor);
                if (mysqli_num_rows($res_vendor)) {
                    global $conn;
                    @$comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
                    $insert = "INSERT INTO commentvendor (comment ,date,id_product,id_vendor	) VALUES ('$comment',now(),'$product','$id_User')";
                    mysqli_query($conn, $insert);
                    $update_co_ven = "UPDATE vendor SET  countcomment=countcomment+1 WHERE id=$id_User ";
                    $res = mysqli_query($conn, $update_co_ven);
            ?>
                <div class="alert alert-primary mt-5" role="alert">
                    نشكرك على إضافة التعليقات والتفاعل معنا . .
                </div>
    <?PHP
                    @header("Refresh:3; url=members.php");
                }
            }
        } else {
        }
    } elseif ($do == 'rating') {
        global $conn;
        @$id_User = $_SESSION['id'];
        @$product = $_SESSION['idp'];
        @$rating = $_POST['rating'];
        $insert = "INSERT INTO evaluation (comment,date,product_id,client_id,rating	) VALUES ('تم تقييم المتنج',now(),'$product','$id_User','$rating')";
        mysqli_query($conn, $insert);


        $cli = "UPDATE client SET   accept=0  WHERE id=$id_User ";
        mysqli_query($conn, $cli);

    ?>
    <div class="alert alert-primary mt-5" role="alert">
        نشكرك على إضافة التقييمات والتفاعل معنا . .
    </div>
<?php } elseif ($do == 'pad') {
        echo '  <h1 class="text-center mt-3 Htitl"> المنتجات ذات التقييم السيء</h1>';


        $id = $_SESSION['propad'];
        $st = "SELECT product.* ,vendor.phone ,vendor.id , vendor.address ,vendor.name AS name_vendor FROM  product INNER JOIN vendor ON product.vendor_id = vendor.id where product.id='$id'";
        $res = mysqli_query($conn, $st);
        $row = mysqli_fetch_array($res);
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 item-info">
                <ul class="list-unstyled">
                    <li><i class="fas fa-car fa-fw"></i><span>أسم القطعة </span> : <?php echo $row['name']; ?></li>
                    <li><i class="fas fa-info-circle fa-fw"></i><span>الوصف </span> : <?php echo $row['description']; ?></li>
                    <li><i class="fas fa-info-circle fa-fw"></i><span>العدد المتوفر </span> : <?php echo $row['num']; ?></li>
                    <li><i class="fa fa-building fa-fw"></i><span>بلد الصنع </span> : <?php echo $row['country_made']; ?></li>
                    <li><i class="fas fa-question fa-fw"></i><span>الحالة </span> : <?php echo $row['status']; ?></li>
                    <li><i class="fa fa-money fa-fw"></i><span>السعر </span> : <?php echo $row['price']; ?> دينار </li>
                    <li><i class="fa fa-user fa-fw"></i><span>أسم التاجر </span> : <?php echo $row['name_vendor']; ?></li>
                    <li><i class="fas fa-map-marker-alt fa-fw"></i><span>الموقع </span> : <?php echo $row['address']; ?></li>
                    <li><i class="fas fa-phone-square fa-fw"></i><span>رقم الهاتف </span> : <?php echo $row['phone']; ?></li>
                    <li><i class="fa fa-calendar fa-fw"></i><span>تاريخ النشر </span> : <?php echo $row['date'] ?></li>
                    <li><i class="fas fa-tools fa-fw"></i><span>الأجراء </span> : <?php

                                                                                    echo "  <a href='members.php?do=EditProduct&id=" . $id . "' class='btn btn-success'><i class='fa fa-edit'></i> تعديل</a>
<a href='members.php?do=Delete&id=" . $id . "' class='btn btn-danger confirm'><i class='fa fa-close'></i> حذف </a>";
                                                                                    ?></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <?php
                    if (!empty($row['image'])) { ?>
                        <img src="image_product/<?php echo $row['image'] ?>" alt="" class="card-img-bottom" height="400px">
                    <?php } else { ?>
                        <img src="image_product/default.png" alt="" class="card-img-bottom" width="400px" height="400px">
                    <?php  }
                    ?>
                </div>
            </div>

        </div>


        <?php  } elseif ($do == 'sendsell') {
        if (isset($_POST['accphone']) || isset($_POST['num'])) {
            $_SESSION['id_product_sms'] = $_POST['id'];
            @$tel = filter_var($_POST['accphone'], FILTER_SANITIZE_STRING);
            $stt = "UPDATE client set phone_client=$tel where id=$_SESSION[id]";
            mysqli_query($conn, $stt);
        ?>
            <div class="container sendsms">
                <div class="account">
                    <div class="cards">
                        <div class="card-header">
                            <p class="text-center font-08-rem mt-13 sms">تم إرسال رسالة إلى هاتفك تحتوي على رمز تحقق قم بإدخال الرمز</p>
                            <p class="text-center font-08-rem mt-13 sms">رقم الهاتف : <?php echo  @$tel = filter_var($_POST['accphone'], FILTER_SANITIZE_STRING); ?> </p>
                        </div>
                        <form action="?do=smsCode" method="POST">
                            <div class="card-body">
                                <div class="row flex-center">
                                    <div class="col">
                                        <input class="activation-code-input w-100 " placeholder="الرمز" name="num" type="number" required minlength="6" maxlength="6">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-info w-100" value="إرسال">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<?php }
    } elseif ($do == 'mangesell') { ?>

<div class="container ">
    <div class="row">
        <h1 class="text-center mt-3 mb-5 Htitl">مشتريات الزبائن</h1>
        <div class="container">
            <div class="row">
                <?php
                $id = $_SESSION['id'];
                $show = "SELECT * from sells where id_vendor=$id";
                $res = mysqli_query($conn, $show); ?>
                <div class="container">
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-mange">
                            <thead class="table-dark">
                                <td>ID</td>
                                <td>أسم الزبون</td>
                                <td>أسم القطعة</td>
                                <td>التقييم</td>
                                <td>تاريخ الشراء </td>
                                <td>عرض معلومات الزبون</td>
                            </thead>
                            <?php @$count = 0;
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td><?php echo $count = $count + 1 ?></td>
                                    <td><?php
                                        $st = "SELECT id,name from client where id=$row[1]";
                                        $ress = mysqli_query($conn, $st);
                                        $roww = mysqli_fetch_array($ress);
                                        echo $roww['name'];
                                        ?></td>
                                    <td><?php
                                        $ste = "SELECT name from product where id=$row[2]";
                                        $ress = mysqli_query($conn, $ste);
                                        $ro = mysqli_fetch_array($ress);
                                        if ($ro > 0) {
                                            echo $ro['name'];
                                        } else {
                                            echo "هذا المنتج لم يعد متوفراً . .";
                                        }
                                        ?></td>
                                    <td><?php
                                        $stt = "SELECT rating from evaluation where product_id=$row[2]";
                                        $r = mysqli_query($conn, $stt);
                                        $r = mysqli_fetch_array($r);
                                        if (@$r[0] <= 0) {
                                            echo "لم يتم تقييم هذا المنتج";
                                        } else {
                                            echo $r[0];
                                        }
                                        ?></td>
                                    <td><?php echo $row['date'] ?></td>

                                    <td>
                                        <?php
                                        echo "  <a href='members.php?do=ShowClient&id=" . $roww[0] . "' class='btn btn-success'> عرض </a>";
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div <?php } elseif ($do == 'ShowClient') {

        if ($_GET['id']) {
            $st_cli = "SELECT * from client where id=$_GET[id]";
            $resultt = mysqli_query($conn, $st_cli);
            $row = mysqli_fetch_array($resultt);
        ?> <div class="container mt-5">
<div class="row">
    <div class="col-lg-6 item-info">
        <ul class="list-unstyled">
            <li><span><i class="fas fa-user"></i> الأسم </span> : <?php echo $row['name']; ?></li>
            <li><span><i class="fas fa-venus-mars"></i> الجنس </span> : <?php echo $row['gender']; ?></li>
            <li><span><i class="fas fa-mobile-alt"></i> رقم الهاتف </span> : <?php echo $row['phone_client']; ?></li>
            <li><span><i class="fas fa-shopping-cart"></i>عدد المشتريات</span> : <?php echo $row['countsell']; ?></li>
        </ul>
    </div>


</div>
</div>
<?php }
    } elseif ($do == 'smsCode') {
        if (isset($_POST['num'])) {
            $tel = $_POST['num'];
            if ($tel == "123456") {
                global $conn;
                $id_User = $_SESSION['id'];
                $sms = $_POST['num'];
                $idProduce = $_SESSION['id_product_sms'];
                $sel = "SELECT vendor_id from product where id=$idProduce";
                $resul = mysqli_query($conn, $sel);
                $row = mysqli_fetch_array($resul);
                $vendor_id = $row['vendor_id'];

                $Ub = "UPDATE vendor SET  countsell=countsell+1 WHERE id=$vendor_id ";
                $result = mysqli_query($conn, $Ub);

                $sel = "INSERT INTO sells (id_client,id_product	,id_vendor,date) values ('$id_User','$idProduce','$vendor_id',now())";
                $resu = mysqli_query($conn, $sel);

                $u = "UPDATE product SET  sell=1 , num=num-1 , countsell=countsell+1 , sellclient=$id_User WHERE id=$idProduce ";
                $ress = mysqli_query($conn, $u);

                $cli = "UPDATE client SET   countsell=countsell+1 ,accept=1  WHERE id=$id_User ";
                mysqli_query($conn, $cli);


?> <div class="container mt-5 sell">
        <div class="alert alert-primary" role="alert">
            تم تأكيد الرمز , يرجى التواصل مع التاجر . .
        </div>
    </div>
<?php
            } else {
                error("عذراً الرمز خاطئ يرجى إعادة المحاولة");
            }
        } else {
            @header("location:?do=home");
        }
    }



    include $tpl . "footer.php";
} else {
    echo "ممنوع";
    header("location:index.php");
}
?>