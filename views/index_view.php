<h1 style="text-align: center;">
   eBay Search Results

   <?php 
   if (!empty($avg) and $avg != "0") {
   	?>
   	<span class="label label-info"><?= $avg; ?></span>
   	<?php
   }
   ?>
</h1>

<div class="well bs-component">
<form class="form-horizontal" method="POST">
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="keywords">Keywords</label>  
	  <div class="col-md-4">
	  <input id="keywords" name="keywords" type="text" placeholder="Search" class="form-control input-md" required="" value="<?= $keywords; ?>">
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="keywords">Start Date</label>  
	  <div class="col-md-4">
	  <input id="start_date" name="start_date" type="text" placeholder="start date" class="form-control input-md" required="" value="<?= $start_date; ?>">
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="keywords">End Date</label>  
	  <div class="col-md-4">
	  <input id="end_date" name="end_date" type="text" placeholder="end date" class="form-control input-md" required="" value="<?= $end_date; ?>">
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="singlebutton"></label>
	  <div class="col-md-4">
	    <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary" value="Search">
	  </div>
	</div>
</form>
 
</div>



<?php
if (!empty($items_result)) {

  if (is_array($items_result)){
     ?>
      <div class="d-flex justify-content-center">
         <div><h4>AVG <span class="label label-info"><?= $avg; ?></span></h4></div>
         <div>
         <h4>Found 
         <span class="label label-info"><?= count($items_result); ?></span>
         </h4>      
         </div>
        
      </div>  

       <table class="table">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Title</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($items_result as $item) {
            ?>
            <tr>
              <td><img src="<?= $item['pic'] ?>"></td>
              <td><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></td>
              <td><?= $item['price'] ?></td>
            </tr>    
            <?php
          }
          ?>
          </tbody>
        </table>  

     <?php
  } else {
     ?>
     <h3 style="text-align: center;"><?= $items_result; ?></h3>
     <?php
  }
  ?>

  <?php
}