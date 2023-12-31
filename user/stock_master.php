<?php
session_start();
if(!isset($_SESSION["user"])){
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
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Product Company</th>
                                <th>Product Name</th>
                                <th>Product Unit</th>
                                <th>Packing Size</th>
                                <th>Product Qty</th>
                                <th>Product Selling Price</th>
                                <!-- <th>Edit</th> -->
                                
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count=0;
                $res=mysqli_query($link,"select * from stock_master");
                while ($row=mysqli_fetch_array($res)){
                    $count=$count+1;

                    ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row["product_company"]; ?></td>
                                <td><?php echo $row["product_name"]; ?></td>
                                <td><?php echo $row["product_unit"]; ?></td>
                                <td><?php echo $row["packing_size"]; ?></td>
                                <td><?php echo $row["product_qty"]; ?></td>
                                <td><?php echo $row["product_selling_price"]; ?></td>
                                

                            </tr>
                            <?php
                }
              ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>


<!--end-main-container-part-->



<?php
include "footer.php";
?>