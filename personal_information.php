<?php
session_start();
echo file_get_contents("./html/header.html");
?>

<form action="#" method="post" name="change_personal_information">
    <label for="" style="font-size: 28px;">Thông tin cá nhân</label>
    <table>
        <tr>
            <td>
                <label for="firstName">First Name:</label>
            </td>
            <td>
                <input type="text" id="firstName" placeholder="Nguyễn Văn Tèo">
            </td>
        </tr>

        <tr>
            <td>
                <label for="lastName">Last Name:</label>
            </td>

            <td>
                <input type="text" id="lastName" size="30" placeholder="123456789">
            </td>
        </tr>

        <tr>
            <td>
                <label for="yourClass">Class:</label>
            </td>

            <td>
                <select name="Class" id="yourClass">
                    <option value="">Hãy chọn lớp </option>
                    <option value="class10">Lớp 10</option>
                    <option value="class11">Lớp 11</option>
                    <option value="class12">Lớp 12</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="gender" style="font-size: 20px;">Gender:</label>
            </td>

            <td>
                <input name="gender" type="radio" value="Nam" checked="true">
                <label for="">Nam</label>

                <input name="gender" type="radio" value="Nữ">
                <label for="">Nữ</label>

                <input name="gender" type="radio" value="Khác">
                <label for="">Khác</label>
            </td>
        </tr>

        <tr>
            <td>
                <label for="mail">Mail:</label>
            </td>

            <td>
                <input type="text" id="mail" size="30" placeholder="nguyenvanteo@gmail.com">
            </td>
        </tr>
    </table>
    <input type="submit" name="change_infor" id="change_infor" value="CHANGE">
</form>



<?php 
echo file_get_contents("./html/footer.html");
require_once("./php/connect_MySQL_n_log.php");
require_once("./php/index_action.php");
require_once("./php/personal_information_action.php");
?>