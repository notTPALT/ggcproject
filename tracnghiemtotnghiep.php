<?php
	$connect = mysqli_connect("localhost", "root", "", "webthi");

	$numberInforInAPage = 1;
	$numberPage = 40;
	$sql = "SELECT * FROM tbquestion_graduation ORDER BY RAND() LIMIT {$numberPage}";
	if (!isset($_GET['question']))
		$pageSelect = 0;
	else
		$pageSelect = $_GET['question'];

	$createTB = "CREATE TABLE tbtest
	(
		id       INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question VARCHAR(255) NOT NULL, 
        option_a VARCHAR(255) NOT NULL, 
        option_b VARCHAR(255) NOT NULL, 
        option_c VARCHAR(255) NOT NULL, 
        option_d VARCHAR(255) NOT NULL, 
        answer   VARCHAR(2) NOT NULL
	)
	";
	$tmp1 = mysqli_query($connect, $sql);
	
	if (!mysqli_query($connect, $createTB)){
		// Đã tạo bảng
        // Truyền data vào bảng mới
		if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tbtest")) == 0){
			while($res = mysqli_fetch_array($tmp1)){
				$insert = "INSERT INTO tbtest (question, option_a, option_b, option_c, option_d, answer) VALUES ('".$res['question']."', 
				'".$res['option_a']."', '".$res['option_b']."', '".$res['option_c']."', '".$res['option_d']."', '".$res['answer']."')";
				mysqli_query($connect, $insert);
			}
		}
    }
    else{
		// Ngược lại chưa tạo
		// Tạo
        mysqli_query($connect, $createTB);
        // Truyền data vào bảng mới
		if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tbtest")) == 0){
			while($res = mysqli_fetch_array($tmp1)){
				$insert = "INSERT INTO tbtest (question, option_a, option_b, option_c, option_d, answer) VALUES ('".$res['question']."', 
				'".$res['option_a']."', '".$res['option_b']."', '".$res['option_c']."', '".$res['option_d']."', '".$res['answer']."')";
				mysqli_query($connect, $insert);
			}
		}
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    var cur_ques = 1;

    function open_ques(id) {
        let id_cl = parseInt(id);
        if (document.querySelector('input[name="' + cur_ques + '"]:checked') != null) {
            document.getElementById("btn_toQues" + cur_ques).setAttribute("style", "background-color: red;");
        }

        cur_ques = id;

        for (let i = 1; i <= 40; i++) {
            document.getElementById(i).hidden = true;
        }
        document.getElementById(id_cl).hidden = false;
    }

    function next(id) {
        id++;
        document.getElementById(id).click();
        console.log("clicked");
    }

    function prev(id) {
        id--;
        document.getElementById(id).click();
    }
    </script>
</head>

<body>
    <?php
		$sql2 = "SELECT * FROM tbtest"; // LIMIT {$pageSelect}, {} 
		$tmp2 = mysqli_query($connect, $sql2);
		$i = 1;
		while($res = mysqli_fetch_array($tmp2)){ ?>

    <table id="<?php echo $res['id'] ?>" hidden>
        <tr>
            <td><strong>Câu <?php echo $i .". "?></strong><?php echo $res['question'] ?></td>
        </tr>
        <tr>
            <td><input type="radio" id="<?php echo $res['id'] ?>" name="<?php echo $res['id'] ?>"><strong>A.
                </strong><?php echo $res['option_a'] ?></td>
        </tr>
        <tr>
            <td><input type="radio" id="<?php echo $res['id'] ?>" name="<?php echo $res['id'] ?>"><strong>B.
                </strong><?php echo $res['option_b'] ?></td>
        </tr>
        <tr>
            <td><input type="radio" id="<?php echo $res['id'] ?>" name="<?php echo $res['id'] ?>"><strong>C.
                </strong><?php echo $res['option_c'] ?></td>
        </tr>
        <tr>
            <td><input type="radio" id="<?php echo $res['id'] ?>" name="<?php echo $res['id'] ?>"><strong>D.
                </strong><?php echo $res['option_d'] ?></td>
        </tr>
    </table>
    <?php $i++;	} ?>
    <?php
		echo '<button type = "button" onclick = "next()">Next</button>';
		echo '<button type = "button" onclick = "prev()">Prev</button>';
		
		for ($i = 1; $i <= ceil($numberPage / $numberInforInAPage); $i++){
			// echo "<a href='tracnghiemtonghop.php?question={$i}'><button>$i</button></a>";
			echo '<button id="btn_toQues'.$i.'" onclick = "open_ques('.$i.');">'.$i.'</button>';
		}
		$before = (int)$pageSelect - 1;
		$after = (int)$pageSelect + 1;
	?>


</body>

</html>