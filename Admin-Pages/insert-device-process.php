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
	
            
    //DO something with that value		
    $sql = "INSERT INTO Devices (device_id, device_name, device_type, device_launch_date, os_id, display_id, battery_id, manu_id) 
	VALUES ('$device_id', '$device_name', '$device_type', '$device_launch_date', '$os_id', '$display_id', '$battery_id', '$manu_id');";
		

		
		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);
        $pass = "'INSERT SUCCESS! Redirecting to Home Page for current User'";
        $fail = "'INSERT FAILED'";
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
        if($result)  
        {
            echo "<INSERT success!";
            echo "<script type='text/javascript'>alert('INSERT success!')</script>";
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
        
?>




