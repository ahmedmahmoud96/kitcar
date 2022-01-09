    <?php
    session_name('siteLogin');
    session_start();
    $NoNavbar = "";
    $pageTitle = "KitCar";
    include 'init.php';
    $do = isset($_GET['do']) ? $_GET['do'] : 'signin';
    $NoNavbar;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['login-form'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $shapassword = sha1($password);


            $check_vendor = "SELECT * FROM vendor where email = '$email' and password= '$shapassword'";
            $check_client = "SELECT * FROM client where email = '$email' and password= '$shapassword'";
            $check_admin = "SELECT * FROM admin where email = '$email' and password=' $shapassword'";

            $res_admin = mysqli_query($conn, $check_admin);
            $res_vendor = mysqli_query($conn, $check_vendor);
            $res_client = mysqli_query($conn, $check_client);

            if (mysqli_num_rows($res_admin)) {
                error("يرجى الدخول من بوابة الادمن");
            }

            if (mysqli_num_rows($res_client)) {
                $row = mysqli_fetch_array($res_client);
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['Date'] = $row['Date'];
                $st = "UPDATE client SET lastSeen=now() where id=$row[id]";
                mysqli_query($conn, $st);
                header("location:members.php");
            }

            if (mysqli_num_rows($res_vendor)) {
                $row = mysqli_fetch_array($res_vendor);
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['Date'] = $row['Date'];
                $_SESSION['RegStatus'] = $row['RegStatus'];

                if ($row['RegStatus'] == 0) {
                    error("لم يتم قبول عضويتك بعد . .");
                } else {
                    header("location:members.php");
                }
                $st = "UPDATE vendor SET lastSeen=now() where id=$row[id]";
                mysqli_query($conn, $st);
            }

            if (mysqli_num_rows($res_vendor) <= 0 && mysqli_num_rows($res_client) <= 0 && mysqli_num_rows($res_admin) <= 0) {
                error(" نأسف لم يتم العثور على هذا الحساب يرجى التسجيل حتى تتمكن من الدخول . . ");
            }
        }

        if (isset($_POST['client-submit'])) {
            $_SESSION['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $name = $_SESSION['name'];
            $_SESSION['user_email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = $_SESSION['user_email'];
            $_SESSION['password'] = $_POST['password'];
            $password = $_SESSION['password'];
            $shapassword = sha1($password);
            $gender = $_POST['gender'];
            CheckUser($email);
            $insert_client = "INSERT INTO client (	name,email,	password,gender,Date,lastSeen) VALUES ('$name','$email','$shapassword','$gender',now(),now())";
            $result = mysqli_query($conn, $insert_client);
            echo "<div class='text-center mt-5 alert alert-success error'> تم اضافة البيانات بنجاح قم بتسجيل الدخول </div>";
            @header("refresh:3;url=index.php?do=login");
        }

        if (isset($_POST['vendor-submit'])) {
            $_SESSION['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $name = $_SESSION['name'];
            $_SESSION['user_email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $email = $_SESSION['user_email'];
            $_SESSION['password'] = $_POST['password'];
            $password = $_SESSION['password'];
            $shapassword = sha1($password);
            $_SESSION['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
            $phone = $_SESSION['phone'];
            $_SESSION['address'] = $_POST['address'];
            $address = $_SESSION['address'];
            $license = $_FILES["license"]["name"];
            $Newname = rand(0, 1000000) . '_' . $license;
            CheckUser($email);
            $stm = "SELECT MAX(id) FROM vendor";
            $resS = mysqli_query($conn, $stm);
            $row = mysqli_fetch_array($resS);
            $LAST = $row['MAX(id)'];
            @$Extension = array("jpeg", "jpg", "png", "gif", "pdf");
            @$x = strtolower(end(explode('.', $license)));
            if ($_FILES["license"]["size"] <= 2097152) {
                if (in_array($x, $Extension)) {
                    $insert_vendor = "INSERT INTO vendor (name , email , password , phone , address,Date,lastSeen) VALUES ('$name','$email','$shapassword','$phone','$address',now(),now())";
                    $insert_license = "INSERT INTO license (license_file ,id_vendor) VALUES ('$Newname',($LAST+1))";
                    $destination = "admin/license/" . $Newname;
                    @move_uploaded_file($_FILES["license"]["tmp_name"], $destination);
                    $result = mysqli_query($conn, $insert_vendor);
                    mysqli_query($conn, $insert_license);
                    echo "<div class='text-center mt-5 alert alert-success error'> تم اضافة البيانات بنجاح يرجى الأنتظار حتى يتم تفعيل عضويتك</div>";
                } else {
                    error("يجب أن يكون ألملف pdf  او صورة");
                }
            } else {
                error("حجم الملف كبير جداً . .");
            }
        } else {
        }
    }

    ?>
    <div class="home">
        <nav class="navbar navbar-expand-lg navbar-light nav-home ">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h4 class="text-center logoNav hvr-buzz-out ">Kit<i class="fas fa-car-crash"></i>Car</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="?do=login">
                                <h4 class="text-light">تسجيل الدخول <i class="fas fa-sign-in-alt"></i></h4>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="opacity">
            <div class="container">
                <!-- Start Login Form -->
                <?php
                if ($do == 'login') { ?>
                    <div class="login-box log-wid">
                        <h2>تسجيل الدخول</h2>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                            <div class="user-box">
                                <input type="email" name="email" autocomplete="off" required>
                                <label>ألبريد الالكتروني</label>
                            </div>
                            <div class="user-box">
                                <input type="password" name="password" autocomplete="off" required>
                                <label>الرقم السري</label>
                            </div>

                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" value="تسجيل الدخول " name="login-form" class="BT btn-lg">
                            </a>
                        </form>
                    </div>
                <?php } elseif ($do == 'signin') { ?>
                    <!-- End Login Form -->

                    <!--Start Form Vendor -->
                    <div class="swithc d-grid gap-2">

                        <input id="Button1" type="button" value="إذا اردت التسجيل بصفة زبون أنقر هنا" onclick="switchVisible();" class="btn btn-dark btn-lg btn-sw box-chose" />

                    </div>

                    <div class="login-box" id="vendor">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <h2>التسجيل للتجار</h2>
                            <small class="des">يتيح لك التسجيل بصفة تاجر ان تقوم بنشر المنتجات على الموقع والتمتع بالعديد من الصلاحيات</small>
                            <div class="user-box">
                                <input type="text" name="name" required autocomplete="off" minlength="4">
                                <label>ألاسم</label>
                            </div>

                            <div class="user-box">
                                <input type="email" name="email" required autocomplete="off">
                                <label>البريد الالكتروني</label>
                            </div>

                            <div class="user-box">
                                <input type="password" name="password" required autocomplete="off" minlength="3">
                                <label>الرقم السري</label>
                            </div>

                            <div class="user-box">
                                <input type="tel" name="phone" required autocomplete="off" minlength="10" maxlength="10">
                                <label>رقم الهاتف</label>
                            </div>



                            <div class="user-box mt-3">
                                <label for="" class="lbl">السجل التجاري</label>
                                <input type="file" name="license" id="" required autocomplete="off" accept="image/*,.pdf">
                            </div>

                            <div class="user-box">
                                <select class="custom-select" name="address" required autocomplete="off">
                                    <option selected>المحافظة</option>
                                    <option value="Amman" checked>عمان</option>
                                    <option value="Zarqa">الزرقاء</option>
                                    <option value="Irbid">أربد</option>
                                    <option value="Aqaba">العقبة</option>
                                    <option value="Karak">الكرك</option>
                                    <option value="Ajloun">عجلون</option>
                                    <option value="Mafraq">المفرق</option>
                                    <option value="Tafilah">الطفيلة</option>
                                    <option value="Al-Balqa">البلقاء</option>
                                    <option value="Madaba">مأدبا</option>
                                    <option value="Maan">معان</option>
                                    <option value="Jerash">جرش</option>
                                </select>
                            </div>

                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" value="التسجيل" class="BT btn-lg" name="vendor-submit">
                            </a>
                        </form>
                    </div>

                    <!--End Form Vendor -->

                    <div class="login-box" id="client" style="display: none;">

                        <form method="POST" action="" enctype="multipart/form-data">
                            <h2>التسجيل للزبائن</h2>
                            <small class="des">يتيح لك التسجيل بصفة زبون أن تقوم بعمليات البحث عن المنتجات التي تبحث عنها وبضمان أفضل الأسعار</small>

                            <div class="user-box">
                                <input type="text" name="name" required="" autocomplete="off" minlength="4">
                                <label>ألاسم</label>
                            </div>

                            <div class="user-box">
                                <input type="email" name="email" required="" autocomplete="off">
                                <label>البريد الالكتروني</label>
                            </div>

                            <div class="user-box">
                                <input type="password" name="password" required="" autocomplete="off" minlength="3">
                                <label>الرقم السري</label>
                            </div>

                            <div class="user-box">
                                <div class="row">
                                    <div class="col-lg-3">
                                        الجنس :

                                    </div>
                                    <div class="col-lg-7">
                                        <input type="radio" name="gender" id="" class="wid-gend" value="Male" checked>ذكر
                                        <input type="radio" name="gender" id="" class="wid-gend" value="Female">انثى
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" value="التسجيل " class="BT btn-lg" name="client-submit">
                            </a>
                        </form>
                    </div>
                <?php } ?>

                <!--End Form Regester -->
            </div>
        </div>
    </div>


    <script src="<?php echo $js; ?>bootstrap.min.js"></script>
    <script src="<?php echo $js; ?>all.js"></script>
    <script src="<?php echo $js; ?>jq.js"></script>
    <script src="<?php echo $js; ?>main.js"></script>