<?php
  foreach($resp->searchResult->item as $item) {

    $item_product = array(
       "pic" => $item->galleryURL,
       "link" => $item->viewItemURL,
       "title" => $item->title,
       "price" => $item->sellingStatus->currentPrice,
    );  


    array_push($array_prices, (float) $item->sellingStatus->currentPrice);
    array_push($items_result, $item_product);      
  }
      
?>