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
 // Start output buffering
// session_start();

$bill_id = 0;
$sql = "SELECT * FROM billheader ORDER BY id DESC LIMIT 1";
$res = mysqli_query($DBCON, $sql) or die("Query Failed 01");
while($row = mysqli_fetch_array($res)){
    $bill_id = $row['id'];
}

function generateBillNo($bill_id){
    if($bill_id == ""){
        $id1 = 0;
    }
    else{
        $id1 = $bill_id;
    }
    $id1 += 1;
    $len = strlen($id1);
    if($len == "1"){
        $id1 = "0000".$id1;
    }
    else if($len == "2"){
        $id1 = "000".$id1;
    }
    else if($len == "3"){
        $id1 = "00".$id1;
    }
    else if($len == "4"){
        $id1 = "0".$id1;
    }
    return $id1;

   
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    productLoad();
</script>
<div id="content">
<form name="form1" action="" method="post" class="form-horizontal nopadding">

    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                Sale a products</a></div>
    </div>

    <div class="container-fluid">
            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Sale a Products</h5>
                        </div>

                        <div class="widget-content nopadding">


                            <div class=" span4">
                                <br>

                                <div>
                                    <label>Full Name</label>
                                    <input type="text" class="span12" name="full_name" required>
                                </div>
                            </div>

                            <div class="span3">
                                <br>

                                <div>
                                    <label>Bill Type</label>
                                    <select class="span12" name="bill_type_header">
                                        <option>Cash</option>
                                        <option>Debit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="span2">
                                <br>

                                <div>
                                    <label>Date</label>
                                    <input type="text" class="span12" name="bill_date"
                                        value="<?php echo date("Y-m-d") ?>"
                                        readonly>
                                </div>
                            </div><div class="span2">
                                <br>

                                <div>
                                    <label>Bill No</label>
                                    <input type="text" class="span12" name="billNo"
                                        value="<?php echo generateBillNo($bill_id)?>"
                                        readonly>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <!-- new row-->
            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">


                    <center>
                        <h4>Select A Product</h4>
                    </center>


                    <div class="span2">
                        <div>
                            <label>Product Company</label>
                            <select class="span11" name="company_name" id="company_name"
                                onchange="select_company(this.value)">
                                <option>Select</option>
                                <?php
                                $res = mysqli_query($DBCON, "select * from company");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<option>";
                                    echo $row["company_name"];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="span2">
                        <div>
                            <label>Product Name</label>
                            <div id="product_name_div">
                                <select class="span11">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="span1">
                        <div>
                            <label>Unit</label>
                            <div id="unit_div">
                                <select class="span11">
                                    <option>Select</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="span2">
                        <div>
                            <label>Packing Size</label>
                            <div id="packing_size_div">
                                <select class="span11">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="span1">
                        <div>
                            <label>Price</label>
                            <input type="text" class="span11" name="price" id="price" readonly value="0">
                        </div>
                    </div>

                    <div class="span1">
                        <div>
                            <label>Enter Qty</label>
                            <input type="text" class="span11" name="qty" id="qty" autocomplete="off" onKeyup="totalTotal(this.value)">
                        </div>
                    </div>



                    <div class="span1">
                        <div>
                            <label>Total</label>
                            <input type="text" class="span11" name="total" id="total" value="0" readonly>
                        </div>
                    </div>

                    <div class="span1">
                        <div>
                            <label>&nbsp</label>
                            <input type="button" class="span11 btn btn-success" value="Add" onclick="addSession()">
                        </div>
                    </div>

                </div>
            </div>

            <!-- end new row-->


        </>




        <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
            <div class="span12" id="">
                <center>
                    <h4>Taken Products</h4>
                </center>
                <div id="total_product"></div>



                <h4>
                    <div style="float: right" ><span style="float:left;">Total:&#8377;</span><span id="jarvis"style="float: left"></span></div>
                </h4>


                <br><br><br><br>

                

            </div>
            <center>
                    <input type="submit" value="generate bill" name="submit1"class="btn btn-success">
                </center>
        </div>
    </div>
</form>
</div>

<script type="text/javascript">
    const select_company = (company_name) => {
        let comp = new XMLHttpRequest()
        comp.onreadystatechange = () => {
            if (comp.readyState == 4 && comp.status == 200) {
                let change = document.getElementById('product_name_div')
                change.innerHTML = comp.responseText
            } else {
                let change = document.getElementById('product_name_div')
                change.innerHTML = "error"
            }
        }
        comp.open("GET", "ajax/load-product.php?comName=" + company_name, true);
        comp.send()
    }
    const unit = (pr_name) => {
        let comp = new XMLHttpRequest()
        comp.onreadystatechange = () => {
            if (comp.readyState == 4 && comp.status == 200) {
                let change = document.getElementById('unit_div')
                change.innerHTML = comp.responseText
            } else {
                let change = document.getElementById('unit_div')
                change.innerHTML = "error"
            }
        }
        comp.open("GET", "ajax/load-unit.php?pn=" + pr_name, true);
        comp.send()
    }
    const packSize = (unit_name, pr_name) => {
        let comp = new XMLHttpRequest()
        let changeOne = document.getElementById('packing_size_div')
        comp.onreadystatechange = () => {
            if (comp.readyState == 4 && comp.status == 200) {
                changeOne.innerHTML = comp.responseText
            } else {
                // let change =document.getElementById('packing_size_div')
                changeOne.innerHTML = "error"
            }
        }
        comp.open("GET", "ajax/load-packSize.php?un=" + unit_name + "&pn=" + pr_name, true);
        comp.send()


        changeOne.addEventListener("change", () => {
            // setTimeout(()=>{
            loadPrice(changeOne.firstChild.value)
            // },1000)
        })

    }
    const loadPrice = (packing_size) => {
        let company = document.getElementById('company_name').value
        let product = document.getElementById('pr').value
        let unit = document.getElementById('un').value
        let packSize = packing_size

        const price = new XMLHttpRequest()
        price.onreadystatechange = () => {
            if (price.readyState == 4 && price.status == 200) {
                document.getElementById('price').value = price.responseText
            } else {
                document.getElementById('price').value = "404 error"

            }
        }
        price.open("GET", "ajax/load-price.php?comp=" + company + "&pro=" + product + "&un=" + unit + "&packSize=" + packSize, true)
        price.send()
    }
    const totalTotal = (qty) => {

        if (qty > 0) {
            document.getElementById('total').value = eval(document.getElementById('price').value) * eval(qty)
        } else {
            document.getElementById('total').value = "Enter Qty"
            // alert = "enter quntity"
        }
    }
    const addSession = () => {
        let company = document.getElementById('company_name').value
        let product = document.getElementById('pr').value
        let unit = document.getElementById('un').value
        let packing_size = document.getElementById('valo').value
        let price = document.getElementById('price').value
        let quntity = document.getElementById('qty').value
        let total = document.getElementById('total').value

        let comp = new XMLHttpRequest()
        // let changeOne =document.getElementById('packing_size_div')
        comp.onreadystatechange = () => {
            if (comp.readyState == 4 && comp.status == 200) {
                // changeOne.innerHTML = comp.responseText
                if (comp.responseText == "") {
                     alert(comp.responseText)
                     load_billing_product()
                } else {
                    // alert(comp.responseText)
                    alert(comp.responseText)
                    load_billing_product()
                }
            } else {
                // let change =document.getElementById('packing_size_div')
                changeOne.innerHTML = "error"
            }
        }
        comp.open("GET", "ajax/save-in-session.php?comp=" + company + "&pn=" + product + "&un=" + unit + "&ps=" + packing_size + "&price=" + price + "&qy=" + quntity + "&total=" + total, true);
        comp.send()
    }



    
    const editQty = (qty1, product_company1, product_name1, product_unit1, packing_size1, price1) => {
        let company = product_company1;
        let product= product_name1;
        let unit = product_unit1;
        let packing_size = packing_size1;
        let price= price1;
        let qty = qty1 
        let total = qty * price; // Use correct variable name

        let comp = new XMLHttpRequest();
        comp.onreadystatechange = () => {
            if (comp.readyState == 4 && comp.status == 200) {
                if (comp.responseText == "") {
                    // If no response text, proceed as successful addition
                    load_billing_product(); // Reload to reflect changes

                } else {
                    // Show response as alert if there is any response text
                    alert(comp.responseText);
                    load_billing_product();
                }
            } else {
                // Handle error display, set to an actual element instead of changeOne
                console.log(comp.responseText)
            }
        };

        comp.open(
            "GET",
            "ajax/update-in-session.php?comp=" + company +
            "&pn=" + product +
            "&un=" + unit +
            "&ps=" + packing_size +
            "&price=" + price +
            "&qy=" + qty +
            "&total=" + total,
            true
        );
        comp.send();
    };
    

    const deletepro = (sessionId) => {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) { // Ensure request is complete
            if (xhr.status === 200) { // HTTP success
                // Check the server response
                if (xhr.responseText.trim() === "") {
                    // If response is empty, deletion is successful
                    load_billing_product(); // Reload billing product list
                } else {
                    // Display the response text as an alert for feedback
                    alert(xhr.responseText);
                }
            } else {
                // Handle non-200 status codes
                alert("An error occurred while processing your request. Please try again.");
            }
        }
    };

    // Send GET request with the session ID
    xhr.open("GET", `ajax/delete-in-session.php?id=${encodeURIComponent(sessionId)}`, true);
    xhr.send();
};



    
    // window.onload = function() {
    //     productLoad();
    // };
   
    function load_billing_product(){
    // Retrieve input values
    // let company = document.getElementById('company_name').value;
    // let product = document.getElementById('pr').value;
    // let unit = document.getElementById('un').value;
    // let packing_size = document.getElementById('valo').value;
    // let price1 = document.getElementById('price').value;
    // let quntity = document.getElementById('qty').value;
    // let total = document.getElementById('total').value;

    // Create XMLHttpRequest object
    let lela = new XMLHttpRequest();

    // Define the callback for the response
    lela.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
               
                document.getElementById('total_product').innerHTML = this.responseText;
                loadTotal()
            } 
        
    };

    // Prepare the GET request
    const url = `ajax/load-total-product.php`;
    lela.open("GET", url, true);

    // Send the request
    lela.send();
};
load_billing_product();
// document.getElementById('jarvis').innerHTML = "ananya"
const loadTotal = () => {
    let jarvis = new XMLHttpRequest()
    jarvis.onreadystatechange = () => {
        if(jarvis.readyState == 4 && jarvis.status == 200){
            document.getElementById('jarvis').innerHTML =jarvis.responseText
        }
    }
    jarvis.open("GET", "ajax/load-total-price.php", true)
    jarvis.send()
}
loadTotal()

</script>







<?php

 // Start the session

// Check if the cart exists and calculate the maximum index

  // Prevent further script execution

if(isset($_POST['submit1'])){
    
    $sql = "INSERT INTO  billheader VALUES(NULL,'$_POST[full_name]','$_POST[bill_type_header]','$_POST[bill_date]','$_POST[billNo]')";
    $result = mysqli_query($DBCON, $sql) or die("biiling header failed");
    $lastBillNo = 0;
    $sql1 = "SELECT * FROM billheader ORDER BY id DESC LIMIT 1";
    $result1 = mysqli_query($DBCON, $sql1) or die("select billheader failed");
    while($row = mysqli_fetch_array($result1)){
        $lastBillNo = $row['id'];
    }

    $product_company = "";
    $product_name = "";
    $product_unit = "";
    $packing_size = "";
    $product_price = "";
    $product_qty = "";
    $BuyingQty = "";
    $sql2 = "SELECT * FROM tempproduct";
    $result2 = mysqli_query($DBCON, $sql2) or die("tempProduct Failed");
    while($row = mysqli_fetch_array($result2)){
        $product_company = $row['product_company'];
        $product_name = $row['product_name'];
        $product_unit = $row['product_unit'];
        $packing_size = $row['packing_size'];
        $product_price = $row['product_price'];
        $product_qty = $row['product_qty'];
        $BuyingQty = $row['product_qty'];

        $sql3 = "INSERT INTO billingdetails VALUES(null,'$lastBillNo','$product_company','$product_name','$product_unit','$packing_size','$product_price','$product_qty')";
        $result3 = mysqli_query($DBCON, $sql3) OR die("billing details failed");
        $sql5 = "UPDATE stock SET product_quntity = product_quntity-$BuyingQty WHERE product_company = '$product_company' AND product_name = '$product_name' AND product_unit = '$product_unit' AND packing_size = '$packing_size'";
        $result5 = mysqli_query($DBCON, $sql5) OR die("Update Stock Failed");
    }


    $sql4 = "DELETE FROM tempproduct";
    $result4 = mysqli_query($DBCON, $sql4) or die("delete tempProduct Failed");

    ?>
    <script>
        alert("Bill generated Successfully!!!")
        window.location = "sales-master.php"
    </script>
    <?php 
       
     
     
}





?>