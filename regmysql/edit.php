<?php
include("connection.php"); 
if (isset($_GET['action']) and $_GET['action']=="edit") {
    $id = $_GET['id'];
$sql = "SELECT * FROM members WHERE id=$id";

$result = $con-> query($sql);
print_r($result);
if ($result->num_rows==1 ) {
    $n = $result-> fetch_row();
    ?>
    <div style="width:300px;">
    <form action="member_action.php" method="post">
    <input type="hidden" name="id", value="<?php echo $n[0]; ?>"><br><br>
    First Name: <input type="text" name="firstname" value="<?php echo $n[1]; ?>"><br><br>
    Last Name: <input type="text" name="lastname" value="<?php echo $n[2]; ?>"><br><br>
    Address: &emsp; <input type="text" name="address" value="<?php echo $n[3]; ?>"><br><br>
    Job Title: &emsp;<input type="text" name="job" value="<?php echo $n[4]; ?>"><br><br>
    <input style="float:right" type="submit" name="update" value="submit">
    </form>
</div>
<?php
} }
?>


