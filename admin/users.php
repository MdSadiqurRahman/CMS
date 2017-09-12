

<?php include 'header.php'; ?>
    
    <div class="col-lg-9 mt-4 ml-4"><!-- panel body-->

       <div class="card p-0 mt-4"><!--users-->
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

  }

 ?>


                
              </tbody>
            </table>
          </div>
        </div><!-- users-->

<div style="width: 400px; height: 400px;"></div>

    </div><!-- panel body-->
  

<?php include 'footer.php'; ?>