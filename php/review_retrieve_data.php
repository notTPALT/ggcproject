<script src="./js/review.js"></script>

<?php
if (isset($_GET['level']) && isset($_GET['chapter'])) {

    $level = $_GET['level'];
    $chapter = $_GET['chapter'];

    // Kiểm tra tính có sẵn của chương và lớp hiện tại
    if (!is_numeric($level) || !is_numeric($chapter) || !ctype_digit($level) || !ctype_digit($chapter) || $level < 10 || $level > 12 || $chapter < 1 || (($chapter == 8 && $level != 12) || $chapter > 8)) {
        echo '<script>location.href = "./page_not_found.php";</script>';
    }
?>

<script>
// Cập nhật tên chương
document.getElementById("chapter-name").innerHTML =
    document.getElementById("_" + <?php echo $level; ?> + "_" + <?php echo $chapter; ?>).innerHTML;

// Thêm event để kiểm tra và thông báo kết quả
document.getElementById("submit").addEventListener("click", () => {
    update_result(<?php echo $level; ?>, <?php echo $chapter; ?>);
});
</script>
<?php
    // Tên của bảng chứa câu hỏi của chương đang ôn tập
    $question_table_name = "ques_".$level."_".$chapter;

    // Truy vấn đưa toàn bộ câu hỏi ôn tập lên giao diện ôn tập
    $get_question_sets = mysqli_prepare($con, "SELECT * FROM ".$question_table_name);
    mysqli_stmt_execute($get_question_sets);
    mysqli_stmt_bind_result($get_question_sets, $index, $question, $option1, $option2, $option3, $option4, $image_path, $ans);
    echo $image_path;
    while (mysqli_stmt_fetch($get_question_sets)) {   
        echo '<script>push_question('.trim($index).', "'.trim($question).'", "'.trim($option1).'", "'.trim($option2).'", "'.trim($option3).'", "'.trim($option4).'", "'.trim($image_path).'");</script>';
    }
}
?>