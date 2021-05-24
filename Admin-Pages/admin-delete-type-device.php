<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>

    <title>Delete Screen</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/admin_add_page_type_devices.css">

</head>


<body>


<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>Delete</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-delete-screen.php">Delete Component</a>
                </li>
            </ul>
        </div>

    </section>


    <main>
      <a href="delete-device.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Cellphones/Tablets
        </div>
      </a>
      <a href="delete-device-laptop.php">
        <div class="box">
          <img src="../images/factory.svg" alt="">
          Laptops
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