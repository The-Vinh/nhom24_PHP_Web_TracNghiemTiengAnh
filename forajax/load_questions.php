<?php
session_start();
include "../connection.php";
$question_no = "";
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";


$queno = $_GET["questionno"];
?>
<script>
    alert("<?php echo $queno ?>");
</script>
<?php
if (isset($_SESSION["answer"][$queno])) {
    $ans = $_SESSION["answer"][$queno];
}
$res = mysqli_query($link, "select * from questions where category ='$_SESSION[exam_category]' && question_no =$_GET[questionno]");
$count = mysqli_num_rows($res);

if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($res)) {
        $question_no = $row["question_no"];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
?>


        <br>
        <table>
            <tr>
                <td style="font-weight:bold; font-size:10px; padding-left: 5px" colspan="2">
                    <h1><?php echo "(" . $question_no . ") " . $question ?></h1>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <input type="radio" name="r1" id="r1" value="<?php echo $opt1 ?>" onclick="radioclick(this.value=<?php echo $question_no ?>)">
                    <?php
                    if ($ans == $opt1) {
                        echo "checked";
                    }
                    ?>
                </td>

            </tr>
        </table>
<?php
    }
}
?>