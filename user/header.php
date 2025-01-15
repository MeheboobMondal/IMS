
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP IMS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="../width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/fullcalendar.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        .table th,
        .table td {

            text-align: center;

        }
    </style>
</head>

<body>


    <div id="header">

        <h2 style="color: white;position: absolute">
            <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">PHP IMS</a>
        </h2>
    </div>



    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i> <span class="text">Welcome <?php echo $_SESSION['user']?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                   
                    <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>


        </ul>
    </div>