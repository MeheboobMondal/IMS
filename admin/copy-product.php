<?php
session_start();
if (!isset($_SESSION['admin'])) {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}

include "./connection.php";
include "header.php";
include "sidebar.php";

?>


<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#" class="tip-bottom"><i class="icon-home"></i>
                Add Own Price</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



                <div class="span12">

                    <div class="widget-content nopadding">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Company Name</th>
                                    <th>Product Name</th>
                                    <th>Product Unit</th>
                                    <th>Packing Size</th>
                                    <th>Product Qty</th>
                                    <th>Price</th>

                                </tr>
                            </thead>
                            <form method="post">
                                <tbody>
                                    <?php
                                    $sql = "SELECT  FROM purchesmaster";

                                    $result = mysqli_query($DBCON, $sql) or die("Select Query Failed");
                                    $count = 1;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $count ?></td>
                                                <td><input style="width: 12vw;" readonly type="text" name="company_name" value="<?php echo $row['company_name'] ?>"></td>
                                                <td><input style="width: 12vw;" readonly type="text" name="product_name" value="<?php echo $row['product_name'] ?>"></td>
                                                <td><input style="width: 2vw;" readonly type="text" name="unit" value="<?php echo $row['unit'] ?>"></td>
                                                <td><input style="width: 2vw;" readonly type="text" name="pack_size" value="<?php echo $row['pack_size'] ?>"></td>
                                                <td><input style="width: 2vw;" readonly type="text" name="quntity" value="<?php echo $row['quntity'] ?>"></td>
                                                <td><input style="width: 5vw;" type="text"  value="<?php echo $row['price'] ?>"><i
                                                        style="margin-left:10px; font-size:17px; cursor:pointer"
                                                        class="fa-solid fa-pen-nib"
                                                        onclick="updatePrice(
        '<?php echo addslashes($row['id']) ?>',
        '<?php echo addslashes($row['price']) ?>'
    )">
                                                    </i></td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <script>
                                            alert("No Product Found!!")
                                        </script>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </form>
                        </table>




                    </div>

                </div>
            </div>


        </div>


    </div>




    <?php
    include "footer.php";

    ?>

    <script>
       const updatePrice = (id,price) => {
    // Calculate total
    // let total = quntity * price;

    // Create an XMLHttpRequest object
    let comp = new XMLHttpRequest();

    // Define what happens on state change
    comp.onreadystatechange = () => {
        if (comp.readyState == 4) {
            if (comp.status == 200) {
                // Successfully processed
                alert(comp.responseText);
                window.location = "copy-product.php"
            } else {
                // Log error or handle failure
                alert(comp.responseText);
                console.error("Error: " + comp.status + " - " + comp.statusText);
            }
        }
    };

    // Encode parameters to handle special characters
    let params = 
        "id=" + encodeURIComponent(id)+
        "&price="+ encodeURIComponent(price) ;
        

    // Open a GET request with the encoded query string
    comp.open("GET", "ajax/add-price.php?" + params, true);

    // Send the request
    comp.send();
};

        
    </script>