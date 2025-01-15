<?php 
    include "connection.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - php inventory management system</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/matrix-login.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div id="loginbox">
        <form id="loginform" class="form-vertical" action="" method="post">
            <div class="control-group normal_text">
                <h3>Login Page</h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                        <input type="text"
                            placeholder="Username" name="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                            placeholder="Password" name="password"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <input class="pull-left btn btn-success" type="submit" name="submitt"   />
                

            </div>
        </form>

    </div>
    <?php 

        if(isset($_POST['submitt'])){
           $username = mysqli_real_escape_string($DBCON, $_POST['username']);
           $password = mysqli_real_escape_string($DBCON, $_POST['password']);
           
        
           $sql ="SELECT * FROM UserRegistration ";
           $sql.="WHERE user_name = '$username' and password= '$password' and role = 'user'";
        //    echo $sql;
           $result = mysqli_query($DBCON, $sql) or die("sql can't connect");

           if(mysqli_num_rows($result)>0){
            $_SESSION['user'] = $username;
            ?>
            
            <script type="text/javascript">window.location = "dashboard.php"</script>;
            <?php
           }else{
            echo "Enter valid  username";
           }
        }
    ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/matrix.login.js"></script>
</body>

</html>