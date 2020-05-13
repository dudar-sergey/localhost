<?php
include_once('DB.php');
include_once('header.php');
if($_SESSION['login'] == '')
{
?>
  <div class="container">
  
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Регистрация</h5>
            <form class="form-signin" action="registration.php" method="post">
              <div class="form-label-group">
              
                <input type="text" name="login" class="form-control" placeholder="Username" required autofocus>
                <br>
              </div>

              <div class="form-label-group">
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                <br>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <br>
              </div>
              
              <div class="form-label-group">
                <input type="password" name="cpassword" class="form-control" placeholder="Password" required>
                <br>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Зарегистрироваться</button>
              


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
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

  if($password!=$cpassword)
  {
    $err[] = "Пароли не совпадают";
  }

 if ($login =='' or $password=='' or $cpassword=='') //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
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
        $err[] = "Такой логин уже существует";
        }
        $nol = 0;
        
        if (count($err) == 0)
        {
        echo '<div class="text-center"><p class="text-muted">Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href="index.php">Главная страница</a></p><br></div>';
        $result2 = $mysqli->query("INSERT INTO `users` (login, email, password, admin) VALUES ('".$login."', '".$email."', '".$password."', '".$nol."')");
        }
     else {
       foreach($err as $error)
        {
          echo '<div class="text-center"><p class="text-muted">Ошибка! Вы не зарегистрированы.<br>'.$error.'</p><br></div>';
        }
        }
        
      }
      $mysqli -> close();
    }
    else{
      exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
    }
  ?>
