<?php include 'header.php'; ?>
    
    <div class="col-lg-9 mt-4 ml-4"><!-- panel body-->

       <div class="row my-3 m-5"><!--categories-->
        <div class="card col-lg-9 p-0"> 
          <div class="card-header text-center bg-info text-white"><h3>Categories</h3></div>
          <div class="card-block">
            <table class="table table-hover m-0 p-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Categories</th>
                  <th>No of posts</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>

<?php
  
  $query = "SELECT DISTINCT category FROM posts;";
  $result = mysqli_query($link, $query);
  $i = 1;
  while ($result_array = mysqli_fetch_array($result)) {

      
      $quer = "SELECT COUNT(category) FROM posts WHERE category ='".$result_array['category']."';";
      $res = mysqli_query($link, $quer);
      $cat_num = mysqli_fetch_array($res);

          echo "<tr>
                  <td>".$i."</td>
                  <td>".$result_array['category']."</td>
                  <td>".$cat_num[0]."</td>
                  <td><a href = \"/cms/category.php?category=".$result_array['category']."\" target=\"_blank\"><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"View\"></a></td>
                </tr>";
      $i++;

  }

 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--categories-->

      <div style="width: 400px; height: 400px;"></div>

    </div><!-- panel body-->

    
  

<?php include 'footer.php'; ?>