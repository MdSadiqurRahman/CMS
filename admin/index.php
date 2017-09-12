<?php include 'header.php'; ?>
<?php
  

 //////////////////////// count: posts ////////////////////////

 $query = "SELECT COUNT(*) FROM posts;";
 $result = mysqli_query($link, $query);
 $result_array = mysqli_fetch_array($result);
 $posts_count = $result_array[0];


 //////////////////////// count: category ////////////////////////

 $query = "SELECT COUNT(DISTINCT category) FROM posts;";
 $result = mysqli_query($link, $query);
 $result_array = mysqli_fetch_array($result);
 $cat_count = $result_array[0];


 //////////////////////// count: users ////////////////////////

 $query = "SELECT COUNT(*) FROM users;";
 $result = mysqli_query($link, $query);
 $result_array = mysqli_fetch_array($result);
 $users_count = $result_array[0];


 //////////////////////// count: messages ////////////////////////

 $query = "SELECT COUNT(*) FROM contact;";
 $result = mysqli_query($link, $query);
 $result_array = mysqli_fetch_array($result);
 $msg_count = $result_array[0];




 ?>


    
    <div class="col-lg-9 mt-4 ml-4 float-left"><!-- panel body-->


      <div class="row" style="width: 100%"><!--panel blocks row-->

        <div class="card p-0 m-2 panel-block"><!--panel block: Posts-->
          <div class="card-header text-white" style="background-color: green">
          <div class="row m-0 pb-3">
            <div class="float-left" style="width: 50%">
              <i class="fa fa-th-list p-2" style="font-size: 65px" aria-hidden="true"></i>
            </div>
            <div class="float-left text-right pr-2" style="width: 50%">
              <div style="font-size: 35px"><?php echo $posts_count; ?></div>
              <div style="font-size: 18px">Posts</div>
            </div>
          </div>
          </div>
          <a href="posts.php"><div class="card-footer">
            <div class="row m-0 p-0">
              <div class="float-left" style="width: 50%">
                <p>View</p>
              </div>
              <div class="float-left text-right pr-2" style="width: 50%">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          </a>
        </div><!--panel block: Posts-->

        <div class="card p-0 m-2 panel-block"><!--panel block: Categories-->
          <div class="card-header text-white" style="background-color: #FF9800">
          <div class="row m-0 pb-3">
            <div class="float-left" style="width: 50%">
              <i class="fa fa-th p-2" style="font-size: 65px" aria-hidden="true"></i>
            </div>
            <div class="float-left text-right pr-2" style="width: 50%">
              <div style="font-size: 35px"><?php echo $cat_count; ?></div>
              <div style="font-size: 18px">Categories</div>
            </div>
          </div>
          </div>
          <a href="category.php"><div class="card-footer">
            <div class="row m-0 p-0">
              <div class="float-left" style="width: 50%">
                <p>View</p>
              </div>
              <div class="float-left text-right pr-2" style="width: 50%">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          </a>
        </div><!--panel block: Categories-->

        <div class="card p-0 m-2 panel-block"><!--panel block: Users-->
          <div class="card-header bg-primary text-white">
          <div class="row m-0 pb-3">
            <div class="float-left" style="width: 50%">
              <i class="fa fa-users p-2" style="font-size: 65px" aria-hidden="true"></i>
            </div>
            <div class="float-left text-right pr-2" style="width: 50%">
              <div style="font-size: 35px"><?php echo $users_count; ?></div>
              <div style="font-size: 18px">Users</div>
            </div>
          </div>
          </div>
          <a href="users.php"><div class="card-footer">
            <div class="row m-0 p-0">
              <div class="float-left" style="width: 50%">
                <p>View</p>
              </div>
              <div class="float-left text-right pr-2" style="width: 50%">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          </a>
        </div><!--panel block: Users-->


        <div class="card p-0 m-2 panel-block"><!--panel block: Messages-->
          <div class="card-header bg-danger text-white">
          <div class="row m-0 pb-3">
            <div class="float-left" style="width: 50%">
              <i class="fa fa-comment p-2" style="font-size: 65px" aria-hidden="true"></i>
            </div>
            <div class="float-left text-right pr-2" style="width: 50%">
              <div style="font-size: 35px"><?php echo $msg_count; ?></div>
              <div style="font-size: 18px">Messages</div>
            </div>
          </div>
          </div>
          <a href="messages.php"><div class="card-footer">
            <div class="row m-0 p-0">
              <div class="float-left" style="width: 50%">
                <p>View</p>
              </div>
              <div class="float-left text-right pr-2" style="width: 50%">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          </a>
        </div><!--panel block: Messages-->

      </div><!--panel blocks row-->


      <div class="row d-flex justify-content-between my-3"><!--latest users & user profile row-->





        <div class="card col-md-8 p-0"><!--latest users-->
          <div class="card-header text-center bg-info text-white"><h3>Users</h3></div>
          <div class="card-block ">
            <table class="table table-hover m-0 p-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>

<?php

  
  $query = "SELECT * FROM users ORDER BY date ASC;";
  $result = mysqli_query($link, $query);
  $i = 1;
  while ($result_array = mysqli_fetch_array($result)) {

          echo "<tr>
                  <td>".$i."</td>
                  <td>".$result_array['date']."</td>
                  <td>".$result_array['name']."</td>
                  <td>".$result_array['role']."</td>
                </tr>";
      $i++;

      if ($i > 5) {
        break;
      }

  }

 ?>


                
              </tbody>
            </table>
          </div>
        </div><!--latest users-->


          <?php  /////////////// user profile ///////////////

            $query = "SELECT * FROM users WHERE email ='$get_email' AND password ='$get_password'";
            $result = mysqli_query($link, $query);
            $result_array = mysqli_fetch_array($result);

           ?>
        
         <div class="card text-center mr-5" style="width: 250px"><!--User profile-->
          <img class="card-img-top" src="<?php echo $result_array['image']; ?>" width="250px" height="auto" alt="Profile picture">
          <div class="card-block pb-2 px-2">
            <h5 class="card-title"><?php echo $result_array['name']; ?></h5>
            <p class="card-text text-muted"><?php echo $result_array['occupation']; ?></p>
            <div class="row d-flex justify-content-center">
              <a href="#"><i class="fa fa-github mx-1"></i></a> 
              <a href="#"><i class="fa fa-twitter mx-1"></i></a>  
              <a href="#"><i class="fa fa-linkedin mx-1"></i></a>  
              <a href="#"><i class="fa fa-facebook mx-1"></i></a> 
           </div>
           <a href="profile.php"class="btn btn-block btn-primary p-1 mt-2">View Profile</a>
            
          </div>
        </div><!--User profile-->


      </div><!--latest users & user profile row-->



      <div class="row my-3  "><!--latest posts-->
        <div class="card"> 
          <div class="card-header text-center bg-info text-white"><h3>Latest Posts</h3></div>
          <div class="card-block">
            <table class="table table-hover m-0 p-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>

<?php
  
  $query = "SELECT * FROM posts ORDER BY id DESC;";
  $result = mysqli_query($link, $query);
  $i = 1;
  while ($result_array = mysqli_fetch_array($result)) {

          echo "<tr>
                  <td>".$i."</td>
                  <td>".$result_array['date']."</td>
                  <td><img src = \"".$result_array['image']."\" style=\"width:70px\"></td>
                  <td>".$result_array['title']."</td>
                  <td>".substr($result_array['description'], 0, 50)."</td>
                  <td>".$result_array['category']."</td>
                  <td>".$result_array['author']."</td>
                  <td><a href=\"/cms/post.php?post_id=".$result_array['id']."\" target=\"_blank\"><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"View\"></a></td>
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
      </div><!--latest posts-->




       <div class="row my-3  "><!--latest messages-->
        <div class="card"> 
          <div class="card-header text-center bg-success text-white"><h3>Latest Messages</h3></div>
          <div class="card-block">
            <table class="table table-hover m-0 p-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Read</th>
                </tr>
              </thead>
              <tbody>

<?php
  
  $query = "SELECT * FROM contact ORDER BY id DESC;";
  $result = mysqli_query($link, $query);
  $i = 1;
  while ($result_array = mysqli_fetch_array($result)) {

          echo "<tr>
                  <td>".$i."</td>
                  <td>".$result_array['date']."</td>
                  <td>".$result_array['name']."</td>
                  <td>".$result_array['email']."</td>
                  <td>".substr($result_array['subject'], 0, 50)."</td>
                  <td>".substr($result_array['message'], 0, 50)."</td>
                  <td><a href=\"message-single.php?msg_id=".$result_array['id']."\" ><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"Read\"></a></td>
                  
                </tr>";
      $i++;

      if($i > 4){
        break;
      }  /////////////////// decides how many messages to show /////////////////////


  }

 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--latest messages-->


    </div><!-- panel body-->
  

<?php include 'footer.php'; ?>