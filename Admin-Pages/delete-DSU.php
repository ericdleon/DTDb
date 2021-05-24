<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>DELETE DEVICE STORAGE & PRICE</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/delete-page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>DELETE DEVICE STORAGE & PRICE</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-delete-screen.php">Delete Components</a>
                </li>
            </ul>
        </div>

    </section>

    <main>
    
    <form class="content-device-page" method="POST" action="delete-DSU-process.php">
   
      <p>Device in Database:
            <?php 
                $sql = "SELECT * 
                FROM Device_Storage_Upgrades AS dsu 
                INNER JOIN Devices AS d ON d.device_id = dsu.device_id
                INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id
                ";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='device_storage_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$device_storage_id'>$device_name - $storage_size - $$upgrade_price</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>   
        
        <button class="content-button" type="submit">DELETE</button>
      </form>

    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>