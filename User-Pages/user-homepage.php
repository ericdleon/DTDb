<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>

    <title>User Homepage</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/user_home_page.css">

</head>


<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <main>
      <a href="user-phones.php">
        <div class="box">
          <img src="../images/phone.svg" alt="">
          Cellphones
        </div>
      </a>
      <a href="user-laptops.php">
        <div class="box">
          <img src="../images/laptop.svg" alt="">
          Laptops
        </div>
      </a>
      <a href="user-tablets.php">
        <div class="box">
          <img src="../images/ipad.svg" alt="">
          Tablets
        </div>
      </a>
      <a href="user-manufacturers.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Manufacturers
        </div>
      </a>
    </main>

    <?php include("../includes/footer.php");?>
</div>

</body>
</html>