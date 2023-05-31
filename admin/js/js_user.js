var left = (screen.width/2)-(800/2);
var top = (screen.height/2)-(600/2);

$(document).ready(function() {
    $('#btnAddUser').click(function(){
        window.open('php/add_user.php', 'Thêm tài khoản', 'height=600,width=800,left='+left+',top='+top);
    });
});

function showUser(questionId){
    $.ajax({
            url: 'php/show_user.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/show_user.php', 'Xem tài khoản', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi hiển thị tài khoản: " + errorThrown);
            }
        });
}

function updateUser(questionId){
    $.ajax({
            url: 'php/update_user.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/update_user.php', 'Cập nhật tài khoản', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi update tài khoản: " + errorThrown);
            }
        });
}

function deleteUser(questionId) {
    if (confirm("Bạn có chắc muốn xóa tài khoản này?")) {
        $.ajax({
            url: 'php/delete_user.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                // Xóa câu hỏi trên trang web
                $('tr[id="' + questionId + '"]').remove();
                location.reload();
                alert("Xóa tài khoản thành công");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi xóa tài khoản: " + errorThrown);
            }
        });
    }
}