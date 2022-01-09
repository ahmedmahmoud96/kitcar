<?php


session_name('siteLogin');
session_start();
$pageTitle = str_replace('-', ' ', $_GET['pagename']);
include 'init.php';

$do = isset($_GET['do']) ? $_GET['do'] : 'section.php';
?>


<h1 class="text-center mt-3 mb-5 Htitl"> <?php echo str_replace('-', ' ', $_GET['pagename']); ?></h1>






<div class="container">
    <div class="subsection">
        <?php
        if ($_GET['pageid'] && $_GET['pagename'] && @$_GET['sub']) {
            $st = "SELECT parents FROM sections WHERE id='$_GET[sub]'";
            $res = mysqli_query($conn, $st);
            $row = mysqli_fetch_array($res);
            $stt = "SELECT name FROM sections WHERE id='$row[parents]'";
            $rest = mysqli_query($conn, $stt);
            $rowt = mysqli_fetch_array($rest);
            $row['parents'];
            $rowt['name']; ?>
           <p class="path"><?php echo '<a class="" href="sections.php?pageid='.$row['parents'].'&pagename='.$rowt['name'].'" >'.$rowt['name'].' </a>'.' > '.str_replace('-', ' ', $_GET['pagename']) ;?></p>

        <?php }



$sts = "SELECT * FROM sections where parents=" . $_GET['pageid'];
$ress = mysqli_query($conn, $sts);
if (!empty(mysqli_num_rows($ress))) {
    while ($rowsection = mysqli_fetch_array($ress)) {
        echo '   <a class="nav-link d-inline linksub" href="sections.php?pageid=' . $rowsection['id'] . '&pagename=' . str_replace(' ', '-', $rowsection['name']) . '&sub=' . $rowsection['id'] . '">' . $rowsection['name'] . '</a>';
    }
}
?>
</div>
</div>

<?php { ?>


<div class="container">
<div class="row">
    <?php
    $st = "SELECT * FROM product WHERE section_id=$_GET[pageid] ";
    $res = mysqli_query($conn, $st);
    while ($row = mysqli_fetch_array($res)) { ?>
        <div class="col-lg-3 mb-5 ">
            <form action="members.php?do=showInfo" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                <div class="card item-box">
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

<?php }
}
?>
</div>
</div>



    <?php if (isset($_GET['sub'])) { ?>

        <div class="container">
            <div class="row">
                <?php


                $st = "SELECT * FROM product WHERE subsection_id='$_GET[sub]'";
                $res = mysqli_query($conn, $st);
                while ($row = mysqli_fetch_array($res)) { ?>
                    <div class="col-lg-3 mb-5 ">
                        <form action="members.php?do=showInfo" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                            <div class="card item-box">
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

            <?php }
            }
            ?>
            </div>
        </div>



        <?php

        include $tpl . "footer.php";
