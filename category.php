<?php include 'db.php'; ?>

<?php include 'header.php'; ?>  


<!--article body with a sidebar-->


<div class="container my-3">

<div class="row"><!--defines the article side and the sidebar-->

  <article class="col-lg-8 my-3">
  
  <?php

if(isset($_GET['category'])){

    $query = "SELECT * FROM posts WHERE status ='Published' AND category ='".$_GET['category']."';";
    $result = mysqli_query($link, $query);
    while($result_array = mysqli_fetch_array($result)){


      echo "<div class=\"card mb-3\">
      <div class=\"card-header\">
        <h3 class=\"card-title\"><a href=\"post.php?post_id=".$result_array['id']."\">".$result_array['title']."</a></h3><span class=\"badge badge-pill badge-primary\">".ucfirst($result_array['category'])."</span>
      </div>
      <div class=\"card-block\">
        <div class=\"row\">
        <div class=\"col-sm-4\">
        <img src=\"".$result_array['image']."\" width=\"100%\">
        </div>
        <div class=\"col-sm-8\">
        <p class=\"card-text\">".substr($result_array['description'], 0, 235)." ..."."</p>
        <p class = \"text-right\"><a href=\"post.php?post_id=".$result_array['id']."\">Read More</a></p>
        </div>
      </div>
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