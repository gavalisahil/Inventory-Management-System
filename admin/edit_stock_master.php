<?php
session_start();
if(!isset($_SESSION["admin"])){
    ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
    <?php
}
?>
<?php
include "header.php";
include "../user/connection.php";
$id=$_GET["id"];
$poduct_company="";
$product_name="";
$product_unit="";
$packing_size="";
$product_qty="";
$product_selling_price="";
$res=mysqli_query($link,"select * from stock_master where id=$id");
while($row=mysqli_fetch_array($res)){
    $product_company=$row["product_company"];
    $product_name=$row["product_name"];
    $product_unit=$row["product_unit"];
    $packing_size=$row["packing_size"];
    $product_qty=$row["product_qty"];
    $product_selling_price=$row["product_selling_price"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                Edit Stocks Price</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit Stocks Price</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Product Company</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="Product_company" value="<?php echo $product_company;?>" readonly/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product name" name="product_name" value="<?php echo $product_name;?>"readonly/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Unit :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product Unit" name="product_unit" value="<?php echo $product_unit;?>"readonly/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Packing Size:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Packing Size" name="packing_size" value="<?php echo $packing_size;?>"readonly/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Packing Qty :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product Qty" name="product_qty" value="<?php echo $product_qty;?>"readonly/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Packing Selling Price :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product Selling Price" name="product_selling_price" value="<?php echo $product_selling_price;?>"/>
                                </div>
                            </div>

                            <!-- <div class="alert alert-danger" id="error" style="display:none">
                                This Product Already Exist! Please Try Another.
                            </div> -->

                            <div class="form-actions">
                                <center>
                                    <button type="submit" name="submit1" class="btn btn-success">Update</button>
                                </center>
                            </div>

                            <div class="alert alert-success" id="success" style="display:none">
                                Record Updated Successfully!
                            </div>

                        </form>
                    </div>

                </div>
                
            </div>

        </div>
    </div>

</div>


<!--end-main-container-part-->

<?php
if(isset($_POST["submit1"])){

    mysqli_query($link,"UPDATE stock_master set product_selling_price='$_POST[product_selling_price]' where id=$id") or die(mysqli_error($link));
    ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="block";
            setTimeout(function(){
                window.location="stock_master.php";
            }, 1000);

        </script>
    <?php
}

?>

<?php
include "footer.php";
?>