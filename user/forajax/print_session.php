<?php
session_start();
$max = 0;
if (isset($_SESSION['cart'])) {
    $max = count($_SESSION['cart']);
}
for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION['cart'][$i])) {
        $company_name = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $qty = "";
        foreach ($_SESSION['cart'][$i] as $key => $val) {
            if ($key == "company_name") {
                $company_name = $val;
            } else if ($key == "product_name") {
                $product_name = $val;
            } else if ($key == "unit") {
                $unit = $val;
            } else if ($key == "packing_size") {
                $packing_size = $val;
            } else if ($key == "qty") {
                $qty = $val;
            }
        }
        echo $company_name . " " . $product_name . " " . $unit . " " . $packing_size . " " . $qty;
        echo "<br>";
    }
}

?>
