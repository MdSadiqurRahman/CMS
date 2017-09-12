
  <div class="card mb-3"><!--Search bar-->
    <div class="card-block pb-1">
      <form class="form-group row" method="GET" action="search.php">
          <input type="text" class="form-control col-sm-9 ml-3" name="search" placeholder="Search here...">
          <button type="submit" class="btn btn-outline-info col-sm-2" name="search_btn">
          <i class="fa fa-search" aria-hidden="true"></i>
          </button>
      </form>
    </div>
  </div><!--Search bar-->

    <div class="card">
    <!--<div class="card-header">
      login
    </div>-->
    <div class="card-block">
      <form method="POST" action="login.php">
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="Email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-success btn-block" name="login" value="login">
        </div>
      </div>
      </form>
    </div>
    </div>

    <div class="card my-3"><!--Categories-->
     <div class="card-header text-center">
        <h4>Categories</h4>
     </div>
     <div class="card-block">

      <?php
      $query = "SELECT DISTINCT category FROM posts WHERE status ='Published';";
      $result = mysqli_query($link, $query);
      while($result_array = mysqli_fetch_array($result)){

      echo "<a href = \"category.php?category=".$result_array['category']."\"><span class=\"badge badge-pill badge-success\">".ucfirst($result_array['category'])."</span></a>&nbsp;";

        }
      ?>
      
     </div>
    </div>

    <div class="list-group my-3"><!--Sidebar posts-->

      <?php
      $query = "SELECT * FROM posts WHERE status ='Published' ORDER BY id DESC;";
      $result = mysqli_query($link, $query);
      while($result_array = mysqli_fetch_array($result)){

        if(isset($_GET['post_id'])){

          if($_GET['post_id'] == $result_array['id']){
            $active = "active ";
          }else{
            $active = "";
          }
        }

          $date = strtotime($result_array['date']);
          $dat = date('d.m.Y', $date);
          

      echo "<a href=\"post.php?post_id=".$result_array['id']."\" class=\"".$active."list-group-item list-group-item-action flex-column align-items-start\">
     <div class=\"d-flex w-100 justify-content-between\">
      <h5 class=\"mb-1\">".$result_array['title']."</h5>
      <small>".$dat."</small>
     </div>
      <p class=\"mb-1\">".substr($result_array['description'], 0, 80)."</p>
      <small>Author: ".$result_array['author']."</small>
    </a>";

        }
      ?>

    
  </div>