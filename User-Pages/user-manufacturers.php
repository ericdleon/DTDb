<?php include("../includes/a_config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>Manufacturers</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/user_manufacturers.css">
</head>
<body>

<div class="grid-container">

    <?php include("../includes/main-navigation.php");?>

    <section class="nav-trail">
        
        <h1>Manufacturers</h1>
        <div class="mini-nav">
	        <ul>
	            <li>
	                <a  <?php if ($CURRENT_PAGE == "User Homepage") {?>active<?php }?> href="/Playground/User-Pages/user-homepage.php">Home</a>
                </li>
            </ul>
        </div>

    </section>

    <main>

    <div class="device-grid">
        <?php
            $sql = "SELECT DISTINCT 
            m.manu_name
            FROM Devices AS d 
            INNER JOIN Manufacturers AS m ON m.manu_id = d.manu_id 
            INNER JOIN Operating_Systems AS o ON o.os_id = d.os_id 
            INNER JOIN Displays AS dis ON dis.display_id = d.display_id 
            INNER JOIN Battery_Capacities AS bc ON bc.battery_id = d.battery_id
            INNER JOIN Device_Storage_Upgrades AS dsu ON dsu.device_id = d.device_id 
            INNER JOIN Storage_Sizes AS s ON dsu.storage_id = s.storage_id
            ORDER BY manu_name";
            $result = mysqli_query($db_server, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='user-manufacturer-page.php?manu_name=".$row['manu_name']."'><div class='device-box'>
                    <h1 class='device-box-product-name' >".$row['manu_name']."</h1>
                </div></a>";
                }
            } else {
                echo "There are no results matching your search!";
            }

            ?>
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