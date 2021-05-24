<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Compare Device</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/user_compare_device_page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        <h1>Compare</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homeage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homeage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-tablets.php">Tablets</a>
                </li>
	        </ul>
        </div>

    </section>

    <main>

    <?php
    $productOne = $productTwo = '';

    <?php
    $productOne = $productTwo = '';

   
    $productOne = $_REQUEST['card_one']; 
    $productTwo = $_REQUEST['card_two'];

    $pro1_sql = "SELECT 
    d.device_id, dsu.device_storage_id, d.device_name, dsu.upgrade_price, d.device_type, 
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
    WHERE dsu.device_storage_id = '".$productOne."'";
    $pro1_query = mysqli_query($db_server, $pro1_sql);
    $pro1 = mysqli_fetch_object($pro1_query);

    $pro2_sql = "SELECT 
    d.device_id, dsu.device_storage_id, d.device_name, dsu.upgrade_price, d.device_type, 
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
    WHERE dsu.device_storage_id = '".$productTwo."'";
    $pro2_query = mysqli_query($db_server, $pro2_sql);
    $pro2 = mysqli_fetch_object($pro2_query);    
?>


    <div class="device-grid">
        <div class="device-box">
            <h1 class="name-tag"><?php echo $pro1->device_name; ?></h1>
            <h2>Description</h2>
            <p><b>Manufacturer</b>: <?php echo $pro1->manu_name; ?></p>
            <p><b>Price:</b> $<?php echo $pro1->upgrade_price; ?></p>
            <p><b>Release Date:</b> <?php echo $pro1->device_launch_date; ?></p>
            <h2>Specs</h2>
            <p><b>Operating System:</b> <?php echo $pro1->os_name; ?></p>
            <p><b>Storage Size:</b> <?php echo $pro1->storage_size; ?></p>
            <p><b>Display Resolution:</b> <?php echo $pro1->display_resolution; ?></p>
            <p><b>Display Size:</b> <?php echo $pro1->display_size; ?>"</p>
            <p><b>Battery Capacity:</b> <?php echo $pro1->battery_capacity; ?></p>
        </div>
        <div class="device-box">
            <h1 class="name-tag"><?php echo $pro2->device_name; ?></h1>
            <h2>Description</h2>
            <p><b>Manufacturer</b>: <?php echo $pro2->manu_name; ?></p>
            <p><b>Price:</b> $<?php echo $pro2->upgrade_price; ?></p>
            <p><b>Release Date:</b> <?php echo $pro2->device_launch_date; ?></p>
            <h2>Specs</h2>
            <p><b>Operating System:</b> <?php echo $pro2->os_name; ?></p>
            <p><b>Storage Size:</b> <?php echo $pro2->storage_size; ?></p>
            <p><b>Display Resolution:</b> <?php echo $pro2->display_resolution; ?></p>
            <p><b>Display Size:</b> <?php echo $pro2->display_size; ?>"</p>
            <p><b>Battery Capacity:</b> <?php echo $pro2->battery_capacity; ?></p>
        </div>
    </div>


    </main>

    <?php include("../includes/footer.php");?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
</body>
</html>