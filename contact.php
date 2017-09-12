<?php include 'db.php'; ?>
 
 <?php include 'header.php'; ?>  


<!--article body with a sidebar-->


<div class="container my-3">

<div class="row"><!--defines the article side and the sidebar-->

  <article class="col-lg-8 my-3">
	   <div class="container">
      <div class="text-center ">
        <h3 class="my-4 ml-5">Send Us a Message</h3>
        <hr class="my-5">
      </div>
      


      <!-- ............................. sent message................-->

<?php
  if(isset($_POST['submit'])){
    $date = date("Y-m-d h:i:sa");
    $query = "INSERT INTO contact (name, email, subject, message, date)
            VALUES ('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[message]', '$date');";
            
    if($result = mysqli_query($link, $query)){
      echo "<div class=\"alert alert-success\" role=\"alert\">
            <strong>Success!</strong> Your message has been sent.</div>";
          } else{

            echo "<div class=\"alert alert-info\" role=\"alert\">
            <strong>Message failed!</strong> Please try again later.</div>";
          }
        }
 
?>

      <form method="post" action="contact.php">
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Name</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="name" placeholder="" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Email</b></label>
           <div class="col-9">
           <input class="form-control" type="Email" name="email" placeholder="" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Subject</b></label>
           <div class="col-9">
           <input class="form-control" type="text" name="subject" placeholder="" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"><b>Message</b></label>
           <div class="col-9">
           <textarea class="form-control" name="message" rows="10" cols="70" required="required"></textarea>
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="example-text-input" class="col-2 col-form-label ml-3"></label>
           <div class="col-9">
           <input class="btn btn-block btn-info mx-auto" type="submit" name="submit" value="Send your message">
           </div>
           
        </div>
      </form>
     </div>


    

  </article>

  <aside class="col-lg-4 my-3">

<?php include 'sidebar.php'; ?>

  </aside>
</div>
</div>

<?php include 'footer.php'; ?>