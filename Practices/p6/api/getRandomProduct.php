<?php
$product = array();
$productArray = array();

$product["product"] = "Microfiber Beach Towel";
$product["price"] = 40;
$product["qty"] = 2;
array_push($productArray, $product);

$product["product"] = "Flip-flop Sandals";
$product["price"] = 30;
$product["qty"] = 5;
array_push($productArray, $product);

$product["product"] = "Sunscreen 80SPF";
$product["price"] = 25;
$product["qty"] = 3;
array_push($productArray, $product);

$product["product"] = "Plastic Flying Disc";
$product["price"] = 15;
$product["qty"] = 4;
array_push($productArray, $product);

$product["product"] = "Beach Umbrella";
$product["price"] = 75;
$product["qty"] = 1;
array_push($productArray, $product);

echo json_encode($productArray[rand(0,4)]);


/*    switch($httpMethod) {
      case "OPTIONS":
        // Allows API to be used
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        // Client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");

        // TODO: do stuff to get the $results which is an associative array
        
        // Sending back down as JSON
        echo json_encode($productArray[rand(0,4)]);

        break;
    }*/
?>
