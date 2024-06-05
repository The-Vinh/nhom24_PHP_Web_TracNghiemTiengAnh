<?php
include "header.php";
include "../connection.php";
?>
<?php
$id_exam = $_GET["id_exam"];
$res = mysqli_query($link, "select * from exam_category where id=$id_exam");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
    $exam_time = $row["exam_time_in_minutes"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Exam Category</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="" method="post" name="form1">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Exam Category</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Exam Category</label>
                                            <input type="text" name="examname" placeholder="Add Exam Category" class="form-control" value="<?php echo $exam_category ?>">
                                        </div>
                                        <div class=" form-group">
                                            <label for="company" class=" form-control-label">Exam Time In Minutes</label>
                                            <input type="number" name="examtime" placeholder="Excam Time In Minutes" class="form-control" value="<?php echo $exam_time ?>">
                                        </div>
                                        <div class=" form-group">
                                            <input type="submit" name="submit1" value="Update Exam" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>
    </div><!-- .animated -->
    <?php
    if (isset($_POST["submit1"])) {
        mysqli_query($link, "update exam_category set category='$_POST[examname]',exam_time_in_minutes='$_POST[examtime]' where id =$id_exam") or die(mysqli_error($link));
        mysqli_query($link, "update questions set category='$_POST[examname]'where id_exam =$id_exam");
    ?>
        <script type="text/javascript">
            window.location = "add_exam_category.php";
        </script>
    <?php
    }
    ?>
</div><!-- .content -->
<?php
include "footer.php";
?>