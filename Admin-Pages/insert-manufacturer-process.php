<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-add-screen.php" />
<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
    
    $manu_id = $_POST['manu_id'];
    $manu_name = $_POST['manu_name'];
            
    //DO something with that value		
    $sql = "INSERT INTO Manufacturers (manu_id, manu_name) VALUES ('$manu_id', '$manu_name');";
		

		
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




