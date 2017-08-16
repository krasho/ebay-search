<?php   
  require "config/configuration.php";

  // Load the call and capture the document returned by eBay API
  $resp = simplexml_load_file($apicall);
  
  // Check to see if the request was successful, else print an error
  if ($resp->ack == "Success") { 

     if (count($resp->searchResult->item) > 0) {

      // If the response was loaded, parse it and build links
      $array_prices = array();
      $items_result = array();

      require "services/_fill_arrays_with_the_api_informaiton.php";


      if ($resp->paginationOutput->totalPages > 1) {
          $totalPages = ($resp->paginationOutput->totalPages > 0) ? 100 : $resp->paginationOutput->totalPages;

          for ($cont = 2 ; $cont <= $totalPages; $cont++) {
               $resp = simplexml_load_file($apicall."&paginationInput.pageNumber=$cont");


               if ($resp->ack == "Success") {
                   require "services/_fill_arrays_with_the_api_informaiton.php";
               }
          }
      }


      /*echo "--- prices --- <br>";
      var_dump($array_prices);
      echo "<br>---------<br>";
      */
      $array_without_outliers = removeOutliers($array_prices);


      /*echo "<br><br>--- array_without_outliers --- <br>";
      var_dump($array_without_outliers);
      echo "<br>---------<br>";
      */
      

      $avg = number_format(array_sum($array_without_outliers)/count($array_without_outliers), 2);
    } else {
      $items_result = "Records not found";

    }
  }
  // If the response does not indicate 'Success,' print an error
  else {
    $items_result  = "Oops! The request was not successful. Make sure you are using a valid ";
    $items_result .= "AppID for the Production environment.";
  }
?>