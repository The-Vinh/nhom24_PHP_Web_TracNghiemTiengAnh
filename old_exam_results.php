<?php
session_start();
include "./header.php";
include "connection.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <center>
            <h1>Old Exam Results</h1>
        </center>
        <?php
        $count = 0;
        $res = mysqli_query($link, "select * from exam_results where username='$_SESSION[username]' order by id desc");
        $count = mysqli_num_rows($res);
        if ($count == 0) {
        ?>
            <center>
                <h1>No Records Found</h1>
            </center>
        <?php
        } else {
        ?>
            <table class="table table-bordered">
                <tr $style="background-color: #006df0; color: white">
                    <th>Username</th>
                    <th>Exam type</th>
                    <th>Total question</th>
                    <th>Correct answer</th>
                    <th>Wrong answer</th>
                    <th>Exam time</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row["username"] ?></td>
                        <td><?php echo $row["exam_type"] ?></td>
                        <td><?php echo $row["total_question"] ?></td>
                        <td><?php echo $row["correct_answer"] ?></td>
                        <td><?php echo $row["wrong_answer"] ?></td>
                        <td><?php echo $row["exam_time"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>

</div>
<?php
include "./footer.php";
?>