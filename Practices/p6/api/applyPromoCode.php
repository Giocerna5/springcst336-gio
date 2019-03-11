<?php
$promo = array();
$promoArray = array();

$promo["promo"] = "getFifty";
$promo["discount"] = .50;
array_push($promoArray, $promo);

$promo["promo"] = "halfPrice";
$promo["discount"] = .50;
array_push($promoArray, $promo);

$promo["promo"] = "sand30";
$promo["discount"] = .30;
array_push($promoArray, $promo);

$promo["promo"] = "spring30";
$promo["discount"] = .30;
array_push($promoArray, $promo);

$promo["promo"] = "beach";
$promo["discount"] = .20;
array_push($promoArray, $promo);

$promo["promo"] = "sunny";
$promo["discount"] = .20;
array_push($promoArray, $promo);

echo json_encode($promoArray);

?>