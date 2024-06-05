<?php
include "header.php";
include "../connection.php";
$id_exam = $_GET["id_exam"];
$exam_category = '';
$res = mysqli_query($link, "select * from exam_category where id = $id_exam");
while ($row = mysqli_fetch_array($res)) {
    $exam_category = $row["category"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Questions inside <?php echo "<font color='red'>" . $exam_category . "</font>"; ?> </h1>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Question Content</label>
                                            <input type="text" name="question" placeholder="Add New Question" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 1</label>
                                            <input type="text" name="opt1" placeholder="Add Option 1" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 2</label>
                                            <input type="text" name="opt2" placeholder="Add Option 2" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 3</label>
                                            <input type="text" name="opt3" placeholder="Add Option 3" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 4</label>
                                            <input type="text" name="opt4" placeholder="Add Option 4" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Answer</label>
                                            <input type="text" name="answer" placeholder="Add Answer" class="form-control" value="">
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="submit" name="submit1" value="Add Question" class="btn btn-success ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Excam Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Username admin</th>
                                                    <th scope="col">Question</th>
                                                    <th scope="col">Option 1</th>
                                                    <th scope="col">Option 2</th>
                                                    <th scope="col">Option 3</th>
                                                    <th scope="col">Option 4</th>
                                                    <th scope="col">Answer</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($link, "select * from questions where category='$exam_category' order by question_no asc");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $count = $count + 1;
                                                    $id_admin = $row["id_admin"];
                                                    $admin = mysqli_fetch_array(mysqli_query($link, "select username from admin_login where id=$id_admin"));
                                                ?>
                                                    <tr>
                                                        <th scope="col"><?php echo $row["question_no"] ?></th>
                                                        <td scope="row"><?php echo $admin["username"] . "-" . $id_admin; ?></td>
                                                        <th scope="col"><?php echo $row["question"] ?></th>
                                                        <th scope="col"><?php echo $row["opt1"] ?></th>
                                                        <th scope="col"><?php echo $row["opt2"] ?></th>
                                                        <th scope="col"><?php echo $row["opt3"] ?></th>
                                                        <th scope="col"><?php echo $row["opt4"] ?></th>
                                                        <th scope="col"><?php echo $row["answer"] ?></th>
                                                        <td scope="row"><a href="edit_question.php?id_question=<?php echo $row["id"] . "&id_exam=" . $id_exam; ?>">Edit</a></td>
                                                        <td scope="row"><a href="delete_question.php?id_question=<?php echo $row["id"] . "&id_exam=" . $id_exam; ?>">Delete</a></td>
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
</div><!-- .content -->
<?php
if (isset($_POST["submit1"])) {
    $loop = 0;
    $cout = 0;
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    } else {
        while ($row = mysqli_fetch_array($res)) {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no ='$loop' where id =$row[id]");
        }
    }
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values(NULL,'$id_exam','$_SESSION[id_admin]','$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        alert("Question add successfully");
        window.location.href = window.location.href;
    </script>
<?php

}

?>

<?php
include "footer.php";
?>