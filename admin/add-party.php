<?php
session_start();
if(!isset($_SESSION['admin'])){
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
}
include "header.php";
include "sidebar.php";
include "connection.php";

?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add Party</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="firstName" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lastName" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Business Name</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Business name" name="businessName" required />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter number" name="contact" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea class="span11" name="address" placeholder="Enter Address"required id=""></textarea>
                                    <!-- <input type="text" class="span11"  name="address" /> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">City</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter City" name="city"required />
                                </div>
                            </div>



                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This contact number already Exist</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="save">Save</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px">This party already Exist</p>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Business Name</th>
                                    <th>contact</th>
                                    <th>address</th>
                                    <th>city</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM partyinfo";
                                $result1 = mysqli_query($DBCON, $sql) or die("sql 1 failed");
                                while ($row = mysqli_fetch_array($result1)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $row['first_name'] ?></td>
                                        <td class="center"><?php echo $row['last_name'] ?></td>
                                        <td class="center"><?php echo $row['bussiness_name'] ?></td>
                                        <td class="center"><?php echo $row['contact'] ?></td>
                                        <td class="center"><?php echo $row['address'] ?></td>
                                        <td class="center"><?php echo $row['city'] ?></td>
                                        <td class="center"><a href="edit-party.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="center"><a href="delete-party.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>

                                    </tr>
                                <?php
                                }
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>

                <?php

                if (isset($_POST['save'])) {
                    $businessName = mysqli_real_escape_string($DBCON, $_POST['businessName']);
                    $firstName = mysqli_real_escape_string($DBCON, $_POST['firstName']);
                    $lastName = mysqli_real_escape_string($DBCON, $_POST['lastName']);
                    $contact = mysqli_real_escape_string($DBCON, $_POST['contact']);
                    $address = mysqli_real_escape_string($DBCON, $_POST['address']);
                    $city = mysqli_real_escape_string($DBCON, $_POST['city']);

                    if (isset($_POST['save'])) {
                        $sql3 = "SELECT * FROM partyinfo WHERE contact = $contact";
                        $result3 = mysqli_query($DBCON, $sql3) or die("Query3 Failed");
                        if (mysqli_num_rows($result3) > 0) {
                            ?>
                            <script>
                                let msg =document.getElementById('user')
                                msg.style.display = "block"
                            </script>
                            <?php
                        } else {
                            $sql1 = "INSERT INTO partyinfo VALUES(NULL, '$firstName', '$lastName', '$businessName', '$contact', '$address', '$city')";
                            $res = mysqli_query($DBCON, $sql1) or die("SQL2 Failed");

                            if ($res) {
                ?>
                                <script>
                                    let user1 = document.getElementById('user-success');
                                    user1.innerHTML = "Party added Successful!!!";
                                    user1.style.display = "block";
                                    setTimeout(() => {
                                        window.location = "add-party.php"
                                    }, 1500)
                                </script>
                <?php
                            } else {
                                echo "User registration failed";
                            }
                        }
                    }
                }
                // }

                ?>


                <!--end-main-container-part-->

                <!--Footer-part-->

                <?php
                include "footer.php";
                ?>