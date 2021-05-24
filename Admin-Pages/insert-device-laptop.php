<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>INSERT DEVICE</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/insert-page.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>INSERT DEVICE</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-homepage.php">Home</a>
                </li>
                <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/Admin-Pages/admin-add-screen.php">Add Components</a>
                </li>
            </ul>
        </div>

    </section>

    <main>
    
    <form class="content-device-page" method="POST" action="insert-device-laptop-process.php">
      <p>Device ID: 
          <input type="text" name="device_id"/>
      </p>
		  <p>Device Name: 
          <input type="text" name="device_name"/>
      </p>
      <p>Device Type:
          <input type="text" name="device_type"/>
      </p>
      <p>Release Date:
          <input type="text" name="device_launch_date" placeholder="YYYY-MM-DD"/>
      </p>
      <p>Operating System:
            <?php 
                $sql = "SELECT * FROM Operating_Systems";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='os_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$os_id'>$os_name</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        <p>Display:
            <?php 
                $sql = "SELECT * FROM Displays";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='display_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$display_id'>$display_resolution & $display_size''</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        <p>Battery Capacity:
            <?php 
                $sql = "SELECT * FROM Battery_Capacities";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='battery_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$battery_id'>$battery_capacity</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        <p>Manufacturer:
            <?php 
                $sql = "SELECT * FROM Manufacturers";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='manu_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$manu_id'>$manu_name</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        <p>Processor:
            <?php 
                $sql = "SELECT * FROM Processors";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='proc_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$proc_id'>$proc_name</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        <p>Graphics Card:
            <?php 
                $sql = "SELECT * FROM Graphic_Cards";
                $result = mysqli_query($db_server, $sql);
                if($result)
                {
                    echo "<select name='graphic_card_id'>";
                    while($row=mysqli_fetch_assoc($result))
                    {
                        foreach($row as $key=>$value) ${$key}=$value;
                        echo "<option value='$graphic_card_id'>$graphic_card_name</option>";
                    }
                    echo "</select>";	
                }
            ?>
        </p>
        
        <button class="content-button" type="submit">ADD</button>
      </form>

    </main>

    <?php include("../includes/footer.php");?>

</div>

</body>
</html>