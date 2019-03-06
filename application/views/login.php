<!DOCTYPE html>
<body>
<div class="login-page">
  <div class="form animated fadeInDown fast">
      <p class="title">Log in</p>
    <form class="login-form" method="post" action="<?php echo base_url() . 'user/user_login'?>" role="form">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required/>
      <input type="hidden" name="action" value="login"/>
      <button type="submit">Login</button>
      <p class="message">Not registered? <a href="register.html">Create an account</a></p>
    </form>
  </div>
</div>
<body>
</html>