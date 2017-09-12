<?php 

session_start();

include 'db.php';

$error_msg = "";

if (isset($_GET['login_error'])) {
  
    if ($_GET['login_error'] == 'empty') {

      $error_msg = "<div class=\"alert alert-danger text-center\">Email or password was empty!</div>";

    }elseif($_GET['login_error'] == 'wrong'){

      $error_msg = "<div class=\"alert alert-danger text-center\">Email or password was wrong!</div>";

    }elseif ($_GET['login_error'] == 'query_error') {

      $error_msg = "<div class=\"alert alert-danger text-center\">There was a problem connecting Database!</div>";

    }
}

 ?>

<?php include 'header.php'; ?>  


<!--article body with a sidebar-->


<div class="container my-3">

<?php echo $error_msg; ?>

<div class="row"><!--defines the article side and the sidebar-->

  <article class="col-lg-8 my-3">
	
	<?php


		$query = "SELECT * FROM posts WHERE status ='Published' ORDER BY id DESC;";
		$result = mysqli_query($link, $query);
		while($result_array = mysqli_fetch_array($result)){


			echo "<div class=\"card mb-3\">
      <div class=\"card-header\">
        <h3 class=\"card-title\"><a href=\"post.php?post_id=".$result_array['id']."\">".$result_array['title']."</a></h3>
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

	
	?>


    

  </article>

  <aside class="col-lg-4 my-3">
	
	<?php include 'sidebar.php'; ?>

  </aside>
</div>
</div>

<?php include 'footer.php'; ?>