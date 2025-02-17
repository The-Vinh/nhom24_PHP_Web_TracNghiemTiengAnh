<?php
include "header.php";
include "../connection.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Select exam categories for add and edit questions</h1>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Exam Name</th>
                                    <th scope="col">Exam Time</th>
                                    <th scope="col">Select</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                $res = mysqli_query($link, "select * from exam_category");
                                while ($row = mysqli_fetch_array($res)) {
                                    $count = $count + 1;
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $count; ?></td>
                                        <td scope="row"><?php echo $row["category"]; ?></td>
                                        <td scope="row"><?php echo $row["exam_time_in_minutes"]; ?></td>
                                        <td scope="row"><a href="add_questions.php?id_exam=<?php echo $row["id"]; ?>">Select</a></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
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