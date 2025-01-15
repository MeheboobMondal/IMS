<?php
session_start();
include "header.php";
include "sidebar.php";
include "connection.php";
?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Add Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add Unit</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Unit Name" name="unitName" required />
                                </div>
                            </div>


                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This user name already Exist</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="save">Save</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px">This user name already Exist</p>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Unit Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM unit";
                                $result1 = mysqli_query($DBCON, $sql);
                                $count = 1;
                                while ($row = mysqli_fetch_array($result1)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td class="text-center"><?php echo $count ?></td>
                                        <td class="center"><?php echo $row['unit_name'] ?></td>

                                        <td class="center"><a href="edit-unit.php?id=<?php echo $row['unit_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td class="center"><a href="delete-unit.php?id=<?php echo $row['unit_id'] ?>"><i class="fa-solid fa-trash"></i></a></td>

                                    </tr>
                                    <?php
                                    $count += 1;
                                }
                                ?>





                            </tbody>
                        </table>
                    </div>
                </div>

                <?php

                if (isset($_POST['save'])) {
                    $unitname = mysqli_real_escape_string($DBCON, $_POST['unitName']);


                    $sql = "SELECT * FROM unit WHERE unit_name = '$unitName'";
                    $result = mysqli_query($DBCON, $sql) or die("SQL failed");
                    if (mysqli_num_rows($result) > 0) {
                ?>
                        <script>
                            let user = document.getElementById('user');
                            user.style.display = "block";
                        </script>
                        <?php
                    } else {
                        $sql1 = "INSERT INTO unit VALUES(NULL, '$unitname')";
                        $res = mysqli_query($DBCON, $sql1) or die("SQL2 Failed");

                        if ($res) {
                        ?>
                            <script>
                                let user1 = document.getElementById('user-success');
                                user1.innerHTML = "User Registration Successful!!!";
                                user1.style.display = "block";
                                setTimeout(() => {
                                    window.location = "add-unit.php"
                                }, 1000)
                            </script>
                <?php
                        } else {
                            echo "User registration failed";
                        }
                    }
                }

                ?>


                <!--end-main-container-part-->

                <!--Footer-part-->

                <?php
                include "footer.php";
                ?>