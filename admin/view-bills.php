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
include "./connection.php";

?>


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Sales Report</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            
        <form class="form-inline" action="" name="form1" method="post" style="margin-bottom:10px">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>
        <table class="table table-bordered">
            <tr>
                <th>Sl No</th>
                <th>Bill Generated By</th>
                <th>Full Name</th>
                <th>Bill Type</th>
                <th>Bill Date</th>
                <th>Bill Total</th>
                <th>View Details</th>
            </tr>
            <?php 
            if(isset($_POST['submit1'])){
                $sql = "SELECT * from billheader WHERE (date >= '$_POST[dt]') AND (date <= '$_POST[dt2]')";
                $res = mysqli_query($DBCON, $sql) OR die("Selecting BillHeader Faild");
                if(mysqli_num_rows($res) > 0){
                    $count = 1;
                while($row = mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $_SESSION['admin']?></td>
                    <td><?php echo $row['FullName']?></td>
                    <td><?php echo $row['billType']?></td>
                    <td><?php echo $row['date']?></td>
                    <td id="tt<?php $count?>"><?php echo total($row['id'], $DBCON)?></td>
                    <td><a href="view-bills-detials.php?id=<?php echo $row['id']?>"><i class="fa-solid fa-wand-magic-sparkles"></i></a></td>
                </tr>
                <?php
                $count++;
                }
                }
                else{
                    ?>
                    <script>
                        alert("No Bills Found!!")
                    </script>
                    <?php
                }
            }
            else{
                
                $sql = "SELECT * from billheader ORDER BY id DESC";
                $res = mysqli_query($DBCON, $sql) OR die("Selecting BillHeader Faild");
                $count = 1;
                while($row = mysqli_fetch_array($res)){
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $_SESSION['admin']?></td>
                    <td><?php echo $row['FullName']?></td>
                    <td><?php echo $row['billType']?></td>
                    <td><?php echo $row['date']?></td>
                    <td id="tt<?php $count?>"><?php echo total($row['id'], $DBCON)?></td>
                    <td><a href="view-bills-detials.php?id=<?php echo $row['id']?>"><i class="fa-solid fa-wand-magic-sparkles"></i></a></td>
                </tr>
                <?php
                $count++;
                }
            
            }

            ?>
            
        </table>
    </div>

</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<?php
include "footer.php";
function total($id, $DBCON){
    $total = 0;
    $sql1 = "SELECT * FROM billingdetails WHERE bill_id = '$id'";
    $res2 = mysqli_query($DBCON, $sql1) OR die("total Function Failed");
    while($row = mysqli_fetch_array($res2)){
        $total += $row['price'] * $row['qty'];
    }
    return $total;
}
?>

