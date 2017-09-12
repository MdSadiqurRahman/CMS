

<?php include 'header.php'; ?>
    
    <div class="col-lg-9 mt-4 ml-4"><!-- panel body-->

       <div class="row my-3  "><!--latest posts-->
        <div class="card"> 
          <div class="card-header text-center bg-info text-white"><h3>Posts</h3></div>
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
                  
                  <td><img src = \"".$result_array['image']."\" style=\"width:70px\"></td>
                  <td>".$result_array['title']."</td>
                  <td>".substr($result_array['description'], 0, 30)."</td>
                  <td>".$result_array['category']."</td>
                  <td>".$result_array['status']."</td>
                  <td>".$result_array['author']."</td>
                  <td><a href=\"/cms/post.php?post_id=".$result_array['id']."\" target=\"_blank\"><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"View\"></a></td>
                </tr>";
      $i++;

  }

 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--latest posts-->


    </div><!-- panel body-->
  

<?php include 'footer.php'; ?>