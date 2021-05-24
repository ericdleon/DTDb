<meta http-equiv="refresh" content="0;URL=http://ejd110.rutgers-sci.domains/Playground/Admin-Pages/admin-add-screen.php" />
<?php 

    include("../includes/a_config.php");

    foreach($_POST as $key=>$value) ${$key}=$value;
    
    $graphic_card_id = $_POST['graphic_card_id'];
	$graphic_card_name = $_POST['graphic_card_name'];
            
    //DO something with that value		
    $sql = "INSERT INTO Graphic_Cards (graphic_card_id, graphic_card_name) VALUES ('$graphic_card_id', '$graphic_card_name');";
		

		
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




