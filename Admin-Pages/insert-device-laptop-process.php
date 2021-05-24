<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-homepage.php" />

<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
    
    $device_id = $_POST['device_id'];
	$device_name = $_POST['device_name'];
	$device_type = $_POST['device_type'];
	$device_launch_date = $_POST['device_launch_date'];
	$os_id = $_POST['os_id'];
	$display_id = $_POST['display_id'];
	$battery_id = $_POST['battery_id'];
	$manu_id = $_POST['manu_id'];
	$proc_id = $_POST['proc_id'];
    $graphic_card_id = $_POST['graphic_card_id'];
	
            
    //DO something with that value		
    $sql = "INSERT INTO Devices (device_id, device_name, device_type, device_launch_date, os_id, display_id, battery_id, manu_id, proc_id, graphic_card_id) 
	VALUES ('$device_id', '$device_name', '$device_type', '$device_launch_date', '$os_id', '$display_id', '$battery_id', '$manu_id', '$proc_id', '$graphic_card_id');";
		

		
		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
		if($result) echo "Insert success!"; else echo "Insert failed!";
		
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
?>




