<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo $css;?>all.css">
    <link rel="stylesheet" href="<?php echo $css;?>hover.css">
    <link rel="stylesheet" href="<?php echo $css;?>backend.css">
    <link rel="icon" href="layout/images/icon.png" type="image/x-icon">
    
    <title><?php getTitle()?></title>
    <?php if(isset($_SESSION['Admin_email'])){ ?>

<script type="text/javascript">
window.$crisp = [];
window.CRISP_WEBSITE_ID = "0ae2d750-d4b3-4e6b-87a9-76f83f472051";
(function() {
    d = document;
    s = d.createElement("script");
    s.src = "https://client.crisp.chat/l.js";
    s.async = 1;
    d.getElementsByTagName("head")[0].appendChild(s);
})();
</script>



<?php  } 
 
 ?>
</head>

<body>
