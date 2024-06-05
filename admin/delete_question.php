<?php
include "../connection.php";
$id_question = $_GET["id_question"];
$id_exam = $_GET["id_exam"];
mysqli_query($link, "delete from questions where id=$id_question");
?>
<script type="text/javascript">
    alert("Question deleted successfully");
    window.location = "add_questions.php?id_exam=<?php echo $id_exam ?>";
</script>