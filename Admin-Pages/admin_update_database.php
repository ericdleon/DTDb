<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-homepage.php" />
<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
		
		
		//DO something with that value
		if($device_type == "Laptop") {
            $sql = "UPDATE Devices AS d
        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
        INNER JOIN Processors AS p ON p.proc_id = d.proc_id
        INNER JOIN Graphic_Cards AS g ON g.graphic_card_id = d.graphic_card_id
        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id    
        SET 
        device_name = '$device_name',
        d.manu_id = '$manu_id',
        dsu.upgrade_price = '$upgrade_price',
        d.device_launch_date = '$device_launch_date',
        d.manu_id = '$manu_id',
        d.os_id = '$os_id',
        dsu.storage_id = '$storage_id',
        d.display_id = '$display_id',
        d.battery_id = '$battery_id',
        d.proc_id = '$proc_id',
        d.graphic_card_id = '$graphic_card_id' 
        WHERE d.device_id = $device_id AND dsu.device_storage_id = $device_storage_id  ";
		
		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
		if($result) echo "UPDATE success!"; else echo "UPDATE failed!";
		
		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Multiple lines of code should be wrapped in curly braces 
			//echo "<p>New row was successfully inserted</p>".
			//$insertQueryCount = $insertQueryCount+1;
		}
		else
		{
			echo "<p>Your update failed.</p>";
			die(mysqli_error($db_server));
		}
        } else {
        $sql = "UPDATE Devices AS d
        INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
        INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
        INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
        INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
        INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
        INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id    
        SET 
        device_name = '$device_name',
        d.manu_id = '$manu_id',
        dsu.upgrade_price = '$upgrade_price',
        d.device_launch_date = '$device_launch_date',
        d.manu_id = '$manu_id',
        d.os_id = '$os_id',
        dsu.storage_id = '$storage_id',
        d.display_id = '$display_id',
        d.battery_id = '$battery_id'
        
        WHERE d.device_id = $device_id AND dsu.device_storage_id = $device_storage_id  ";
		
		//As we have already connected to the database, execute the query stored in the $sql variable
        $result = mysqli_query($db_server, $sql);
        $pass = "'UPDATE SUCCESS! Redirecting to Home Page for current User'";
        $fail = "'UPDATE FAILED'";
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
        if($result)  
        {
            echo "<UPDATE success!";
            echo "<script type='text/javascript'>alert('UPDATE success!')</script>";
            echo "<script type='text/javascript'>alert(\"$pass\");</script>";

        } else {
            echo "UPDATE failed!";
            echo "<script type='text/javascript'>alert(\"$pass\");</script>";
        } 
        
		
		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Multiple lines of code should be wrapped in curly braces 
			//echo "<p>New row was successfully inserted</p>".
			//$insertQueryCount = $insertQueryCount+1;
		}
		else
		{
			echo "<p>Your update failed.</p>";
			die(mysqli_error($db_server));
		}
        }
?>




