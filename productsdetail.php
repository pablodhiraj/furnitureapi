<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
  integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
  integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
<style type="text/css">
  .card img {
    height: 250px;
  }

  .review {
    margin-top: 10rem !important;
  }

  @media (max-width:780px) {
    .carousel {
      display: none;
    }
  }

  .description {
    min-height: 400px;
    margin-top: 80px;
    margin-bottom: 80px;
  }
</style>

<body>
  <?php
  session_start();


  // Display the output array
  if (!isset($_SERVER['MY_GLOBAL_VARIABLE'])) {
    // Set the default value for the global variable
    $_SERVER['MY_GLOBAL_VARIABLE'] = 'default value';
  }
  include 'config.php';
  $sqlcategory = "SELECT * FROM category ";
  $recordcategory = mysqli_query($conn, $sqlcategory);

  $id = $_GET['id'];
  $productid = $id;
  $sqlproducts = "SELECT * FROM products WHERE id='$id'";

  $recordproducts = mysqli_query($conn, $sqlproducts);


  $sqlstore = "SELECT * FROM users ";
  $recordstore = mysqli_query($conn, $sqlstore);
  ?>
  <?php include 'navbar.php'; ?>
  <br><br>
  <div class="container description">
    <div class="row">

      <?php while ($rowproducts = mysqli_fetch_array($recordproducts)) {

        $user = $rowproducts['userid'];
        $storename = $rowproducts['storename'];
        $productname = $rowproducts['name'];
        $productcategory = $rowproducts['category'];
        $price = $rowproducts['price'];
        $pythonScript = 'test.py';
        $inputString = $rowproducts['name'];
        $command = 'python ' . $pythonScript . ' "' . $inputString . '"';
        $output = shell_exec($command);

        // Convert the output string to an array using a specific delimiter
        $delimiter = ','; // Replace with the delimiter used in the Python script
        $globaloutputArray = explode($delimiter, trim($output));
        $_SERVER['MY_GLOBAL_VARIABLE'] = $globaloutputArray;


        ?>
        <div class="col-lg-6">
          <img class="card-img-top" src="<?php echo $rowproducts['location']; ?>">
        </div>
        <div class="col-lg-6">

          <h5>
            <?php echo $rowproducts['name']; ?>
          </h5>
          <p>Orignal Price Rs:
            <?php echo $rowproducts['price']; ?>
          </p>
          <p>Discounted Price Rs:
            <?php echo $rowproducts['discount']; ?>
          </p>
          <h5>Description</h5>
          <p>
            <?php echo $rowproducts['description']; ?>
          </p>
          <h5>Store Name</h5>
          <p>
            <?php echo $storename; ?>
          </p>

          <?php
          $soldOutSql = "SELECT soldout From products where id='$productid'";
          $recordsold = mysqli_query($conn, $soldOutSql);
          $rowsold = mysqli_fetch_array($recordsold);
          $soldout = $rowsold['soldout'];
          if ($soldout == "0") {
            echo ('<button type="button" class="btn btn-secondary">
              Sold Out
            </button>');
          } else {
            if (isset($_SESSION['buyerid'])) {
              $uid = $_SESSION['buyerid'];
              $sql = "SELECT * FROM buyer where id='$uid'";
              $record = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($record);
              $buyerid = $row['id'];
              $buyeremail = $row['email'];
              ?>
              <a href="addtocart.php?id=<?php echo $productid; ?>&user=<?php echo $productid; ?>&buyerid=<?php echo $buyerid; ?>&storename=<?php echo $storename; ?>"
                class="btn btn-danger">Add To Cart</a>
              <a href="checkout.php?id=<?php echo $productid; ?>&user=<?php echo $productid; ?>&buyerid=<?php echo $buyerid; ?>&buyeremail=<?php echo $buyeremail; ?>&storename=<?php echo $storename; ?>"
                class="btn btn-primary">Checkout</a>
              <?php
            } else {
              ?>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Add To Cart
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Checkout
              </button>
              <?php
            }
          }

          ?>

        </div>
      <?php } ?>
    </div>
  </div>
  <section>
    <div class="container">

      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 text-center">
              <h1 class="text-warning mt-4 mb-4">
                <b><span id="average_rating">0.0</span> / 5</b>
              </h1>
              <div class="mb-3">
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
                <i class="fas fa-star star-light mr-1 main_star"></i>
              </div>
              <h3><span id="total_review">0</span> Review</h3>
            </div>
            <div class=" col-sm-6">
              <p>
              <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                  aria-valuemax="100" id="five_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                  aria-valuemax="100" id="four_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                  aria-valuemax="100" id="three_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                  aria-valuemax="100" id="two_star_progress"></div>
              </div>
              </p>
              <p>
              <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

              <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                  aria-valuemax="100" id="one_star_progress"></div>
              </div>
              </p>
            </div>
            <div class="col-sm-6 text-center">
              <h3 class="mt-5 mb-3 review">Write Review Here</h3>
              <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-5" id="review_content"></div>
    </div>


    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Submit Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="text-center mt-2 mb-4">
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
              <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
            </h4>
            <div class="form-group">
              <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
            </div>
            <div class="form-group">
              <textarea name="user_review" id="user_review" class="form-control"
                placeholder="Type Review Here"></textarea>
            </div>
            <div class="form-group text-center mt-4">
              <button type="button" class="btn btn-primary" id="save_review">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <h3>
      <center>Recommended</center>
    </h3>
    <hr>
    <div class="container">
      <div class="row">

        <?php foreach ($_SERVER['MY_GLOBAL_VARIABLE'] as $element) {
          if (empty($element)) {
            // This is the last iteration, so skip it
            continue;
          }

          $trimmedString = trim($element);


          $sqlproductes = "SELECT * FROM products where name LIKE '%$trimmedString%' ";


          $recordproductes = mysqli_query($conn, $sqlproductes);

          // Execute the query
          $result = $conn->query($sqlproductes);

          // Check if any results were returned
          if ($result->num_rows > 0) {

            // Output data for each row
            while ($row = $result->fetch_assoc()) {
              $productid = $row['id'];
              ?>
              <div class="col-lg-4">
                <div class="card">
                  <img class="card-img-top" src="<?php echo $row['location']; ?>">
                  <div class="card-body">
                    <a href="productsdetail.php?id=<?php echo $productid ?>">
                      <h5 class="card-title">
                        <center>
                          <?php echo $row['name']; ?>
                        </center>
                      </h5>
                    </a>
                    <hr>
                    <p>
                      <!-- Rs <?php echo $row['discount']; ?> --><span style="float:right;"><s>Rs
                          <?php echo $row['price']; ?>
                        </s></span>
                    </p>

                    <p>Product From
                      <?php echo $row['storename']; ?>
                    </p>
                  </div>
                </div>
                <br>
              </div>
              <br><br>
              <?php
              // Add more fields as needed
              break;
            }
          } else {
            echo "No products found.";
          }

          // Close the database connection
        



        } ?>

      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter Your Login Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="buyerlogin.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="EMAIL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>









    <!-- Footer starts -->
    <?php include 'footer.php'; ?>
    <script>
      var rating_data = 0;

      $('#add_review').click(function () {

        $('#review_modal').modal('show');

      });

      $(document).on('mouseenter', '.submit_star', function () {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

          $('#submit_star_' + count).addClass('text-warning');

        }

      });

      function reset_background() {
        for (var count = 1; count <= 5; count++) {

          $('#submit_star_' + count).addClass('star-light');

          $('#submit_star_' + count).removeClass('text-warning');

        }
      }

      $(document).on('mouseleave', '.submit_star', function () {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

          $('#submit_star_' + count).removeClass('star-light');

          $('#submit_star_' + count).addClass('text-warning');
        }

      });

      $(document).on('click', '.submit_star', function () {

        rating_data = $(this).data('rating');

      });

      $('#save_review').click(function () {

        var user_name = $('#user_name').val();
        var product_id = <?php echo $productid; ?>;
        var user_review = $('#user_review').val();


        if (user_name == '' || user_review == '') {
          alert("Please Fill Both Field");
          return false;
        } else {
          $.ajax({
            url: "submit_rating.php",
            method: "POST",
            data: {
              rating_data: rating_data,
              user_name: user_name,
              user_review: user_review,
              product_id: product_id
            },
            success: function (data) {
              $('#review_modal').modal('hide');

              load_rating_data();

              console.log(data);

            }
          })
        }

      });



      load_rating_data();

      function load_rating_data() {
        $.ajax({
          url: "submit_rating.php",
          method: "POST",
          data: {
            action: 'load_data',
            productid: '<?php echo $productid; ?>'
          },
          dataType: "JSON",
          success: function (data) {
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function () {
              count_star++;
              if (Math.ceil(data.average_rating) >= count_star) {
                $(this).addClass('text-warning');
                $(this).addClass('star-light');
              }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review / data.total_review) *
              100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review / data.total_review) *
              100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review / data.total_review) *
              100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 +
              '%');

            $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 +
              '%');

            if (data.review_data.length > 0) {
              var html = '';

              for (var count = 0; count < data.review_data.length; count++) {
                html += '<div class="row mb-3">';
                html
                  +=
                  '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' +
                  data.review_data[count].user_name.charAt(0) + '</h3></div></div>';
                html += '<div class="col-sm-11">';
                html
                  += '<div class="card">';
                html += '<div class="card-header"><b>' + data.review_data[count].user_name +
                  '</b></div>';
                html += '<div class="card-body">';
                for (var star = 1; star <= 5; star++) {
                  var class_name = '';
                  if (data.review_data[count].rating >= star) {
                    class_name = 'text-warning';
                  } else {
                    class_name = 'star-light';
                  }

                  html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                }

                html += '<br />';

                html += data.review_data[count].user_review;

                html += '</div>';

                html += '<div class="card-footer text-right">On ' + data.review_data[count]
                  .datetime + '</div>';

                html += '</div>';

                html += '</div>';

                html += '</div>';
              }

              $('#review_content').html(html);
            }
          }
        })
      }
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
</body>

</html>