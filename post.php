<?php include 'db.php'; ?>

<?php include 'header.php'; ?>  

<!--article body with a sidebar-->

<div class="container my-3">

<div class="row">

<article class="col-lg-8 my-3">

<?php 

  if(isset($_GET['post_id'])){

    $query = "SELECT * FROM posts WHERE status ='Published' AND id = ".$_GET['post_id']." ;";
    $result = mysqli_query($link, $query);
    while($result_array = mysqli_fetch_array($result)){

      echo "<div class=\"card\">
      <div class=\"card-block\">
        <h3 class=\"card-title\">".$result_array['title']."</h3>
        <img src=\"".$result_array['image']."\" width=\"100%\" class=\"my-2\">
        <p class=\"card-text\">".$result_array['description']."</p>
      </div>
    </div>";

    }

  }

?>

  
    
  </article>

  <aside class="col-lg-4 my-3">

  <?php include 'sidebar.php'; ?>

  </aside>
</div>
</div>

<?php include 'footer.php'; ?>