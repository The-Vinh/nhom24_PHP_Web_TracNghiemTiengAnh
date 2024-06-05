<?php
include "../connection.php";
$id_exam = $_GET["id_exam"];
mysqli_query($link, "delete from questions where id_exam=$id_exam");
mysqli_query($link, "delete from exam_category where id=$id_exam");
?>
<script type="text/javascript">
    window.location = "add_exam_category.php";
</script>