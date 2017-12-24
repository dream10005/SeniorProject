<?php
session_start();
ob_start();
?>
<!doctype html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css">
    <meta charset="utf8_unicode_ci">
 

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    

<title>เข้าสู่ระบบ</title>
</head>

<body style="background-image: url(images/background.jpg); background-size: 100%; background-repeat: no-repeat;">	
        <div class="container">
            <div class="row" style="padding-top: 15%;">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" style="border-radius:5px; border: 1px white solid; align-self: center; overflow: hidden; background-color:#FFFFFF; width:360px; box-shadow: 10px 10px 5px #888888;">
    	            <form class="form-signin" action="" method="post">
                       <h3 style="padding-bottom:8px; padding-top:3px"><center><font color="#5C5C5C">เข้าสู่ระบบ</font></center></h3>
                       <label for="email" class="sr-only">ชื่อผู้ใช้งาน</label>
        	           <input type="email" name="email" class="form-control" placeholder="ชื่อผู้ใช้งาน" required autofocus style="border:2px #D4D6DD solid"><br>
        	           <label for="password" class="sr-only">รหัสผ่าน</label>
        	           <input type="password" name="pass" class="form-control" placeholder="รหัสผ่าน" required style="border:2px #D4D6DD solid; border-radius:4px"><br>
        	           <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="1" style="border-radius:5px; font-size:15px">เข้าสู่ระบบ</button><br>
                    </form>

                    <?php 
                    if(isset($_POST['login'])){
                            updater($_POST['email'],$_POST['pass']);}

                            function updater($email,$pass){
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "SeniorProject";
                        $conn = mysqli_connect($servername, $username, $password, $dbname);


                        $sql = "SELECT * FROM Staff WHERE Email = '$email' AND Password = '$pass'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if(!$row){
                            echo "{$email} {$pass}<br>";
                            echo "Email or Password Wrong";
                        }
                        else{
                            $_SESSION["email"] = $row["Email"];
                            $_SESSION["pass"] = $row["Password"];
                            session_write_close();

                            echo "
                                <html>
                                    <meta http-equiv=\"Refresh\" content=\"0; URL=main_page.php\">
                                </html>
                            "; 
                        }   
                    }
            
                    ?>

	            </div>
            </div> 
        </div>
</body>
</html>


