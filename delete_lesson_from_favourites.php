<?php include 'includes/conn.php'; ?>
<?php 
$lesson_id = $_GET['id'];
$kayit=mysqli_query($baglan,"delete from halanlarym where id='$lesson_id'");

if ($kayit) {
    header('location:halanlarym.php');
}

?>
