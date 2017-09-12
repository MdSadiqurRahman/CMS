
 
 <?php include 'header.php'; ?>  


<!--article body with a sidebar-->






  <article class="col-lg-8 my-3 ml-5">
	   <div class="container mx-auto">
      <div class="text-center ">
        <h3 class="my-4 ml-5">Add New Post</h3>
        <hr class="my-5">
      </div>
      


      <!-- ............................. Add New Post................-->

<?php



      ///////////////// find the author name ////////////

    $qry = "SELECT * FROM users WHERE email = '$get_email';";
    $result = mysqli_query($link, $qry);
    $result_a = mysqli_fetch_array($result);
    $author = $result_a['name'];

    

 ////////////////// for new posts only ///////////


  if(isset($_POST['submit'])){
    $date = date("Y-m-d h:i:sa");
    $query = "INSERT INTO posts (title, description, image, category, date, author, status)
            VALUES ('$_POST[title]', '$_POST[description]', '$_POST[image]', '$_POST[category]', '$date', '$author', '$_POST[status]');";
            
            
    if($result = mysqli_query($link, $query)){
      
     
              
                if ($_POST['status'] == "Published") {

                  echo "<div class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> Your post has been added.</div>";

                  echo "<a href=\"http://despider-com.stackstaging.com/cms/\" target=\"_blank\" class=\"btn btn-success mx-auto\">View post</a>";
                  
                }else{

                  echo "<div class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> Your post has been added as <b>draft</b>.</div>";
                }
                
           
    } else{

        echo "<div class=\"alert alert-info\" role=\"alert\">
            <strong>Failed!</strong> Try again later.</div>";
          }
          
  }
  
        
 
?>

      <form method="post" action="new-post.php">
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Title</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="title" placeholder="Title of your post" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Image link</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="image" placeholder="www.site.com/img.jpg" required="required" >
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Category</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="category" placeholder="nature/ technology/ sports..." required="required" >
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Status</b></label>
           <div class="col-9">
           <select class="form-control" name="status">
             <option value="Published">Published</option>
             <option value="Draft">Draft</option>
           </select>
           </div>
        </div>
        
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Post Body</b></label>
           <div class="col-9">
           <textarea class="form-control" name="description" rows="10" cols="70" required="required"></textarea>
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"></label>
           <div class="col-9">
           <input class="btn btn-block btn-success mx-auto" type="submit" name="submit" value="Submit">
           </div>
        </div>
      </form>
     </div>
  </article>



<?php include 'footer.php'; ?>
