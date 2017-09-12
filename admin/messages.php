

<?php include 'header.php'; ?>
    
    <div class="col-lg-9 mt-4 ml-4"><!-- panel body-->

       <div class="row my-3"><!--latest messages-->
        <div class="card"> 
          <div class="card-header text-center bg-success text-white"><h3>Messages</h3></div>
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
                  <td><a href=\"message-single.php?msg_id=".$result_array['id']."\"><input type=\"button\" class=\"btn btn-sm btn-info\" value=\"Read\"></a></td>
                  
                </tr>";
              $i++;
      }  
  
 ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div><!--latest messages-->


    </div><!-- panel body-->
  

<?php include 'footer.php'; ?>