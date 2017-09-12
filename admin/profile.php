<?php include 'header.php'; ?>
    

<?php 
  $query = "SELECT * FROM users WHERE email ='$get_email' AND password ='$get_password'";
  $result = mysqli_query($link, $query);
  $result_array = mysqli_fetch_array($result);
  $this_user = $result_array['name'];

 ?>


    <div class="col-lg-9 mt-4 ml-4 mb-0"><!-- panel body-->

       
       <div class="row jumbotron p-2 mt-3 mb-1 bg-info"><!--profile header-->
        <div class="">
          <img class="card-img-top"  src="<?php echo $result_array['image']; ?>" width="250" height="250" alt="Profile picture">
        </div>

        <div class="text-center mr-5 text-white bg-info pt-5" style="width: 450px"><!--User profile-->
          <div class="card-block pb-2 px-2">
            <h3 class="card-title"><?php echo $result_array['name']; ?></h3>

            <p class="card-text text-muted"><?php echo $result_array['occupation']; ?></p>
            <hr style="background-color: white; width: 70%">
            <div class="row d-flex justify-content-center">
              <a href="#"></a> 
              <a href="#"></a>  
              <a href="#"></a>  
              <a href="#"></a>


              <a href="" class="text-white" style="text-decoration: none !important;"><div class="rounded-circle bg-primary mx-1 "><i class="fa fa-github mx-1 text-white text-center" style="font-size: 20px"></i></div></a>

              <a href="" class="text-white" style="text-decoration: none !important;"><div class="rounded-circle bg-primary mx-1 "><i class="fa fa-twitter mx-1 text-white text-center" style="font-size: 20px"></i></div></a>

              <a href="" class="text-white" style="text-decoration: none !important;"><div class="rounded-circle bg-primary mx-1 "><i class="fa fa-linkedin mx-1 text-white text-center" style="font-size: 20px"></i></div></a>

              <a href="" class="text-white" style="text-decoration: none !important;"><div class="rounded-circle bg-primary mx-1"><i class="fa fa-facebook mx-2 text-white text-center" style="font-size: 20px"></i></div></a>


           </div>
          </div>
        </div><!--User profile-->

      
      <?php 

            ///////////////////// delete post! ////////////////////

          if(isset($_GET['del_id'])){

              $del_query = "DELETE from posts WHERE id ='$_GET[del_id]'";
              $run_query = mysqli_query($link, $del_query);
          }

          ////////////// count number of posts ////////////////

        $quer = "SELECT count(*) FROM posts WHERE author='$this_user';";
        $resul = mysqli_query($link, $quer);
        $result_ar = mysqli_fetch_array($resul);
        $count_posts = $result_ar[0];

       ?>

        <div class="text-center text-white bg-info ml-4 p-5"><!--User profile-->
          <div class="card-block pb-2 px-2 pt-5 pl-5">
            <a href="#posts" class="text-white" style="text-decoration: none !important;"><div class="rounded-circle bg-primary"><h2 class="card-title mt-3 mb-0"><?php echo $count_posts; ?></h2></div>
            <p>Posts</p></a>
          </div>
        </div><!--User profile-->
        
       </div><!--profile header-->

       <div class="row jumbotron mt-0 p-0">
		 <div class="card" style="width: 100%">
		  <div class="card-header">
		    <h3>Details</h3>
		  </div>
		  <div class="card-block row">
      <div class="float-left" style="width: 47%">

          <table class="table" width="">
            <thead>
              <tr>
                <td><b>Name</b></td>
                <td><?php echo $result_array['name']; ?></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>Email</b></td>
                <td><?php echo $result_array['email']; ?></td>
              </tr>
              <tr>
                <td><b>Gender</b></td>
                <td><?php echo $result_array['gender']; ?></td>
                <tr>
                <td><b>Website</b></td>
                <td><?php echo $result_array['website']; ?></td>
                <tr>
                <td><b>Address</b></td>
                <td><?php echo $result_array['address']; ?></td>
              </tr>
              </tr>
              </tr>
            </tbody>
          </table>
        
      </div>
      <div class="card float-left card-outline-secondary ml-4 mr-1 p-3" style="width: 50%">
        <h4 class="text-center">About Me</h4>
        <p class="text-justify"><?php echo $result_array['about']; ?></p>
      </div>
		  </div>

		</div>
       </div>

<?php 
  
  if ($count_posts == 0) {

    $display = "none";
  }else{
    $display = "block";
  }

 ?>

       <div class="row my-3  " id="posts" style="display: <?php echo $display; ?>"><!--Posts by this users-->
        <div class="card"> 
          <div class="card-header text-center bg-info text-white"><h3>Latest Posts</h3></div>
          <div class="card-block">
            <table class="table table-hover m-0 p-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>View</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

<?php
  
  $query = "SELECT * FROM posts WHERE author = '$this_user' ORDER BY id DESC;";
  $result = mysqli_query($link, $query);
  $i = 1;
  while ($result_array = mysqli_fetch_array($result)) {

          echo "<tr>
                  <td>".$i."</td>
                  
                  <td><img src = \"".$result_array['image']."\" style=\"width:70px\"></td>
                  <td>".$result_array['title']."</td>
                  <td>".substr($result_array['description'], 0, 30)."</td>
                  <td>".$result_array['category']."</td>
                  <td>".$result_array['status']."</td>
                  <td><a href=\"edit-post.php?edit_id=".$result_array['id']."\" ><input type=\"button\" class=\"btn btn-sm btn-warning\" value=\"Edit\"></a></td>
                  <td><a href=\"/cms/post.php?post_id=".$result_array['id']."\" target=\"_blank\"><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"View\"></a></td>
                  <td><a href=\"profile.php?del_id=".$result_array['id']."\" ><input type=\"button\" class=\"btn btn-sm btn-danger\" value=\"Delete\"></a></td>
                  
                </tr>";
      $i++;

      if($i > 3){
        break;
      }  /////////////////// decides how many posts to show /////////////////////


  }

 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--Posts by this users-->

      


    </div><!-- panel body-->
  

<?php include 'footer.php'; ?>