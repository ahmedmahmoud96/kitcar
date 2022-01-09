<?php
session_name('siteLogin');
session_start();
$pageTitle = "نتائج البحث";
if (isset($_SESSION['user_email'])) {
    include 'init.php';
?>
    <div class="container mb-5">
        <div class="row ">
            <?php
            global $conn;
            if (isset($_GET['search'])) {
                $text = $_GET['search'];
                $st = "SELECT * FROM product where CONCAT (name , country_made) LIKE '%$text%' ";
                $res = mysqli_query($conn, $st);
                if (mysqli_num_rows($res)) {
                    while ($row = mysqli_fetch_array($res)) { ?>
                        <div class="col-lg-3">
                            <form action="members.php?do=showInfo" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                <div class="card item-box mt-3">
                                    <span class="price-tag"><?php echo $row['price'] ?> دينار </span>
                                    <?php
                                    if (!empty($row['image'])) { ?>
                                        <img src="image_product/<?php echo $row['image'] ?>" alt="" class="img-responsice " height="210px">
                                    <?php } else { ?>
                                        <img src="image_product/default.png" alt="" class="img-responsice " height="210px">
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
            <?php  }
                } else {
                    echo error("لم يتم العثور على اي نتائج ");
                }
            }
            ?>

        </div>
    </div>

<?php
    include $tpl . "footer.php";
} else {
    echo "ممنوع";
    header("location:index.php");
}
