<script src="../js/test.js"></script>

<?php
if (isset($_SESSION['num_of_ques'])) {
    $total = $_SESSION['num_of_ques'];
    unset($_SESSION['num_of_ques']);
}
if (isset($_GET['level']) && isset($_GET['chapter'])) {
    $level = $_GET['level'];
    $chapter = $_GET['chapter'];
    $num_of_ques = 1;
    
    echo '<script>update_breadcumb('.$level.', '.$chapter.');</script>';
    echo '<script>update_chapter_title('.$level.', '.$chapter.');</script>';

    $question_table_name = "ques_".$level."_".$chapter;
    $get_question_sets = mysqli_prepare($con, "SELECT * FROM ".$question_table_name);
    mysqli_stmt_execute($get_question_sets);
    mysqli_stmt_bind_result($get_question_sets, $idx, $question, $option1, $option2, $option3, $option4, $ans);

    while (mysqli_stmt_fetch($get_question_sets)) {
        echo '<script>push_question('.$num_of_ques.', "'.$question.'", "'.$option1.'", "'.$option2.'", "'.$option3.'", "'.$option4.'");</script>';
        $num_of_ques++;
    }
    if ($num_of_ques > 1) $_SESSION['num_of_ques'] = $num_of_ques - 1;
    
}
?>