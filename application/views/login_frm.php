<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Login</title>
<link href="<?=base_url("admin-assets/css/login.css")?>" rel="stylesheet" />
</head>

<body>






<div id="wrapper">




<div class="loginmodal-container">
<h1>Login Admin Panel</h1><br>
<form method="post" action="<?=base_url("login")?>" enctype="multipart/form-data">
<label>Email</label>
<input type="text" name="userEmail" placeholder="Email">
<label>Password</label>
<input type="password" name="password" placeholder="Password">
<input type="submit" name="login" class="login loginmodal-submit" value="Login">
</form>
</div>




</div>



</body>
</html>