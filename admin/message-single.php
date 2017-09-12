

<?php include 'header.php'; ?>  



<div class="container my-3">

<div class="row ml-5">

<article class="col-lg-8 m-5">

<?php 

  if(isset($_GET['msg_id'])){

    $query = "SELECT * FROM contact WHERE id = ".$_GET['msg_id']." ;";
    $result = mysqli_query($link, $query);
    while($result_array = mysqli_fetch_array($result)){

      echo "<div class=\"card m-5\">
      <div class=\"card-block\">
        <h3 class=\"card-title\"><a href=\"messages.php\" ><i class=\"fa fa-arrow-circle-left mr-2\" style=\"font-size: 32px\"  aria-hidden=\"true\"></i></a>".$result_array['subject']."</h3>
        <p class=\"card-text\">".$result_array['message']."</p>
        <h5 class=\"text-right\">".$result_array['name']."</h5>
        <p class=\"text-right\">".$result_array['email']."</p>
        <p class=\"text-muted text-right\">".$result_array['date']."</p>
        
      </div>
    </div>

";

    }

  }

?>

  <div style="width: 400px; height: 400px;"></div>
    
  </article>

</div>
</div>

<?php include 'footer.php'; ?>