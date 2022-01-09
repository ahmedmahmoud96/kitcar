<?php
session_name('siteLogin');
session_start();
$pageTitle = "Profile";
include 'init.php';
// Check If Get Request ID Is Numeric & Get Its Integer Value
if ($_SESSION['user_email']) {


    $userid = $_SESSION['id'];
    $email = $_SESSION['user_email'];
    $do = isset($_GET['do']) ? $_GET['do'] : 'home';
    // Select All Data Depend On This ID

    // Start Check Vendor
    $Vendor = "SELECT * FROM vendor where id='$userid 'and email='$email'";
    $res_Vendor = mysqli_query($conn, $Vendor);
    $row_Vendor = mysqli_fetch_array($res);

    if ($row_Vendor > 0) {

        $check = "SELECT * FROM vendor where id='$userid'";
        $res = mysqli_query($conn, $check);
        $row = mysqli_fetch_array($res);

        if ($row > 0) {  ?>
            <h1 class="text-center mt-3 Htitl"> ألملف الشخصي</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="hidden" name="id" value="<?php echo $userid ?>" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">الأسم</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="newname" class="form-control" value="<?php echo  $row['name'] ?>" autocomplete="off" required minlength="4" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">الرقم السري </label>

                        <div class="col-sm-10 col-md-6">
                            <input type="hidden" name="oldpassword" value="<?php echo $row['password']  ?>" />
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="اتركه فارغًا إذا كنت لا تريد التغيير" />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">ألبريد الألكتروني</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="email" name="newemail" value="<?php echo $row['email'] ?>" class="form-control" />
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Phone Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label"> رقم الهاتف</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="tel" name="newphone" value="<?php echo $row['phone'] ?>" class="form-control" minlength="10" maxlength="10" />
                        </div>
                    </div>
                    <!-- End Email Field -->

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
            if ($do == 'Update') {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo "<div class='container'>";
                    // Get Variables From The Form

                    $id     = $_POST['id'];
                    $name   =  filter_var($_POST['newname'], FILTER_SANITIZE_STRING);
                    $email  =  filter_var($_POST['newemail'], FILTER_SANITIZE_EMAIL);
                    $phone  = filter_var($_POST['newphone'], FILTER_SANITIZE_NUMBER_INT);

                    $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : $_POST['newpassword'];
                    CheckEdit($id, $email);


                    $update = "UPDATE vendor SET name='$name' , email='$email' , password='$pass' , phone = $phone WHERE id='$id'";
                    $res = mysqli_query($conn, $update);
                    echo "<div class='text-center mt-5 alert alert-success'> تم تحديث البيانات بنجاح . .</div>";
                } else {
                    echo "<div class='alert-danger'> ERROR 404 </div>";
                    @header("refresh:5;url=dashboard.php");
                }
                echo "</div>";
            }


            // End Check Vendor



        }
    }



    // Start Check client
    $client = "SELECT * FROM client where id='$userid 'and email='$email'";
    $res_client = mysqli_query($conn, $client);
    $row_client = mysqli_fetch_array($res_client);

    if ($row_client > 0) {
        $check = "SELECT * FROM client where id='$userid'";
        $res = mysqli_query($conn, $check);
        $row = mysqli_fetch_array($res);

        if ($row > 0) {  ?>
            <h1 class="text-center mt-3 Htitl"> ألملف الشخصي</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=UpdateClient" method="POST">
                    <input type="hidden" name="id" value="<?php echo $userid ?>" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">الأسم</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="newname" class="form-control" value="<?php echo  $row['name'] ?>" autocomplete="off" required minlength="4" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">الرقم السري </label>

                        <div class="col-sm-10 col-md-6">
                            <input type="hidden" name="oldpassword" value="<?php echo $row['password']  ?>" />
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="اتركه فارغًا إذا كنت لا تريد التغيير" />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">ألبريد الألكتروني</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="email" name="newemail" value="<?php echo $row['email'] ?>" class="form-control" />
                        </div>
                    </div>
                    <!-- End Email Field -->

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
            if ($do == 'UpdateClient') {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo "<div class='container'>";
                    // Get Variables From The Form

                    $id     = $_POST['id'];
                    $name   = filter_var($_POST['newname'], FILTER_SANITIZE_STRING);
                    $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : $_POST['newpassword'];
                    CheckEdit($id, $email);
                    $update = "UPDATE client SET name='$name' , email='$email' , password='$pass'  WHERE id='$id'";
                    $res = mysqli_query($conn, $update);
                    echo "<div class='text-center mt-5 alert alert-success'> تم تحديث البيانات بنجاح . .</div>";
                } else {
                    echo "<div class='alert-danger'> ERROR 404 </div>";
                    @header("refresh:5;url=dashboard.php");
                }
                echo "</div>";
            }


            // End Check client



        }
    }
} else {
    @header("location:index.php");
}
include $tpl . "footer.php"; ?>