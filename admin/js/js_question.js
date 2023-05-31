var left = (screen.width/2)-(800/2);
var top = (screen.height/2)-(600/2);

$(document).ready(function() {
    $('#btnAddQuestion').click(function(){
        window.open('php/add_question.php', 'Thêm câu hỏi', 'height=600,width=800,left='+left+',top='+top);
    });
});

function showQuestion(questionId){
    $.ajax({
            url: 'php/show_question.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/show_question.php', 'Xem câu hỏi', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi hiển thị câu hỏi: " + errorThrown);
            }
        });
}

function updateQuestion(questionId){
    $.ajax({
            url: 'php/update_question.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/update_question.php', 'Cập nhật câu hỏi', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi update câu hỏi: " + errorThrown);
            }
        });
}

function deleteQuestion(questionId) {
    if (confirm("Bạn có chắc muốn xóa câu hỏi này?")) {
        $.ajax({
            url: 'php/delete_question.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                // Xóa câu hỏi trên trang web
                $('tr[id="' + questionId + '"]').remove();
                location.reload();
                alert("Xóa câu hỏi thành công");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi xóa câu hỏi: " + errorThrown);
            }
        });
    }
}