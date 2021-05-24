<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Page</title>
	<link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/update_page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        <h1>Update Page</h1>
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
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($db_server, $_POST['search']);
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
            WHERE 
            d.device_name LIKE '%$search%' OR 
            d.device_type LIKE '%$search%' OR
            d.device_launch_date LIKE '%$search%' OR
            m.manu_name LIKE '%$search%' OR
            dsu.upgrade_price LIKE '%$search%'";
            $result = mysqli_query($db_server, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($search == null) {
                $search = 'All';
            }
            
            echo "<h2 class='main-headline'>";
            echo "Choose a Device to Update";
            echo "</h2>";

            echo "<div class='device-grid'>";
            
            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='admin_update_device_page.php?manu_name=".$row['manu_name']."&device_type=".$row['device_type']."&upgrade_price=".$row['upgrade_price']."'><div class='device-box'>
                    <h3>Device: ".$row['device_name']."</h3>
                    <h3>Device Type: ".$row['device_type']."</h3>
                    <h3>Release Date: ".$row['device_launch_date']."</h3>
                    <h3>Manufacturer: ".$row['manu_name']."</h3>
                    <h3>Price: ".$row['upgrade_price']."</h3>
                </div></a>";
                }
            } else {
                echo "There are no results matching your search!";
            }

            echo "</div>";
            
        }
    ?>
    </main>
    

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>