<?php
session_start();
include "header.php";
include "../connection.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>All Exam Results</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Credit Card -->
                        <center>
                            <h1>All Exam Results</h1>
                        </center>
                        <?php
                        $count = 0;
                        $res = mysqli_query($link, "select * from exam_results  order by id desc");
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
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php
include "footer.php";
?>