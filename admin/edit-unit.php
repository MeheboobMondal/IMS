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
$unitname = "";
$id = $_GET['id'];
$sql = "SELECT * FROM unit WHERE unit_id = $id";
$result = mysqli_query($DBCON, $sql) or die("sql failed");
while ($row = mysqli_fetch_array($result)) {
    $unitname = $row['unit_name'];
    
}


?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Update Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Update Unit</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Unit Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="unitName" value="<?php echo $unitname ?>" />
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
                    $updateUnitName = mysqli_real_escape_string($DBCON, $_POST['unitName']);
                    
                    $sql1 = "UPDATE unit SET unit_name = '$updateUnitName' WHERE unit_id = $id";
                    $res1 = mysqli_query($DBCON, $sql1) or die("Query Failed 2");
                    if ($res1) {
                ?>
                        <script>
                            alert("Update Succesfully")
                            window.location = "add-unit.php"
                        </script>
                <?php
                    }
                }
                include "footer.php"
                ?>