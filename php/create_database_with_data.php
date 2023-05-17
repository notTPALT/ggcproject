<?php
    //Database 'ggcproject'
    $con = mysqli_connect("localhost", "root", "");
    mysqli_query($con, "DROP DATABASE ggcproject");
    if(mysqli_query($con, "CREATE DATABASE ggcproject")) {
        echo 'database created successfully.';
    }

    //Table 'user_infos'
    $conDB = mysqli_connect("localhost", "root", "", "ggcproject");
    $createTB = "CREATE TABLE user_infos (
        id          integer         not null PRIMARY KEY AUTO_INCREMENT,
        username    char(50) not null UNIQUE,
        pass        char(40) not null,
        class       int,
        secure_question  varchar(100),
        secure_answer   varchar(100),   
        email       char(50),
        phone       char(11),
        addrs       varchar(100),
        gender      boolean,
        birthdate   date,
        fname       varchar(20),
        lname       varchar(20)
        )";
    if (!mysqli_query($conDB, $createTB)) {
        echo 'table already exist.';
    } else {
        echo 'table created successfully.';

        //user_infos sample data (can be deleted if not needed)
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user1', 'user1pass', 10, 'ques1', 'ques1ans', 'user1@gmail.com', '0111111111', 'addrs of user1', true, '2003-01-01', 'user', 'first')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user2', 'user2pass', 11, 'ques2', 'ques2ans', 'user2@gmail.com', '0111111111', 'addrs of user2', false, '2003-02-02', 'user', 'second')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user3', 'user3pass', 12, 'ques3', 'ques3ans', 'user3@gmail.com', '0333333333', 'addrs of user3', false, '2003-03-03', 'user', 'third')");       
                                
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user4', 'user4pass', 11, 'ques4', 'ques4ans', 'user4@gmail.com', '0444444444', 'addrs of user4', true, '2003-04-04', 'user', 'fourth')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user5', 'user5pass', 10, 'ques5', 'ques5ans', 'user5@gmail.com', '0555555555', 'addrs of user5', true, '2003-05-05', 'user', 'fifth')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user6', 'user6pass', 11, 'ques6', 'ques6ans', 'user6@gmail.com', '0666666666', 'addrs of user6', false, '2003-06-06', 'user', 'sixth')"); 

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user7', 'user7pass', 12, 'ques7', 'ques7ans', 'user7@gmail.com', '0777777777', 'addrs of user7', true, '2003-07-07', 'user', 'seventh')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user8', 'user8pass', 11, 'ques8', 'ques8ans', 'user8@gmail.com', '0888888888', 'addrs of user8', false, '2003-08-08', 'user', 'eighth')");

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user9', 'user9pass', 10, 'ques9', 'ques9ans', 'user9@gmail.com', '0999999999', 'addrs of user9', false, '2003-09-09', 'user', 'ninth')");       

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, class, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user10', 'user10pass', 12, 'ques10', 'ques10ans', 'user10@gmail.com', '0123456789', 'addrs of user10', true, '2003-10-10', 'user', 'tenth')");
    }

    //Table mock_exam_history
    mysqli_query($conDB, "CREATE TABLE mock_exam_history (
        username char(50),
        correct int,
        incorrect int,
        unanswered int,
        point_total char(10)
    )");

    //Table server_log to store users' activities
    mysqli_query($conDB, "CREATE TABLE server_log (
        username varchar(50),
        events varchar(200),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");


    //Series of tables containing questions
    for ($i = 10; $i <= 12; $i++) {
        for ($j = 1; $j <=7; $j++) {
            mysqli_query($conDB, "DROP TABLE ques_".$i."_".$j);
            mysqli_query($conDB, "CREATE TABLE ques_".$i."_".$j." (
                idx INTEGER,
                question nvarchar(500),
                option1 nvarchar(500),
                option2 nvarchar(500),
                option3 nvarchar(500),
                option4 nvarchar(500),
                image_path char(254),
                right_ans INTEGER
            )");
            
            $ques_index = 1;
            $fh = fopen("../resources/txt/ques_".$i."_".$j.".txt", 'r');
            while ($question = fgets($fh)) {
                $answer1 = fgets($fh);
                $answer2 = fgets($fh);
                $answer3 = fgets($fh);
                $answer4 = fgets($fh);
                $image_path = fgets($fh);
                $correct_ans = fgets($fh);
                mysqli_query($conDB, "INSERT INTO ques_".$i."_".$j." VALUES 
                    ($ques_index, '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$image_path', $correct_ans)");
                $ques_index++; 
            }
            fclose($fh);
        }
    }
    mysqli_query($conDB, "DROP TABLE ques_12_8");
    mysqli_query($conDB, "CREATE TABLE ques_12_8 (
        idx INTEGER,
        question nvarchar(500),
        option1 nvarchar(500),
        option2 nvarchar(500),
        option3 nvarchar(500),
        option4 nvarchar(500),
        image_path char(254),
        right_ans INTEGER
    )");
    
    $ques_index = 1;
    $fh = fopen("../resources/txt/ques_12_8.txt", 'r');
    while ($question = fgets($fh)) {
        $answer1 = fgets($fh);
        $answer2 = fgets($fh);
        $answer3 = fgets($fh);
        $answer4 = fgets($fh);
        $image_path = fgets($fh);
        $correct_ans = fgets($fh);
        mysqli_query($conDB, "INSERT INTO ques_12_8 VALUES 
            ($ques_index, '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$image_path', $correct_ans)");
        $ques_index++;
    }
    fclose($fh);

    //Table 'tbquestion_graduation' containing mock exam questions
    mysqli_query($conDB, "CREATE TABLE tbquestion_graduation
    (
        id       INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question VARCHAR(255) NOT NULL, 
        option_a VARCHAR(255) NOT NULL, 
        option_b VARCHAR(255) NOT NULL, 
        option_c VARCHAR(255) NOT NULL, 
        option_d VARCHAR(255) NOT NULL, 
        answer   VARCHAR(2) NOT NULL 
    )");

    mysqli_query($conDB, "INSERT INTO tbquestion_graduation (question, option_a, option_b, option_c, option_d, answer) VALUES
    ('Phương trình dao động của một vật dao động điều hòa là: x = - 5cos(10πt + π/6) cm. Chọn đáp án đúng:',
    'Biên độ A = -5 cm' ,'Pha ban đầu φ = π/6 (rad)' ,'Chu kì T = 0,2 s' ,'Li độ ban đầu x0 = 5 cm' ,'c' ),
    ('Trong chân không, ánh sáng màu tím có bước sóng nằm trong khoảng',
     'từ 380 mm đến 440 mm.', 'từ 380 nm đến 440 nm.', 'từ 380 cm đến 440 cm.', 'từ 380 pm đến 440 pm.', 'b'),
    ('Bộ phận nào sau đây là một trong ba bộ phận chính của máy quang phổ lăng kính',
     'Mạch biến điệu.', 'Mạch tách sóng.', 'Pin quang điện.', 'Hệ tán sắc.', 'd'),
    ('Tia nào sau đây thường được sử dụng trong các bộ điều khiển từ xa để điều khiển hoạt động của tivi, quạt điện, máy điều hòa nhiệt độ?', 'Tia γ.', 'Tia tử ngoại.', 'Tia X.', 'Tia hồng ngoại.', 'd'),
    ('Khi một con lắc lò xo đang dao động tắt dần do tác dụng của lực ma sát thì cơ năng của con lắc chuyển hóa dần dần thành', 'điện năng.', 'hóa năng.', 'quang năng.', 'nhiệt năng.', 'd'),
    ('Đặt một hiệu điện thế không đổi U vào hai đầu một đoạn mạch tiêu thụ điện năng thì cường độ dòng điện trong đoạn mạch là I. Trong khoảng thời gian t, điện năng tiêu thụ của đoạn mạch là A. Công thức nào sau đây đúng?', 'A = U.I.t', 'A = U.I / t', 'A = U.t.t / I', 'A = U.I.t.t', 'a'),
    ('Theo thuyết tương đối, một vật đứng yên có năng lượng nghỉ E0 . Khi vật chuyển động thì có năng lượng toàn phần là E, động năng của vật lúc này là', 'Wđ = E - E0.', 'Wđ = E + E0.', 'Wđ = 1/2.(E + E0).', 'Wđ = 1/2.(E - E0).', 'a'),
    ('Sự phát quang của nhiều chất rắn có đặc điểm là ánh sáng phát quang có thể kéo dài một khoảng thời gian nào đó sau khi tắt ánh sáng kích thích. Sự phát quang này gọi là', 'sự lân quang.', 'sự nhiễu xạ ánh sáng.', 'sự giao thoa ánh sáng.', 'sự tán sắc ánh sáng.', 'a'),
    ('Trong hệ SI, đơn vị của điện tích là', 'culông (C).', 'vôn trên mét (V/m).', 'fara (F).', 'vôn (V).', 'a'),
    ('Trên một sợi dây đang có sóng dừng. Sóng truyền trên dây có bước sóng λ. Khoảng cách giữa hai bụng sóng liên tiếp là', 'λ/4.', 'λ.', 'λ/2.', '2λ.', 'c'),
    ('Máy phát điện xoay chiều một pha được cấu tạo bởi hai bộ phận chính là', 'cuộn sơ cấp và cuộn thứ cấp.', 'phần cảm và phần ứng.', 'cuộn thứ cấp và phần cảm.', 'cuộn sơ cấp và phần ứng.', 'b'),
    ('Đặc trưng nào sau đây không phải là đặc trưng vật lí của âm?', 'Cường độ âm.', 'Tần số âm.', 'Độ to của âm.', 'Mức cường độ âm.', 'c'),
    ('Hiện tượng nào sau đây được ứng dụng để luyện nhôm?', 'Hiện tượng nhiệt điện.', 'Hiện tượng đoản mạch.', 'Hiện tượng điện phân.', 'Hiện tượng siêu dẫn.', 'c'),
    ('Trong sự truyền sóng cơ, tần số dao động của một phần tử môi trường có sóng truyền qua được gọi là', 'tốc độ truyền sóng.', 'năng lượng sóng.', 'tần số của sóng.', 'biên độ của sóng.', 'c'),
    ('Dùng thuyết lượng tử áng sáng có thể giải thích được', 'hiện tượng nhiễu xạ ánh sáng.', 'định luật về giới hạn quang điện.', 'hiện tượng giao thoa ánh sáng.', 'định luật phóng xạ.', 'b'),
    ('Khi nói về sóng điện từ, phát biểu nào sau đây SAI?', 'Sóng điện từ không lan truyền được trong điện môi.', 'Sóng điện từ là sóng ngang.', 'Sóng điện từ mang năng lượng.', 'Sóng điện từ có thể bị phản xạ, khúc xạ như ánh sáng.', 'a'),
    ('Trong thí nghiệm giao thoa sóng ở mặt chất lỏng, tại hai điểm S1 và S2 có hai nguồn dao động cùng pha theo phương thẳng đứng, phát ra hai sóng kết hợp có bước sóng 1,2 cm. Trên đoạn thẳng S1S2 khoảng cách giữa hai cực tiểu giao thoa liên tiếp bằng', '0,3 cm.', '0,6 cm.', '1,2 cm.', '2,4 cm.', 'b'),
    ('Trong thí nghiệm Y-âng về giao thoa ánh sáng, nguồn sáng phát ra ánh sáng đơn sắc có bước sóng λ. Trên màn quan sát, vân sáng bậc 5 xuất hiện tại vị trí có hiệu đường đi của ánh sáng từ hai khe đến đó bằng', '5,5λ.', '5λ.', '4,5λ.', '4λ.', 'b'),
    ('Một chất điểm dao động với phương trình x = 8cos5t (cm) (t tính bằng s). Tốc độ chất điểm khi đi qua vị trí cân bằng là', '100 cm/s.', '20 cm/s.', '40 cm/s.', '200 cm/s.', 'c'),
    ('Một máy biến áp lí tưởng có số vòng dây của cuộn sơ cấp và số vòng dây của cuộn thứ cấp lần lượt là N1 = 1100 và N2. Đặt điện áp xoay chiều có giá trị hiệu dụng 220 V vào hai đầu cuộn sơ cấp thì điện áp hiệu dụng giữa hai đầu cuộn thứ cấp để hở là 6 V. Giá trị của N2 là', '30 vòng.', '300 vòng.', '120 vòng.', '60 vòng.', 'a'),
    ('Xét nguyên tử hidro theo mẫu nguyên tử Bo. Khi nguyên tử chuyển từ trạng thái dừng có năng lượng - 0,85 eV sang trạng thái dừng có năng lượng - 13,6 eV thì nó phát ra một photon có năng lượng là', '13,6 eV.', '14,4 eV.', '12,75 eV.', '0,85 eV.', 'c'),   
    ('Cho một vòng dây dẫn kín dịch chuyển ra xa một nam châm thì trong vòng dây xuất hiện một suất điện động cảm ứng. Đây là hiện tượng cảm ứng điện từ. Bản chất của hiện tượng cảm ứng điện từ này là quá trình chuyển hóa', 'điện năng thành hóa năng.', 'cơ năng thành điện năng.', 'cơ năng thành quang năng.', 'điện năng thành quang năng.', 'b'),
    ('Trong thí nghiệm Y-âng về giao thoa ánh sáng, hai khe hẹp cách nhau 0,6 mm và cách màn quan sát 1,2 m. Chiếu sáng các khe bằng ánh sáng đơn sắc có bước sóng λ (380 nm &lt; λ &lt; 760 nm). Trên màn, điểm M cách vân trung tâm 2,5 mm là vị trí của một vân tối. Giá trị của λ gần nhất với giá trị nào sau đây?', '575 nm.', '505 nm.', '475 nm.', '425 nm.', 'b'),
    ('Một vật dao động tắt dần có các đại lượng giảm liên tục theo thời gian là', 'biên độ và năng lượng.', 'li độ và tốc độ.', 'biên độ và tốc độ.', 'biên độ và gia tốc.', 'a'),
    ('Dao động của con lắc đồng hồ là', 'dao động điện từ.', 'dao động tắt dần.', 'dao động cưỡng bức.', 'dao động duy trì.', 'd'),   
    ('Một vật nhỏ khối lượng 100 g dao động điều hòa theo phương trình x = 10cos6t (x tính bằng cm, t tính bằng s). Cơ năng dao động của vật này bằng', '36 mJ.', '18 mJ.', '18 J.', '36 J.', 'b'),
    ('Hai dao động điều hòa cùng phương, cùng tần số, lệch pha nhau 0,5π, có biên độ lần lượt là 8 cm và 15 cm. Dao động tổng hợp của hai dao động này có biên độ bằng', '23 cm.', '7 cm.', '11 cm.', '17 cm.', 'd'),
    ('Phát biểu nào sau đây là đúng khi nói về sóng cơ?', 'Bước sóng là khoảng cách giữa hai điểm gần nhau nhất trên cùng một phương truyền sóng mà dao động tại hai điểm đó cùng pha.', 'Sóng cơ truyền trong chất lỏng luôn là sóng ngang.', 'Sóng cơ truyền trong chất rắn luôn là sóng dọc.', 'Bước sóng là khoảng cách giữa hai điểm trên cùng một phương truyền sóng mà dao động tại hai điểm đó cùng pha.', 'a'),
    ('Hai âm cùng độ cao là hai âm có cùng', 'cường độ âm.', 'mức cường độ âm.', 'biên độ.', 'tần số', 'd'),
    ('Phát biểu nào sau đây đúng? Cường độ dòng điện xoay chiều trong một đoạn mạch là', 'Tần số dòng điện là 100 Hz.', 'Cường độ dòng điện sớm pha π/3 so với điện áp giữa hai đầu đoạn mạch.', 'Cường độ hiệu dụng của dòng điện là 2 A.', 'Cường độ dòng điện đổi chiều 50 lần trong một giây.', 'c'),
    ('Phương trình dao động của một vật dao động điều hòa là: x = - 5cos(10πt + π/6) cm. Chọn đáp án đúng:', 'Biên độ A = -5 cm', 'Pha ban đầu φ = π/6 (rad)', 'Chu kì T = 0,2 s', 'Li độ ban đầu x0 = 5 cm', 'c'),
    ('Một vật dao động điều hòa với phương trình: x = 6cos2(4πt + π/6) cm. Quãng đường vật đi được trong 0,125 s kể từ thời điểm t = 0 là:', '6cm', '4,5cm', '7,5cm', '9 cm', 'a'),
    ('Một vật dao động điều hoà với chu kì T, biên độ bằng 5 cm. Quãng đường vật đi được trong 2,5T là:', '10 cm', '50 cm', '45 cm', '25 cm', 'b'),
    ('Một chất điểm dao động điều hoà với chu kì 1,25 s và biên độ 5 cm. Tốc độ lớn nhất của chất điểm là:', '25,1 cm/s', '2,5 cm/s', '63,5 cm/s', '6,3 cm/s', 'a'),
    ('Một vật nhỏ dao động điều hòa trên trục Ox theo phương trình x = Acos (ωt + φ). Vận tốc của vật có biểu thức là:', 'v = ωAcos (ωt +φ)', '-ωAsin (ωt +φ)', '-Asin (ωt +φ)', 'ωAsin (ωt +φ)', 'b'),
    ('Một chất điểm dao động điều hòa dọc trục Ox với phương trình x = 10cos2πt (cm). Quãng đường đi được của chất điểm trong một chu kì dao động là:', '10 cm', '30cm', '40 cm', '20 cm', 'c'),
    ('Một vật nhỏ dao động điều hòa theo phương trình x = Acos10t (t tính bằng s). Tại t = 2 s, pha của dao động là:', '10 rad', '40 rad', '20 rad', '5 rad', 'c'),
    ('Một vật dao động điều hòa theo phương trình x = 5cosπt (cm,s). Tốc độ của vật có giá trị cực đại là bao nhiêu?', '-5π cm/s.', '5π cm/s.', '-5 cm/s.', '5 cm/s.', 'b'),
    ('Chọn một chất điểm dao động điều hòa trên đoạn thẳng MN dài 6 cm với tần số 2 Hz. Chọn gốc thời gian là lúc chất điểm có li độ 3√3/2 cm và chuyển động ngược chiều với chiều dương mà mình đã chọn. Phương trình dao động của chất điểm là:', 'x = 3sin(4πt + π/3) cm', 'x = 3sin(4πt + π/3) cm',  'x = 3sin(4πt + π/6) cm', 'x = 3cos(4πt + 5π/6) cm', 'b'),
    ('Vật dao động điều hòa theo phương trình x = Acosωt (cm). Sau khi dao động được 1/6 chu kì vật có li độ √3/2 cm. Biên độ dao động của vật là:', '2√2 cm', '√3 cm', '2 cm', '4√2 cm' , 'b'),
    ('Một vật dao động điều hòa với phương trình dạng cos. Chọn gốc tính thời gian khi vật đổi chiều chuyển động và khi đó gia tốc của vật đang có giá trị dương. Pha ban đầu là:', '-π/2', '-π/3', 'π', 'π/2', 'c'),
    ('Một vật dao động điều hòa với vận tốc góc 5 rad/s. Khi vật đi qua li độ 5 cm thì nó có tốc độ là 25 cm/s. Biên độ dao động của vật là:', '5√2 cm', '10 cm', '5.24 cm', '5√3 cm', 'a'),
    ('Một vật dao động điều hòa với biên độ 5 cm. Khi vật có tốc độ 10 cm/s thì có gia tốc 40√3 cm/s2. Tần số góc của dao động là:', '1 rad/s', '4 rad/s', '2 rad/s', '8 rad/s', 'b'),
    ('Một học sinh làm thí nghiệm đo gia tốc trọng trường bằng con lắc đơn. Khi đo chiều dài con lắc bằng một thước có chia độ đến milimet và kết quả đo 3 lần chiều dài sợi dây đều cho cùng một kết quả là 2.345m. Lấy sai số dụng cụ là một độ chia nhỏ nhất. Kết quả đo được viết là:', 'L = (2,345 ± 0,005) m.', 'L = (2345 ± 0,001) mm.', 'L = (2,345 ± 0,001) m.', 'L = (2,345 ± 0,0005) m.', 'c'),
    ('Một con lắc đơn dao động với biên độ góc nhỏ ( enpha 0 < 15°). Ý nào sau đây là sai đối với chu kì của con lắc?', 'Chu kì phụ thuộc chiều dài con lắc.', 'Chu kì phụ thuộc gia tốc trọng trường nơi có con lắc.', 'Chu kì phụ thuộc biên độ dao động.', 'Chu kì không phụ thuộc vào khối lượng của con lắc.', 'c'),
    ('Khi đưa một con lắc đơn lên cao theo phương thẳng đứng (coi chiều dài của con lắc không đổi) thì tần số dao động điều hoà của nó sẽ:', 'tăng vì tần số dao động điều hoà của nó tỉ lệ nghịch với gia tốc trọng trường.', 'giảm vì gia tốc trọng trường giảm theo độ cao.', 'không đổi vì chu kỳ dao động điều hoà của nó không phụ thuộc vào gia tốc trọng trường.', 'tăng vì chu kỳ dao động điều hoà của nó giảm.', 'b'),
    ('Một con lắc đơn dao động với biên độ góc nhỏ. Chu kì của con lắc không thay đổi khi:', 'thay đổi chiều dài con lắc.', 'thay đổi gia tốc trọng trường.', 'tăng biên độ góc đến 30°.', 'thay đổi khối lượng của con lắc.', 'd'),
    ('Một con lắc đơn dao động điều hòa với chu kì T = 4 s, thời gian để con lắc đi từ vị trí cân bằng đến vị trí có li độ cực đại là', '2 s.', '1,5 s.', '1 s.', '1 s.', 'c'),
    ('Trong quá trình dao động điều hòa của con lắc đơn. Nhận định nào sau đây là sai ?', 'Khi quả nặng ở điểm giới hạn thì lực căng dây treo có độ lớn nhỏ hơn trọng lượng của vật.', 'Độ lớn của lực căng dây treo con lắc luôn lớn hơn trọng lượng vật.', 'Chu kỳ dao động của con lắc không phụ thuộc vào biên độ dao động của nó.', 'Khi khi góc hợp bởi phương dây treo con lắc và phương thẳng đứng giảm và tốc độ của quả năng sẽ tăng.', 'b'),
    ('Con lắc đơn dao động nhỏ trong một điện trường đều có phương thẳng đứng hướng xuống và vật nặng có điện tích dương với biên độ A và chu kỳ dao động T. Vào thời điểm vật đi qua vị trí cân bằng thì đột ngột tắt điện trường. Chu kỳ và biên độ của con lắc khi đó thay đổi như thế nào? Bỏ qua mọi lực cản.', 'Chu kỳ tăng; biên độ giảm.', 'Chu kỳ giảm biên độ giảm.', 'Chu kỳ giảm; biên độ tăng.', 'Chu kỳ tăng; biên độ tăng.', 'd')
    ");
    
    unset($con);
    unset($conDB);
?>