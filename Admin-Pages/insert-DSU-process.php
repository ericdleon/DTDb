<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-homepage.php" />

<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
    
    $device_storage_id = $_POST['device_storage_id'];
	$device_id = $_POST['device_id'];
	$storage_id = $_POST['storage_id'];
	$upgrade_price = $_POST['upgrade_price'];
	
            
    //DO something with that value		
    $sql = "INSERT INTO Device_Storage_Upgrades (device_storage_id, device_id, storage_id, upgrade_price) 
	VALUES ('$device_storage_id', '$device_id', '$storage_id', '$upgrade_price');";
		

		
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




