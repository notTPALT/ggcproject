<?php
    $con = mysqli_connect("localhost", "root", "");
    mysqli_query($con, "DROP DATABASE webthi");
    $createTB = "CREATE TABLE user_infos (
        id          integer         not null PRIMARY KEY AUTO_INCREMENT,
        username    char(50) not null UNIQUE,
        pass        char(40) not null,
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

    if(mysqli_query($con, "CREATE DATABASE webthi")) {
        echo 'database created successfully.';
    }

    $conDB = mysqli_connect("localhost", "root", "", "webthi");
    mysqli_query($conDB, "CREATE TABLE server_log (
        username varchar(50),
        events varchar(200),
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    if (!mysqli_query($conDB, $createTB)) {
        echo 'table already exist.';
    } else {
        echo 'table created successfully.';

        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user1', 'user1pass', 'ques1', 'ques1ans', 'user1@gmail.com', '0111111111', 'addrs of user1', true, '2003-01-01', 'user', 'first')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user2', 'user2pass', 'ques2', 'ques2ans', 'user2@gmail.com', '0111111111', 'addrs of user2', false, '2003-02-02', 'user', 'second')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user3', 'user3pass', 'ques3', 'ques3ans', 'user3@gmail.com', '0333333333', 'addrs of user3', false, '2003-03-03', 'user', 'third')");       
                                
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user4', 'user4pass', 'ques4', 'ques4ans', 'user4@gmail.com', '0444444444', 'addrs of user4', true, '2003-04-04', 'user', 'fourth')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user5', 'user5pass', 'ques5', 'ques5ans', 'user5@gmail.com', '0555555555', 'addrs of user5', true, '2003-05-05', 'user', 'fifth')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user6', 'user6pass', 'ques6', 'ques6ans', 'user6@gmail.com', '0666666666', 'addrs of user6', false, '2003-06-06', 'user', 'sixth')"); 
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user7', 'user7pass', 'ques7', 'ques7ans', 'user7@gmail.com', '0777777777', 'addrs of user7', true, '2003-07-07', 'user', 'seventh')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user8', 'user8pass', 'ques8', 'ques8ans', 'user8@gmail.com', '0888888888', 'addrs of user8', false, '2003-08-08', 'user', 'eighth')");
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user9', 'user9pass', 'ques9', 'ques9ans', 'user9@gmail.com', '0999999999', 'addrs of user9', false, '2003-09-09', 'user', 'ninth')");       
    
        mysqli_query($conDB, "INSERT INTO user_infos (username, pass, secure_question, secure_answer, email, phone, addrs, gender, birthdate, fname, lname) VALUES 
                                ('user10', 'user10pass', 'ques10', 'ques10ans', 'user10@gmail.com', '0123456789', 'addrs of user10', true, '2003-10-10', 'user', 'tenth')");
    }

    
    for ($i = 10; $i <= 12; $i++) {
        for ($j = 1; $j <=7; $j++) {
            mysqli_query($conDB, "DROP TABLE ques_".$i."_".$j);
            mysqli_query($conDB, "CREATE TABLE ques_".$i."_".$j." (
                idx INTEGER,
                question varchar(500),
                option1 varchar(500),
                option2 varchar(500),
                option3 varchar(500),
                option4 varchar(500),
                right_ans INTEGER
            )");
            mysqli_query($conDB, "INSERT INTO ques_".$i."_".$j." VALUES (1, 'sample1', 'ans1', 'ans2', 'ans3', 'ans4', 2)");
            mysqli_query($conDB, "INSERT INTO ques_".$i."_".$j." VALUES (2, 'sample2', 'ans5', 'ans6', 'ans7', 'ans8', 4)");
        }
    }
    mysqli_query($conDB, "DROP TABLE ques_12_8");
    mysqli_query($conDB, "CREATE TABLE ques_12_8 (
                idx INTEGER,
                question varchar(500),
                option1 varchar(500),
                option2 varchar(500),
                option3 varchar(500),
                option4 varchar(500),
                right_ans INTEGER
    )");
    mysqli_query($conDB, "INSERT INTO ques_12_8 VALUES (1, 'sample1', 'ans1', 'ans2', 'ans3', 'ans4', 2)");
    mysqli_query($conDB, "INSERT INTO ques_12_8 VALUES (2, 'sample2', 'ans5', 'ans6', 'ans7', 'ans8', 4)");
    mysqli_query($conDB, "INSERT INTO ques_12_8 VALUES (3, 'Tính: 5 + 6 = ?', '11', 'B', '14', '1011', 1)");

    unset($con);
    unset($conDB);
?>