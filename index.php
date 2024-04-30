<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<style type="text/css">
  .card img {
    height: 500px;
  }

  @media (max-width:780px) {
    .carousel {
      display: none;
    }
  }
</style>

<body>
  <?php
  session_start();


  include 'config.php';
  $sqlcategory = "SELECT * FROM category ";
  $recordcategory = mysqli_query($conn, $sqlcategory);
  $sqlstore = "SELECT * FROM users ";
  $recordstore = mysqli_query($conn, $sqlstore);


  $sqlproducts = "SELECT * FROM products";
  $recordproducts = mysqli_query($conn, $sqlproducts);

  $sqlslider = "SELECT * FROM slider";
  $recordslider = mysqli_query($conn, $sqlslider);

  $sqlhomeproducts = "SELECT * FROM products where storename='Store'";
  $recordhomeproducts = mysqli_query($conn, $sqlhomeproducts);
  ?>
  <?php include 'navbar.php'; ?>
  <!-- Carousel starts -->
  <?php include 'indexslider.php'; ?>

  <br><br>
  <<!-- div class="container">
    <div class="row">
      <div class="col-lg-12">
        <center>
          <h3>Products From The Store</h3>
        </center>
      </div>
    </div>
    </div> -->
    <br><br>
    <!-- Home Products -->
    <div class="container">
      <div class="row">
        <?php while ($rowhomeproducts = mysqli_fetch_array($recordhomeproducts)) {
          $productid = $rowhomeproducts['id'];
          $sessionid = session_id();
          ?>
          <div class="col-lg-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo $rowhomeproducts['location']; ?>">
              <div class="card-body">
                <a href="productsdetail.php?id=<?php echo $productid ?>">
                  <h5 class="card-title">
                    <center>
                      <?php echo $rowhomeproducts['name']; ?>
                    </center>
                  </h5>
                </a>
                <hr>
                <p>
                  <!-- Rs <?php echo $rowhomeproducts['discount']; ?> --><span style="float:right;"><s>Rs
                      <?php echo $rowhomeproducts['price']; ?>
                    </s></span>
                </p>

                <p>Product From
                  <?php echo $rowhomeproducts['storename']; ?>
                </p>
              </div>
            </div>
            <br>
          </div>
          <br><br>
        <?php } ?>
      </div>
    </div>


    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <center>
            <h3>All Products</h3>
          </center>
        </div>
      </div>
    </div>
    <br><br>

    <!--Products list starts-->
    <div class="container">
      <div class="row">
        <?php while ($rowproducts = mysqli_fetch_array($recordproducts)) {
          $productid = $rowproducts['id'];
          ?>
          <div class="col-lg-4">
            <div class="card">
              <img class="card-img-top" src="<?php echo $rowproducts['location']; ?>">
              <div class="card-body">
                <a href="productsdetail.php?id=<?php echo $productid ?>">
                  <h5 class="card-title">
                    <center>
                      <?php echo $rowproducts['name']; ?>
                    </center>
                  </h5>
                </a>
                <hr>
                <p>Rs
                  <?php echo $rowproducts['discount']; ?><span style="float:right;"><s>Rs
                      <?php echo $rowproducts['price']; ?>
                    </s></span>
                </p>

                <p>Product From
                  <?php echo $rowproducts['storename']; ?>
                </p>
              </div>
            </div>
            <br>
          </div>
          <br><br>
        <?php } ?>
      </div>
    </div>









    <!-- Footer starts -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
      </script>
</body>

</html>