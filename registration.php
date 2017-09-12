<?php include 'db.php'; ?>
 
 <?php include 'header.php'; ?>  


<!--article body with a sidebar-->


<div class="container my-3">

<div class="row"><!--defines the article side and the sidebar-->

  <article class="col-lg-8 my-3">
	   <div class="container">
      <div class="text-center ">
        <h3 class="my-4 ml-5">Registration form</h3>
        <hr class="my-5">
      </div>
      


      <!-- ............................. registration form................-->

<?php

  if(isset($_POST['submit_reg'])){

      if($_POST['password'] == $_POST['confirm-password']){

        $email_query = "SELECT * FROM users WHERE email ='$_POST[email]'";
        $email_result = mysqli_query($link, $email_query);
        if($email_count = mysqli_num_rows($email_result) > 0){

          echo "<div class=\"alert alert-warning\" role=\"alert\">
                <strong>This email has already been used!</strong> Use a different email.</div>";
        }else{


        $date = date("Y-m-d h:i:sa");
        $role = "Subscriber";
        $query = "INSERT INTO users (name, email, password, gender, address, website, about, date, role, occupation, image)
                VALUES ('$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[gender]', '$_POST[address]', '$_POST[website]', '$_POST[about]', '$date', '$role', '$_POST[occupation]', '$_POST[image]');";
                
          if($result = mysqli_query($link, $query)){

            echo "<div class=\"alert alert-success\" role=\"alert\">
                  <strong>Congratulation!</strong> You are registered as a new user.</div>";
                } else{

                  echo "<div class=\"alert alert-info\" role=\"alert\">
                  <strong>Registration failed!</strong> Please try again later.</div>";
                }
        }

        

      } else{

                echo "<div class=\"alert alert-warning\" role=\"alert\">
                <strong>Password did not match!</strong> Please try again.</div>";
            }
  }
 
?>

      <form method="post" action="registration.php">
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Name</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['name']; ?>" type="text" name="name" placeholder="your name" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Email</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['email']; ?>" type="Email" name="email" placeholder="email" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Password</b></label>
           <div class="col-8">
           <input class="form-control" id="password" type="password" name="password" placeholder="password" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Confirm Password</b></label>
           <div class="col-8">
           <input class="form-control" id="confirm-password" type="password" name="confirm-password" placeholder="confirm password" required="required">

           <p id="alert" class="text-alert mt-2 mb-0 alert-warning" style="display: none"></p>

           </div>
        </div>


        


        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Gender</b></label>
           <div class="col-8">
           <select class="form-control" value="<?php //echo $_POST['gender']; ?>" name="gender">
             <option value="">Select your gender</option>
             <option value="male">Male</option>
             <option value="female">Female</option>
             <option value="other">Other</option>
           </select>
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Photo URL</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['image']; ?>"  type="text" name="image" placeholder="(250 * 250)" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Occupation</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['occupation']; ?>"  type="text" name="occupation" placeholder="Your occupation" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Address</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['address']; ?>"  type="text" name="address" placeholder="City, Country" required="required">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>Website</b></label>
           <div class="col-8">
           <input class="form-control" value="<?php echo $_POST['website']; ?>" type="text" name="website" placeholder="www.mysite.com">
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"><b>About me</b></label>
           <div class="col-8">
           <textarea class="form-control" name="about" rows="6" placeholder="I am ..."><?php echo $_POST['about']; ?></textarea>
           </div>
        </div>
        <div class="form-group row mx-auto">
           <label for="text-input" class="col-3 col-form-label ml-3"></label>
           <div class="col-8">
           <button class="btn btn-block btn-success mx-auto" type="submit" name="submit_reg" ><h5>Register</h5></button>
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


<script type="text/javascript">

  var x = document.getElementById('password');
  var y = document.getElementById('confirm-password');
  var z = document.getElementById('alert');
  
  y.onblur = function(){

    if(x.value == y.value){

      z.innerHTML = "";

    }else{

      z.style.display = "block";
      z.innerHTML = "Password does not match!";

    }
  }

</script>