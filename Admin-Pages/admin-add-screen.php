<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Screen</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin_add_page.css">

</head>


<body>


<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>Ideal Insert includes inserting the following in this order: OS, Display, Battery, Manufacturer, Processor, Graphics Card, Storage Size, Device, and then combine Device and Storage</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
            </ul>
        </div>

    </section>


    <main>
      <a href="insert-os.php">
        <div class="box">
          <img src="../images/phone.svg" alt="">
          Operating System
        </div>
      </a>
      <a href="insert-display.php">
        <div class="box">
          <img src="../images/laptop.svg" alt="">
          Display
        </div>
      </a>
      <a href="insert-battery.php">
        <div class="box">
          <img src="../images/ipad.svg" alt="">
          Battery
        </div>
      </a>
      <a href="insert-manufacturers.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Manufacturer
        </div>
      </a>
      <a href="insert-processor.php">
        <div class="box">
          <img src="../images/phone.svg" alt="">
          Processor
        </div>
      </a>
      <a href="insert-graphic-card.php">
        <div class="box">
          <img src="../images/laptop.svg" alt="">
          Graphics Card
        </div>
      </a>
      <a href="insert-storage-size.php">
        <div class="box">
          <img src="../images/ipad.svg" alt="">
          Storage Size
        </div>
      </a>
      <a href="admin-add-type-device.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Device
        </div>
      </a>
      <a href="insert-DSU.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Device w/Storage & Price
        </div>
      </a>
    </main>

    <section class=update-button-page-position>
    <a href="admin-add-screen.php">
        <button class="update-button-size" type="submit" name="submit-search">ADD</button>
    </a>
      <form class="button-form" action="admin_update-page-list.php" method="POST">
        <button class="update-button-size" type="submit" name="submit-search">UPDATE</button>
      </form>
      <a href="admin-delete-screen.php">
        <button class="update-button-size" type="submit" name="submit-search">DELETE</button>
    </a>
    </section>

    <?php include("../includes/footer.php");?>
</div>

</body>
</html>