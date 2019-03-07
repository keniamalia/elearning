
<body>
<div class="register-page">
  <div class="form row animated fadeInDown fast">
    <p class="title">Register an Account</p>
    <form class="login-form" method="post" action="<?php echo base_url() . 'user/register_user' ?>">
    <div class="col-12">
      <input type="text" placeholder="Fullname" name="fullname" required/>
    </div>
    <div class="col-6">
      <input type="text" placeholder="Email" name="email" required/>
      <div class="select">
        <select name="roles">
          <option value="">Please Select Roles</option>
            <?php
              foreach($data as $row){
                ?>
                <option value="<?php echo $row['iduser_role'] ?>"><?php echo $row['role_name'] ?></option>
                <?php
              }
            ?>
        </select>
      </div>
      <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" required>
    </div>
    <div class="col-6">
      <input type="text" placeholder="Username" name="username" required/>
      <input type="text" placeholder="No Telepon" name="no_telp" required/>
      <input type="password" placeholder="Password" name= "password" id="password" required>
    </div>
    <div class="col-12">
      <button type="submit" class="pure-button pure-button-primary">Register</button>
    </div>
    <p class="message">Already have an account? <a href="<?php echo base_url() . 'user/index'?>">Log in</a></p>
    </form>
  </div>
</div>
<script type="text/javascript">
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");
    
      function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }
    
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
<body>