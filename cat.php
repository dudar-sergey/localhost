
<?php
include_once('DB.php');
?>

<body>
<?php
$categories = array();
if ($result = $mysqli->query('SELECT * FROM categories')) {
    while($tmp = $result->fetch_assoc()) {
        $categories[] = $tmp;
    }
    $result->close();
}
?>
<div class="col-md-3">
   <p class="lead"><br></p>
   <div class="list-group">
   <a href="index.php" class="list-group-item">Все категории</a>
        <?php
            foreach($categories AS $category) {
                echo ' <a href="index.php?cat=' . $category['id'] . '" class="list-group-item">' . $category['title'] . '</a>';
            }
        ?>
    </div>
</div>
</body>
</html>