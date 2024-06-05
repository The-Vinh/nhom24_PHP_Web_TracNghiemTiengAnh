<?php
session_start();
include "./connection.php";
include "./header.php";
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+$_SESSION[exam_time] minutes"));
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

        <?php
        $correct = 0;
        $wrong = 0;
        if (isset($_SESSION["answer"])) {
            for ($i = 1; $i <= sizeof($_SESSION["answer"]); $i++) {
                $answer = "";
                $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]' && question_no=$i");
                while ($row = mysqli_fetch_array($res)) {
                    $answer = $row["answer"];
                }
                if (isset($_SESSION["answer"][$i])) {
                    if ($answer == $_SESSION["answer"][$i]) {

                        $correct++;
                    } else {
                        $wrong++;
                    }
                } else {
                    $wrong++;
                }
            }
        }

        $count = 0;
        $res = mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
        $wrong = $count - $correct;
        ?>
        <br><br>
        <center>
            Total Questions=<?php echo $count; ?><br>
            Correct Answers =<?php echo $correct; ?><br>
            Wrong Answers =<?php echo $wrong; ?> <br>
        </center>


    </div>

</div>
<?php
if (isset($_SESSION["exam_start"])) {
    $date = date("Y-m-d");
    mysqli_query($link, "insert into exam_results values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')") or die(mysqli_error($link));
}
if (isset($_SESSION["exam_start"])) {
    unset($_SESSION["exam_start"]);
?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
<?php
}
?>
<?php
include "./footer.php";
?>