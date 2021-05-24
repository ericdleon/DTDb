<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Manufacturer Page Products</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/user_manufacturer_products.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        <h1>Selected Manufacturer Products</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homeage") {?>active<?php }?> href="/Playground/User-Pages/user-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homeage") {?>active<?php }?> href="/Playground/User-Pages/user-manufacturers.php">Manufacturers</a>
                </li>
	        </ul>
        </div>
    </section>

    <main>
    <div class="device-grid">
    <?php
        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
           
        $sql = "SELECT 
        d.device_id, d.device_name, dsu.upgrade_price, d.device_type, 
        d.device_launch_date, m.manu_name, o.os_name, 
        s.storage_size, dis.display_resolution, dis.display_size, 
        bc.battery_capacity
        FROM Devices AS d 
        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
        WHERE manu_name = '$manu_name'";
        $result = mysqli_query($db_server, $sql);
        while($row = mysqli_fetch_array($result)) {
            ?>
               <div class="device-box">
                   <div class="card compare_card<?php echo $row['device_id']; ?><?php echo $row['storage_size']; ?>">
                       <p class="device-box-product-name" ><?php echo $row['device_name']; ?></p>
                       <p class="device-box-storage-size"><?php echo $row['storage_size']; ?></p>
                       <p class="device-box-upgrade-price">$<?php echo $row['upgrade_price']; ?></p>
                       <a href="http://ejd110.rutgers-sci.domains/Playground/User-Pages/device_page.php?manu_name=<?php echo $row['manu_name']; ?>&device_type=<?php echo $row['device_type']; ?>&upgrade_price=<?php echo $row['upgrade_price']; ?>">
                       <button class="manu_button" type="submit">View <?php echo $row['device_type']; ?></button>
                       </a>
                   </div>
               </div>
               <?php
               }
               ?>
               </div>
    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>