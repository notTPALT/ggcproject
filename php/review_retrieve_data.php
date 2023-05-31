<script src="./js/review.js"></script>

<?php
if (isset($_GET['level']) && isset($_GET['chapter'])) {
    $level = $_GET['level'];
    $chapter = $_GET['chapter'];
    $num_of_ques = 1;
    
    // echo '<script>update_breadcumb('.$level.', '.$chapter.');</script>';
    echo '<script>update_chapter_title('.$level.', '.$chapter.');</script>';
    echo '<script>update_button_events("'.$level.'", "'.$chapter.'");</script>';

    $question_table_name = "ques_".$level."_".$chapter;
    $get_question_sets = mysqli_prepare($con, "SELECT * FROM ".$question_table_name);
    mysqli_stmt_execute($get_question_sets);
    mysqli_stmt_bind_result($get_question_sets, $index, $question, $option1, $option2, $option3, $option4, $image_path, $ans);
    echo $image_path;
    while (mysqli_stmt_fetch($get_question_sets)) {   
        echo '<script>push_question('.trim($num_of_ques).', "'.trim($question).'", "'.trim($option1).'", "'.trim($option2).'", "'.trim($option3).'", "'.trim($option4).'", "'.trim($image_path).'");</script>';
        $num_of_ques++;
    }
}
?>