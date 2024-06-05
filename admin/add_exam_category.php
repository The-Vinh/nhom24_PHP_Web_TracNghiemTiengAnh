<?php
include "header.php";
include "../connection.php";

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Exam Category</h1>
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
                                    <div class="card-header"><strong>Add Exam Category</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Exam Category</label>
                                            <input type="text" name="examname" placeholder="Add Exam Category" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Exam Time In Minutes</label>
                                            <input type="number" name="examtime" placeholder="Excam Time In Minutes" class="form-control" \>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Add Exam" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Excam Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username admin</th>
                                                    <th scope="col">Exam Name</th>
                                                    <th scope="col">Exam Time</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($link, "select * from exam_category");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $count = $count + 1;
                                                    $id_admin = $row["id_admin"];
                                                    $admin = mysqli_fetch_array(mysqli_query($link, "select username from admin_login where id=$id_admin"));

                                                ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $count; ?></td>
                                                        <td scope="row"><?php echo $admin["username"] . "-" . $id_admin; ?></td>
                                                        <td scope="row"><?php echo $row["category"]; ?></td>
                                                        <td scope="row"><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                        <td scope="row"><a href="edit_exam.php?id_exam=<?php echo $row["id"]; ?>">Edit</a></td>
                                                        <td scope="row"><a href="delete_exam.php?id_exam=<?php echo $row["id"]; ?>">Delete</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
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
        mysqli_query($link, "insert into exam_category values (NULL,'$_SESSION[id_admin]','$_POST[examname]','$_POST[examtime]')")
            or die(mysqli_error($link));
    ?>
        <script type="text/javascript">
            alert("exam added successfully");
            window.location.href = window.location.href;
        </script>
    <?php
    }
    ?>
</div><!-- .content -->
<?php
include "footer.php";
?>