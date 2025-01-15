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
$businessname = "";
$contact = "";
$address = "";
$city = "";
$id = $_GET['id'];
$sql = "SELECT * FROM partyinfo WHERE id = $id";
$result = mysqli_query($DBCON, $sql) or die("sql failed");
while ($row = mysqli_fetch_array($result)) {
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $businessname = $row['bussiness_name'];
    $contact = $row['contact'];
    $address = $row['address'];
    $city = $row['city'];
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
                                <label class="control-label">Business Name</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="user name" name="businessName" value="<?php echo $businessname ?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter Password" name="contact" value="<?php echo $contact ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">address</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter Password" name="address" value="<?php echo $address ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">address</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter Password" name="city" value="<?php echo $city ?>" />
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
                    $updateBusinessName = mysqli_real_escape_string($DBCON, $_POST['businessName']);
                    $updateContact = mysqli_real_escape_string($DBCON, $_POST['contact']);
                    $updateAddress = mysqli_real_escape_string($DBCON, $_POST['address']);
                    $updateCity = mysqli_real_escape_string($DBCON, $_POST['city']);
                   
                    $sql1 = "UPDATE partyinfo SET first_name = '$updateFirstName', last_name = '$updatelastName', bussiness_name = '$updateBusinessName', contact = '$updateContact', address = '$updateAddress',city = '$updateCity' WHERE id = $id";
                    $res1 = mysqli_query($DBCON, $sql1) or die("Query Failed 2");
                    if ($res1) {
                ?>
                        <script>
                            alert("Update Succesfully")
                            window.location = "add-party.php"
                        </script>
                <?php
                    }
                }
                include "footer.php"
                ?>