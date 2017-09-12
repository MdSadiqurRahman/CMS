
 
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



     ////////////// edit post ////////////////////

    if (isset($_GET['edit_id'])) {
        $query = "SELECT * FROM posts WHERE id ='$_GET[edit_id]'";
        $result = mysqli_query($link, $query);
        $result_array = mysqli_fetch_array($result);
      }

      //////////// after edit and submit ///////////////

    if (isset($_POST['submit'])) {
      

        $qry = "UPDATE posts SET title = '$_POST[title]', description = '$_POST[description]', image = '$_POST[image]', category = '$_POST[category]', status = '$_POST[status]' WHERE id ='$_POST[id]'";
        

                  if($rslt = mysqli_query($link, $qry)){
        

                    echo "<div class=\"alert alert-success\" role=\"alert\">
                      <strong>Success!</strong> Your post has been updated.</div>";
                    
                  } else{

                     echo "<div class=\"alert alert-info\" role=\"alert\">
                           <strong>Failed to update!</strong> Try again later.</div>";
                        }
                        

    }

        
 
?>

      <form method="post" action="edit-post.php">
        <div class="form-group row mx-auto" style="display: none">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Id</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="id" placeholder="Id of your post" required="required" value="<?php echo $result_array['id']; ?>">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Title</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="title" placeholder="Title of your post" required="required" value="<?php echo $result_array['title']; ?>">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Image link</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="image" placeholder="www.site.com/img.jpg" required="required" value="<?php echo $result_array['image']; ?>">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Category</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="category" placeholder="nature/ technology/ sports..." required="required" value="<?php echo $result_array['category']; ?>">
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
           <textarea class="form-control" name="description" rows="10" cols="70" required="required"><?php echo $result_array['description']; ?></textarea>
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
