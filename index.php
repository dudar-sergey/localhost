<?php
include_once('header.php');
include_once ('DB.php');
?>
<head>

</head>

<body>


  <!-- Page Content -->
  <div class="container">

  <div class="row">

    <?php
include_once('cat.php');
    ?>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="/img/slide1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/img/slide2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/img/slide3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
            <p> Hello</p>
        </div>
        <?php
      $products = array();
        if ($result = $mysqli->query('SELECT * FROM products')) {
         while($tmp = $result->fetch_assoc()) {
            $products[] = $tmp;
         }
       $result->close();
          }
        ?>

        <div class="row">
        
        <?php foreach($products AS $product) { 

          $cat = isset($_REQUEST['cat']) ? (int) $_REQUEST['cat'] : 0;
          
          if($cat != 0) {
          if ($cat == $product['cat']) {
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $product['img']?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="\about.php?id=<?php echo $product['id']?>"><?php echo $product['title'];?></a>
                </h4>
                <h5>$<?php echo $product['price'];?></h5>
                <p class="card-text"><?php echo $product['intro'];?></p>
                <button type="button" class="btn btn-dark">В корзину</button>
              </div>
            </div>
          </div>
          <?php } ?>
         <?php } ?>
         <?php if($cat == 0) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $product['img']?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="\about.php?id=<?php echo $product['id']?>"><?php echo $product['title'];?></a>
                </h4>
                <h5>$<?php echo $product['price'];?></h5>
                <p class="card-text"><?php echo $product['intro'];?></p>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-dark"><a class="product_id" data-id="<?php echo $product['id'];?>">В корзину</a></button>
              </div>
            </div>
          </div>

         <?php } ?>
      <?php  }?>


        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php  if($_SESSION['id'] == ''){
        
        
        echo "Войдите или зарегистрируйтесь";
        
      }
      else{
        echo "Добавлено в корзину";
      }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>


  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Stankin 2020</p>
    </div>

    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->

  <?php
  $current_id = $_POST['current_id'];
  if($current_id){        
  $result2 = $mysqli->query("INSERT INTO `cart` (id_product, id_user) VALUES ('".$current_id."', '".$_SESSION['id']."')");
  }
?>

  </body>

</html>
