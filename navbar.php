<style type="text/css">
  .navbar-custom{
    background-color:#3ABFC9;
  }
  .nav-item a{
    color:black !important;
  }
  .dropdown-menu{
    background-color:#3ABFC9;
  }
  .navbar-toggler-icon p{
    color: white;
  }
  .navbar-brand{
    color:black;
  }
</style>
<!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="index.php">Furniture Land</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><p>Menu</p></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexproduct.php">Products</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu">
          <?php while($rowcategory=mysqli_fetch_array($recordcategory)){
            $categoryname=$rowcategory['category'];
            ?>
          <a class="dropdown-item" href="indexcategory.php?id=<?php echo $categoryname ?>"><?php echo $rowcategory['category'] ; ?></a><?php }?>
          <a style="text-align:center;" href="repairing.php">Repairing</a>
        </div>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Store
        </a>
        <div class="dropdown-menu">
          <?php while($rowstore=mysqli_fetch_array($recordstore)){
            $storename=$rowstore['storename'];
            ?>
          <a class="dropdown-item" href="indexstore.php?storename=<?php echo $storename ?>"><?php echo $rowstore['storename'] ; ?></a><?php }?>
          
        </div>
      </li> -->
      
      
      <?php if(!isset($_SESSION['buyerid'])){
    ?> 

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="login.php" > Login as User</a>
          <a class="dropdown-item" href="loginmerchant.php" > Login as Merchant</a>
    <?php } ?>
      <?php 
      if(isset($_SESSION['buyerid'])){
    ?>
      <li class="nav-item">
        <a class="nav-link" href="account.php">Account</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="logoutbuyer.php">Logout</a>
      </li>
     <?php }
     else {
      
     }
      ?>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
      <input  name ="search" class="form-control mr-sm-2" type="search" placeholder="Search Products">
      <button type="button" class="btn btn-outline-primary" type="=submit">Search</button>
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>