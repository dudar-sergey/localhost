<?php
include_once('DB.php');
include_once('header.php');
if($_SESSION['login'] != '')
{


  $product= array();
  if ($result = $mysqli->query('SELECT * FROM cart where id_user='.$_SESSION['id'])) {
    while($tmp = $result->fetch_assoc()) {
       $product[] = $tmp;
    }
    $result->close();
     }
     $product2= array();
     if ($result2 = $mysqli->query('SELECT * FROM products')) {
       while($tmp = $result2->fetch_assoc()) {
          $product2[] = $tmp;
       }
       $result2->close();
        }
        $product3[]=array();
        foreach($product as $products)
        {
          $product3[]=$product2[$products['id_product']-1];
        }
        unset($product3[0]);
        $total=0;
        foreach($product3 as $res)
        {
          $total=$total + $res['price'];
        }

?>
 <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Продукт</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Цена</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($product3 as $res){?>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo $res['img']?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $res['title']?></a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo $res['price']?>$</strong></td>
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i><button type="button" class="btn btn-danger">X</button></a></td>
                </tr>
      <?php } ?>
              </tbody>
            </table>
          </div>
		  <div class="row py-5 p-4 bg-white rounded shadow-sm">

        <div class="col-lg-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Сумма заказа </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Итого</strong>
                <h5 class="font-weight-bold">$<?php echo $total; ?></h5>
              </li>
            </ul>
            <form class="form-signin" action="cart.php" method="post">
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-block"><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Оформить заказ</a></button>
                </form>
          </div>
        </div>
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
      Заказ оформлен
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>    
      </div>








<?php



}
else{
    exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
}
?>