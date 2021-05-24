<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Device</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/mod_update_device_page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        <h1>Update Process</h1>
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
            d.device_id, dsu.device_storage_id, d.device_name, dsu.upgrade_price, d.device_type, 
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
            $queryResults = mysqli_fetch_assoc($result);
        ?>
            <div class='device-grid'>
                    <form class='device-box' action="admin_update_database.php" method="POST">
                        <h1 style="display:none;"><input type="hidden" name="device_id" value="<?php echo $queryResults['device_id']; ?>"></h1>
                        <h1 style="display:none;"><input type="hidden" name="device_storage_id" value="<?php echo $queryResults['device_storage_id']; ?>"></h1>
                        <h1 class='name-tag'>Device Name<input type="text" name="device_name" value="<?php echo $queryResults['device_name']; ?>"></h1>
                        <h2>Description</h2>
                        

                        <p><b>Manufacturer</b>: <?php echo $queryResults['manu_name']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, dsu.upgrade_price, d.device_launch_date, o.os_name
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                            $sql = "SELECT * FROM Manufacturers";
                            $result = mysqli_query($db_server, $sql);
                            if($result)
                            {
                                echo "<select name='manu_id'>";
                                echo "<option value='".$queryResults['manu_id']."'>Select an Option</option>";
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    foreach($row as $key=>$value) ${$key}=$value;
                                    echo "<option value='$manu_id'>$manu_name</option>";
                                }
                                echo "</select>";	
                            }
                            ?>
                        </p>
                        

                        <p><b>Price:</b> 
                        <h1 class='name-tag'><input type="text" name="upgrade_price" value="<?php echo $queryResults['upgrade_price']; ?>"></h1>
                        </p>
                        <p><b>Release Date:</b> 
                        <h1 class='name-tag'><input type="text" name="device_launch_date" value="<?php echo $queryResults['device_launch_date']; ?>"></h1>
                        </p>
                        <h2>Specs</h2>


                        <p><b>Operating System:</b> <?php echo $queryResults['os_name']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, s.storage_size
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Operating_Systems";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='os_id'>";
                            echo "<option value='".$queryResults['os_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$os_id'>$os_name</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Storage Size:</b> <?php echo $queryResults['storage_size']; ?>
                        <?php 
                        
                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, dsu.storage_id, dis.display_resolution, dis.display_size
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Storage_Sizes";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='storage_id'>";
                            echo "<option value='".$queryResults['storage_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$storage_id'>$storage_size</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Display Resolution & Size:</b> <?php echo $queryResults['display_resolution']; ?> & <?php echo $queryResults['display_size']; ?>''
                        <?php
                        
                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, dsu.storage_id, d.display_id, bc.battery_capacity
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);                        

                        $sql = "SELECT * FROM Displays";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='display_id'>";
                            echo "<option value='".$queryResults['display_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$display_id'>$display_resolution & $display_size''</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Battery Capacity:</b> <?php echo $queryResults['battery_capacity']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, d.display_id, d.battery_id, dsu.storage_id, p.proc_name
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Battery_Capacities";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='battery_id'>";
                            echo "<option value='".$queryResults['battery_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$battery_id'>$battery_capacity</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Processor:</b> <?php echo $queryResults['proc_name']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, d.display_id, d.battery_id, dsu.storage_id, d.proc_id, d.graphic_card_id, g.graphic_card_name
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Processors";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='proc_id'>";
                            echo "<option value='".$queryResults['proc_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$proc_id'>$proc_name</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Graphics Card:</b> <?php echo $queryResults['graphic_card_name']; ?>
                        <?php
                        
                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, d.display_id, d.battery_id, dsu.storage_id, d.proc_id, d.graphic_card_id
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
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Graphic_Cards";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='graphic_card_id'>";
                            echo "<option value='".$queryResults['graphic_card_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$graphic_card_id'>$graphic_card_name</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <button type="submit">UPDATE</button>
                    </form>
            </div>

            <?php
        } else {
            $sql = "SELECT 
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
            WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
            $result = mysqli_query($db_server, $sql);
            $queryResults = mysqli_fetch_assoc($result);
        ?>
            <div class='device-grid'>
                    <form class='device-box' action="admin_update_database.php" method="POST">
                        <h1 style="display:none;"><input type="hidden" name="device_id" value="<?php echo $queryResults['device_id']; ?>"></h1>
                        <h1 style="display:none;"><input type="hidden" name="device_storage_id" value="<?php echo $queryResults['device_storage_id']; ?>"></h1>
                        <h1 class='name-tag'>Device Name<input type="text" name="device_name" value="<?php echo $queryResults['device_name']; ?>"></h1>
                        <h2>Description</h2>
                        

                        <p><b>Manufacturer</b>: <?php echo $queryResults['manu_name']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, dsu.upgrade_price, d.device_launch_date, o.os_name
                        FROM Devices AS d 
                        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
                        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
                        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
                        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
                        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
                        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
                        WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                            $sql = "SELECT * FROM Manufacturers";
                            $result = mysqli_query($db_server, $sql);
                            if($result)
                            {
                                echo "<select name='manu_id'>";
                                echo "<option value='".$queryResults['manu_id']."'>Select an Option</option>";
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    foreach($row as $key=>$value) ${$key}=$value;
                                    echo "<option value='$manu_id'>$manu_name</option>";
                                }
                                echo "</select>";	
                            }
                            ?>
                        </p>
                        

                        <p><b>Price:</b> 
                        <h1 class='name-tag'><input type="text" name="upgrade_price" value="<?php echo $queryResults['upgrade_price']; ?>"></h1>
                        </p>
                        <p><b>Release Date:</b> 
                        <h1 class='name-tag'><input type="text" name="device_launch_date" value="<?php echo $queryResults['device_launch_date']; ?>"></h1>
                        </p>
                        <h2>Specs</h2>


                        <p><b>Operating System:</b> <?php echo $queryResults['os_name']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, s.storage_size
                        FROM Devices AS d 
                        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
                        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
                        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
                        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
                        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
                        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
                        WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Operating_Systems";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='os_id'>";
                            echo "<option value='".$queryResults['os_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$os_id'>$os_name</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Storage Size:</b> <?php echo $queryResults['storage_size']; ?>
                        <?php 
                        
                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, dsu.storage_id, dis.display_resolution, dis.display_size
                        FROM Devices AS d 
                        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
                        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
                        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
                        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
                        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
                        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
                        WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Storage_Sizes";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='storage_id'>";
                            echo "<option value='".$queryResults['storage_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$storage_id'>$storage_size</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Display Resolution & Size:</b> <?php echo $queryResults['display_resolution']; ?> & <?php echo $queryResults['display_size']; ?>''
                        <?php
                        
                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, dsu.storage_id, d.display_id, bc.battery_capacity
                        FROM Devices AS d 
                        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
                        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
                        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
                        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
                        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
                        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
                        WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);                        

                        $sql = "SELECT * FROM Displays";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='display_id'>";
                            echo "<option value='".$queryResults['display_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$display_id'>$display_resolution & $display_size''</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <p><b>Battery Capacity:</b> <?php echo $queryResults['battery_capacity']; ?>
                        <?php 

                        $manu_name = mysqli_real_escape_string($db_server, $_GET['manu_name']);
                        $device_type = mysqli_real_escape_string($db_server, $_GET['device_type']);
                        $upgrade_price = mysqli_real_escape_string($db_server, $_GET['upgrade_price']);
                        $sql2 = "SELECT 
                        d.device_id, m.manu_id, o.os_id, d.display_id, d.battery_id, dsu.storage_id
                        FROM Devices AS d 
                        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
                        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
                        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
                        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
                        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
                        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id  
                        WHERE manu_name='$manu_name'AND device_type='$device_type'AND upgrade_price='$upgrade_price'";
                        $result2 = mysqli_query($db_server, $sql2);
                        $queryResults = mysqli_fetch_assoc($result2);

                        $sql = "SELECT * FROM Battery_Capacities";
                        $result = mysqli_query($db_server, $sql);
                        if($result)
                        {
                            echo "<select name='battery_id'>";
                            echo "<option value='".$queryResults['battery_id']."'>Select an Option</option>";
                            while($row=mysqli_fetch_assoc($result))
                            {
                                foreach($row as $key=>$value) ${$key}=$value;
                                echo "<option value='$battery_id'>$battery_capacity</option>";
                            }
                            echo "</select>";	
                        }
                        ?>
                        </p>

                        <button type="submit">UPDATE</button>
                    </form>
            </div>
            <?php
        }
        ?>
   
    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>