<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Device Page</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/device_page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        <h1>Current Device</h1>
        <div class="mini-nav">
	        <ul">
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homeage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
	        </ul>
        </div>
    </section>

    <main>
    <?php
        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);

        if ($device_type == "Laptop") {
            $sql = "SELECT 
            d.device_id, d.device_name, dsu.upgrade_price, d.device_type, 
            d.device_launch_date, m.manu_name, o.os_name, 
            s.storage_size, dis.display_resolution, dis.display_size, 
            bc.battery_capacity, g.graphic_card_name, p.proc_name
            FROM Devices AS d 
            INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
            INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
            INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
            INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
            INNER JOIN Processors AS p ON p.proc_id = d.proc_id
            INNER JOIN Graphic_Cards AS g ON g.graphic_card_id = d.graphic_card_id
            INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
            INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
            WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
            $result = mysqli_query($db_server, $sql);
            $queryResults = mysqli_num_rows($result);

            echo "<div class='device-grid'>";
        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='device-box'>
                <h1 class='name-tag'>".$row['device_name']."</h1>
                <h2>Description</h2>
                <p><b>Manufacturer</b>: ".$row['manu_name']."</p>
                <p><b>Price:</b> $".$row['upgrade_price']."</p>
                <p><b>Release Date:</b> ".$row['device_launch_date']."</p>
                <h2>Specs</h2>
                <p><b>Operating System:</b> ".$row['os_name']."</p>
                <p><b>Storage Size:</b> ".$row['storage_size']."</p>
                <p><b>Display Resolution:</b> ".$row['display_resolution']."</p>
                <p><b>Display Size:</b> ".$row['display_size']."''</p>
                <p><b>Battery Capacity:</b> ".$row['battery_capacity']."</p>
                <p><b>Processor:</b> ".$row['proc_name']."</p>
                <p><b>Graphics Card:</b> ".$row['graphic_card_name']."</p>
            </div>";
            }
        } else {
            echo "No Data Available";
        }
        echo "</div>";
        } else {
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
            WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
            $result = mysqli_query($db_server, $sql);
            $queryResults = mysqli_num_rows($result);

            echo "<div class='device-grid'>";
        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo " <div class='device-box'>
            <h1 class='name-tag'>".$row['device_name']."</h1>
            <h2>Description</h2>
            <p><b>Manufacturer</b>: ".$row['manu_name']."</p>
            <p><b>Price:</b> $".$row['upgrade_price']."</p>
            <p><b>Release Date:</b> ".$row['device_launch_date']."</p>
            <h2>Specs</h2>
            <p><b>Operating System:</b> ".$row['os_name']."</p>
            <p><b>Storage Size:</b> ".$row['storage_size']."</p>
            <p><b>Display Resolution:</b> ".$row['display_resolution']."</p>
            <p><b>Display Size:</b> ".$row['display_size']."''</p>
            <p><b>Battery Capacity:</b> ".$row['battery_capacity']."</p>
        </div>";
            }
        } else {
            echo "No Data Available";
        }
        echo "</div>";
        }

    ?>
    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>