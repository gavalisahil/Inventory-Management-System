<?php
session_start();

$qty_session = 0;
$max = 0;
$gtotal = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $max = count($_SESSION['cart']);

    for ($i = 0; $i < $max; $i++) {
        $price_session = "";

        if (isset($_SESSION['cart'][$i]) && is_array($_SESSION['cart'][$i])) {
            foreach ($_SESSION['cart'][$i] as $key => $val) {
                if ($key == "qty") {
                    $qty_session = $val;
                } else if ($key == "price") {
                    $price_session = $val;
                }
            }

            $gtotal += ((int)$qty_session * (int)$price_session);
        }
    }
    echo $gtotal;
} else {
    echo "Cart is empty";
}
?>
