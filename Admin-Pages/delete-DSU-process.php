<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-homepage.php" />


<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
    
    $device_storage_id = $_POST['device_storage_id'];
            
    //DO something with that value		
    $sql = "DELETE FROM Device_Storage_Upgrades WHERE device_storage_id=$device_storage_id";
		

		
		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);
        $pass = "'DELETE SUCCESS! Redirecting to Home Page for current User'";
        $fail = "'DELETE FAILED'";
		
		//Check if the UPDATE was successfully executed: if the result is NOT FALSE
        if($result)  
        {
            echo "<DELETE success!";
            echo "<script type='text/javascript'>alert('DELETE success!')</script>";
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




