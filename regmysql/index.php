<?php session_start(); ?>
<html>
    <head><title></title></head>
    <body>
        <div style="width:700px;">
        <?php 
        if (isset($_SESSION['message'])){ ?>
	    <div style="padding: 10px; border-radius: 5px; color: #3c763d; background: #dff0d8;border: 1px solid #3c763d;">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	    </div>
<?php } ?>
        <h1>Members Details</h1>
        <?php  include('connection.php');
        $firstname = "";
        $lastname = "";
        $address = "";
        $job = "";
        $id = "";
        $update = false;
        if (isset($_GET['action']) and $_GET['action']=="edit") {
            $id = $_GET['id'];
            $update = true;
        $sql = "SELECT * FROM members WHERE id=$id";
        
        $result = $con-> query($sql);
        print_r($result);
        if ($result->num_rows==1 ) {
            $n = $result-> fetch_row();
            $id = $n[0];
            $firstname = $n[1];
            $lastname = $n[2];
            $address = $n[3];
            $job = $n[4];
        } }
        ?>
    
        <?php $query = "SELECT * FROM members"; 
            $result = $con -> query($query);
        ?>
        
        <table style="border:1px solid">
            <thead><th>Id</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Job Title</th><th>Actions</th></thead>
            <?php if ($result) {
                    while ($row = $result -> fetch_assoc()) {
                   
            ?>
            <tr><td><?php echo $row["id"] ?></td>
            <td><?php echo $row["firstname"] ?></td>
            <td><?php echo $row["lastname"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo $row["job"] ?></td>
            <td><a href="index.php?action=edit&amp;id=<?php echo $row["id"];?>">edit</a>&emsp;
            <a href="member_action.php?action=del&amp;id=<?php echo $row["id"];?>">remove</a></td></tr>
            <?php //echo print_r($row);
            }} 
            // Free result set
            $result -> free_result();
            ?>
        </table>
        </div>
        <br>
        <div style="width:600px;">
        <h1>Add Members</h1>
        <div style="width:300px;">
        <form action="member_action.php" method="post">
        <input type="hidden" name="id", value="<?php echo $id; ?>">
        First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
        Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
        Address: &emsp; <input type="text" name="address" value="<?php echo $address; ?>"><br><br>
        Job Title: &emsp;<input type="text" name="job" value="<?php echo $job; ?>"><br><br>
        <?php if($update) { ?>
            <input style="float:right" type="submit" name="update" value="update">
        <?php } else { ?>
            <input style="float:right" type="submit" name="add" value="add">
        <?php } ?>
        
        
        </form>
        </div>
        </div>

       
    </body>
</html>