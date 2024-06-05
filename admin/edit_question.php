<?php
include "header.php";
include "../connection.php";
$count = '';
$question = '';
$opt1 = '';
$opt2 = '';
$opt3 = '';
$opt4 = '';
$answer = '';
$id_question = $_GET["id_question"];
$id_exam = $_GET["id_exam"];
$res = mysqli_query($link, "select * from questions where id=$id_question");
while ($row = mysqli_fetch_array($res)) {
    $question = $row["question"];
    $opt1 = $row["opt1"];
    $opt2 = $row["opt2"];
    $opt3 = $row["opt3"];
    $opt4 = $row["opt4"];
    $answer = $row["answer"];
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit question</h1>
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
                        <form action="" method="post" name="form1">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-header"><strong>Edit Questions</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Question Content</label>
                                            <input value="<?php echo $question ?>" type="text" name="question" placeholder="Add New Question" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 1</label>
                                            <input value="<?php echo $opt1 ?>" type=" text" name="opt1" placeholder="Add Option 1" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 2</label>
                                            <input value="<?php echo $opt2 ?>" type=" text" name="opt2" placeholder="Add Option 2" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 3</label>
                                            <input value="<?php echo $opt3 ?>" type=" text" name="opt3" placeholder="Add Option 3" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Option 4</label>
                                            <input value="<?php echo $opt4 ?>" type=" text" name="opt4" placeholder="Add Option 4" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Answer</label>
                                            <input value="<?php echo $answer ?>" ype=" text" name="answer" placeholder="Add Answer" class="form-control" value="">
                                        </div>
                                        <div class="form-group d-flex justify-content-center">
                                            <input type="submit" name="submit1" value="Update Question" class="btn btn-success ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php
if (isset($_POST["submit1"])) {
    mysqli_query($link, "update questions set question='$_POST[question]', opt1='$_POST[opt1]', opt2='$_POST[opt2]', opt3='$_POST[opt3]', opt4='$_POST[opt4]', answer='$_POST[answer]'");
?>
    <script type="text/javascript">
        window.location = "add_questions.php?id_exam=<?php echo $id_exam ?>";
    </script>
<?php
}
?>
<?php
include "footer.php";
?>