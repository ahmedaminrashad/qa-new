<?php
require ("../includes/dbconnection.php");
//$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM profile WHERE teacher_name like '" . $_POST["keyword"] . "%' ORDER BY teacher_name LIMIT 0,6";
$result = mysqli_query($conn, $query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["teacher_id"]; ?>');"><?php echo $country["teacher_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>