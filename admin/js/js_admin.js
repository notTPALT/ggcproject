var left = (screen.width/2)-(800/2);
var top = (screen.height/2)-(600/2);

$(document).ready(function() {
    $('#btnAddAdmin').click(function(){
        window.open('php/add_admin.php', 'Thêm tài khoản admin', 'height=600,width=800,left='+left+',top='+top);
    });
});

function showAdmin(questionId){
    $.ajax({
            url: 'php/show_admin.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/show_admin.php', 'Xem tài khoản admin', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi hiển thị tài khoản: " + errorThrown);
            }
        });
}

function updateAdmin(questionId){
    $.ajax({
            url: 'php/update_admin.php',
            type: 'POST',
            data: {id: questionId},
            success: function(response) {
                window.open('php/update_user.php', 'Cập nhật tài khoản admin', 'height=600,width=800,left='+left+',top='+top).document.write(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Lỗi khi update câu tài khoản admin: " + errorThrown);
            }
        });
}

function deleteAdmin(questionId) {
    if (confirm("Bạn có chắc muốn xóa tài khoản này?")) {
        $.ajax({
            url: 'php/delete_admin.php',
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