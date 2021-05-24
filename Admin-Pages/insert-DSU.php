<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>INSERT DEVICE STORAGE & PRICE</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/insert-page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>INSERT DEVICE STORAGE & PRICE</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-add-screen.php">Add Components</a>
                </li>
            </ul>
        </div>

    </section>

    <main>
    
    <form class="content-device-page" method="POST" action="insert-DSU-process.php">
      <p>Device Storage ID: 
          <input type="text" name="device_storage_id"/>
      </p>

      <p>Device in Database:
            <?php 
                $sql = "SELECT * FROM Devices";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='device_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$device_id'>$device_name</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>

        <p>Storage Size in Database:
            <?php 
                $sql = "SELECT * FROM Storage_Sizes";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='storage_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$storage_id'>$storage_size</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
		  
      <p>Price:
          <input type="text" name="upgrade_price" />
      </p>
      
        
        <button class="content-button" type="submit">ADD</button>
      </form>

    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>