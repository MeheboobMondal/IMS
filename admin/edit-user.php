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
<?php
$firstname = "";
$lastname = "";
$username = "";
$pass = "";
$role = "";
$status = "";
$id = $_GET['id'];
$sql = "SELECT * FROM userregistration WHERE id = $id";
$result = mysqli_query($DBCON, $sql) or die("sql failed");
while ($row = mysqli_fetch_array($result)) {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $username = $row['user_name'];
    $pass = $row['password'];
    $role = $row['role'];
    $status = $row['status'];
}


?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Update User</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Update User</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="firstName" value="<?php echo $firstname ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lastName" value="<?php echo $lastname ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">User Name</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="user name" name="userName" value="<?php echo $username ?>" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="Enter Password" name="pass" value="<?php echo $pass ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Role</label>
                                <div class="controls">
                                    <select name="Role" id="" class="span11">
                                        <option <?php if ($role == "user") {
                                                    echo "selected";
                                                } ?>>user</option>
                                        <option <?php if ($role == "admin") {
                                                    echo "selected";
                                                } ?>>admin</option>
                                    </select>
                                </div>
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="status" id="" class="span11">
                                        <option <?php if ($role == "active") {
                                                    echo "selected";
                                                } ?>>Active</option>
                                        <option <?php if ($role == "inactive") {
                                                    echo "selected";
                                                } ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-actions" style="display:flex;flex-direction:column;align-items:center">
                                <p class="btn-danger pull-left" id="user" style="display:none;padding: 8px 10px;width:20%">This user name already Exist</p>
                                <button type="submit" class="btn btn-success" style="width:30%;padding: 8px 10px;" name="update">Update</button>
                                <p class="btn-success pull-left" id="user-success" style="display:none;padding: 8px 10px;width:20%;margin-top:10px">This user name already Exist</p>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content nopadding">

                    </div>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    $updateFirstName = mysqli_real_escape_string($DBCON, $_POST['firstName']);
                    $updatelastName = mysqli_real_escape_string($DBCON, $_POST['lastName']);
                    $updatepass = mysqli_real_escape_string($DBCON, $_POST['pass']);
                    $updaterole = mysqli_real_escape_string($DBCON, $_POST['Role']);
                    $updateStatus = mysqli_real_escape_string($DBCON, $_POST['status']);
                    $sql1 = "UPDATE userregistration SET first_name = '$updateFirstName', last_name = '$updatelastName', password = '$updatepass', role = '$updaterole', status = '$updateStatus' WHERE id = $id";
                    $res1 = mysqli_query($DBCON, $sql1) or die("Query Failed 2");
                    if ($res1) {
                ?>
                        <script>
                            alert("Update Succesfully")
                            window.location = "add-user.php"
                        </script>
                <?php
                    }
                }
                include "footer.php"
                ?>