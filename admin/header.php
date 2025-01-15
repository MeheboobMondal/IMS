<!DOCTYPE html>
<html lang="en">

<head>
    <title>IMS</title>
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
        #header a:hover{
            background-color: #608BC1;
        }
        .card button{
            padding: 3px 6px;
            /* background-color: rgb(0, 123, 255); */
            color: black;
            border: none;
            outline: none;
            border-radius: 5px ;
            border: 2px solid rgb(0, 123, 255);
        }
        .card button:hover{
            background-color: rgb(0, 123, 255);
            color: white;
            transition: .5s;
        }
        .card button.acti{
            background-color: rgb(0, 123, 255);
            color: #fff;
        }
    </style>
</head>

<body>


    <div id="header">

        <h2 style="color: white;position: absolute; z-index:999">
            <a href="dashboard.php" style="color:white; margin-left: 30px; margin-top: 40px"> IMS</a>
        </h2>
    </div>



    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse" >
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i> <span class="text">Welcome <?php echo $_SESSION['admin'] ?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">

                    <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>


        </ul>
    </div>