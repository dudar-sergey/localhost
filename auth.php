<?php
include_once('DB.php');
include_once('header.php');
if($_SESSION['login'] == '')
{
?>
 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Авторизация</h5>
            <form class="form-signin" action="auth.php" method="post">
              <div class="form-label-group">
                <input type="text" id="login" name="login" class="form-control" placeholder="Username">
                <br>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <br>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Вход</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if(isset($_POST['submit']))
  {
      $err = array();
      $login = $_POST['login'];
      $password = $_POST['password'];
      if ($login =='' or $password=='') 
                {
                $err[] = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
                }
    $user = array();
    if ($result = $mysqli->query('SELECT * FROM users where login="'.$login.'"')) {
      while($tmp = $result->fetch_assoc()) {
         $user[] = $tmp;
      }
      $result->close();
       }
       if (count($user)!=0) {

        if($user[0]['password'] == $password)
        {
            
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['login'] = $user[0]['login'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];
            $_SESSION['admin'] = $user[0]['admin'];
        }
        else{

          $err[] = "Неправильный логин или пароль";
        }

        

        }
        else
          {
            $err[] = "Неправильный логин или пароль";
          }

            if(count($err)!=0)
            {
              foreach($err as $error)
                    {
                      echo '<div class="text-center"><p class="text-muted">Ошибка! Вы не авторизованы.<br>'.$error.'</p><br></div>';
                    }
            }
            else{
              echo '<div class="text-center"><p class="text-muted">Вы авторизованы<br></p><br></div>';
              exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
            }





  }
}
else{
  exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
}
  ?>