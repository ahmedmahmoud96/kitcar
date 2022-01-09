<?php

/*
** Title Function 
** Title Function That Echo The Page Title In Case The Page
** Has The Variable $pageTitle And Echo Defult Title For Other Pages
*/

function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'Kit Car';
    }
}

// Delete Function

function delete($table, $id)
{
    global $conn;
    $delete = "DELETE FROM $table WHERE id='$id'";
    mysqli_query($conn, $delete);
    echo "<div class='text-center mt-5 alert alert-success'> تم حذف البيانات بنجاح . .</div>";
    @header("refresh:2;url=members.php?do=dashboard.php");
}


function CheckEdit($id, $email)
{
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $select_vendor = "SELECT id, email FROM vendor where email = '$email' AND id!='$id' ";
        $res = mysqli_query($conn, $select_vendor);
        if (mysqli_num_rows($res)) {
            echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً </div>";
            die();
        }

        $select_client = "SELECT id, email FROM client where email = '$email'  AND id!='$id' ";
        $resc = mysqli_query($conn, $select_client);
        if (mysqli_num_rows($resc)) {
            echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً </div>";
            die();
        }
    }

    $select_client = "SELECT id , email FROM admin where email = '$email' AND id!='$id' ";
    $resc = mysqli_query($conn, $select_client);
    if (mysqli_num_rows($resc)) {
        echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً</div>";
        die();
    }
}

function CheckUser($email)
{
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $select_vendor = "SELECT id, email FROM vendor where email = '$email'  ";
        $res = mysqli_query($conn, $select_vendor);
        if (mysqli_num_rows($res)) {
            echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً </div>";
            die();
        }

        $select_client = "SELECT id, email FROM client where email = '$email'  ";
        $resc = mysqli_query($conn, $select_client);
        if (mysqli_num_rows($resc)) {
            echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً </div>";
            die();
        }
    }

    $select_client = "SELECT id , email FROM admin where email = '$email' ";
    $resc = mysqli_query($conn, $select_client);
    if (mysqli_num_rows($resc)) {
        echo "<div class='alert alert-danger'> ألبريد ألألكتروني موجود مسبقاً</div>";
        die();
    }
}


function Calc($table)
{
    global $conn;
    $stm = "SELECT COUNT(id) FROM $table ";
    $res = mysqli_query($conn, $stm);
    $row = mysqli_fetch_array($res);
    print_r($row['COUNT(id)']);
}

function CalcPending()
{
    global $conn;
    $stm = "SELECT COUNT(RegStatus) FROM vendor where RegStatus=0 ";
    $res = mysqli_query($conn, $stm);
    $row = mysqli_fetch_array($res);
    print_r($row['COUNT(RegStatus)']);
}

// ///////////////// download_file
function download_file($fil)
{
    $filename = $fil;
    $file = "license/" . $filename;
    header('Content-type: application/octet-stream');
    header("Content-Type: " . mime_content_type($file));
    header("Content-Disposition: attachment; filename=" . $filename);
    while (ob_get_level()) {
        ob_end_clean();
    }
    readfile($file);
}

function error($error)
{
    echo '<div class="alert alert-danger error">' . $error . '</div>';
}


//  System

function checkLastSeen($numYers, $table)
{
    global $conn;
    $st = "SELECT id, lastSeen from $table ";
    $res = mysqli_query($conn, $st);
    while ($row = mysqli_fetch_array($res)) {
        $last = @(date("Y-m-d") - $row['lastSeen']);
        if ($last >= $numYers) {
            $delete = "DELETE FROM $table WHERE id='$row[id]'";
            mysqli_query($conn, $delete);
        }
    }
}

function Delete_vendor($numProduct )
{
    global $conn;
    $st = "SELECT product_id  from evaluation where rating <=2 ";
    $res = mysqli_query($conn, $st);

 if(mysqli_num_rows($res)){
    $arr[]=array();
    while ($row = mysqli_fetch_array($res)) {
        $arr[] = $row['product_id'];
    }
   @$arr2 = array_count_values($arr);
    if (!empty($arr2)) {
        foreach ($arr2 as $k => $v) {
            if ($v >= $numProduct) {
            $st="SELECT vendor_id from product where id=$k ";
            $res=mysqli_query($conn,$st);
            $row=mysqli_fetch_array($res);
            $id_ven=$row['vendor_id'];
            
           $del= "DELETE FROM vendor WHERE id=$id_ven ";
           mysqli_query($conn, $del);

           $delete = "DELETE FROM product WHERE id=$k ";
           mysqli_query($conn, $delete);
            }
              
        }
    }
 }
}



