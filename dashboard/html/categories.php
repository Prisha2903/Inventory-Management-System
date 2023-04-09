<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Categories</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="categories.php">Categories</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="stock.php">Stock</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="suppliers.php">Suppliers</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="home.php">Home</a></li>
                     <li><a href="categories.php">Categories</a></li>
                     <li><a href="stock.php">Stock</a></li>
                     <li><a href="suppliers.php">Suppliers</a></li>
                     <li><a href="../../login-form-08/login.php">logout</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- categories section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Categories</h1>
            <button type="button" name='insert' class="readmore_bt" data-toggle="modal" data-target="#insertModal">Insert</a></button>
            <!-- categories table display -->
         <table class="content-member table table-hover">
          <thead class="thead-dark">
            <tr class="name-row">
              <th>CAT_ID</th>
              <th>Name</th>
              <th>No. of items</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php 
                include $_SERVER["DOCUMENT_ROOT"].'/inventory_db/connection/connection.php';

                $query = $conn->query("SELECT * FROM `categories`");
                while($row = $query->fetch_array())
                {

                    ?>
                    <!-- update column -->
                    <tr>
                        <td classs="edit" id='prodID'> <?php echo $row['INV_ID'];?></td>
                        <td classs="edit"> <?php echo $row['INV_NAME'];?> </td>
                        <td classs="edit"> <?php echo $row['NO_OF_ITEMS'];?> </td>
                        <td class="edit-save">
                          <button type="button" name='edit' class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateModal">Edit</a></button>
                          <button type="button" name='delete' class="readmore_bt" data-toggle="modal" data-target="#deleteModal">Delete</a></button>
                        </td>
                        <!-- update -->
                        <div id="updateModal" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Update Categories</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Category ID</label>
                                          <input type="text" class="form-control" name="pid" id="pid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Category Name</label>
                                          <input type="text" class="form-control" name="pname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="pitem">Number of Items</label>
                                          <input type="pitem" class="form-control" name="pitem">
                                       </div>
                                       <input type="submit" value="update" class="btn text-white btn-block btn-primary" name="update">   
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- delete -->
                        <div id="deleteModal" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Categories</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Category ID</label>
                                          <input type="text" class="form-control" name="pid" id="pid">
                                       </div>
                                       <input type="submit" value="delete" class="btn text-white btn-block btn-primary" name="delete">   
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- insert -->
                        <div id="insertModal" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Insert Categories</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Category ID</label>
                                          <input type="text" class="form-control" name="pid" id="pid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Category Name</label>
                                          <input type="text" class="form-control" name="pname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="pitem">Number of Items</label>
                                          <input type="pitem" class="form-control" name="pitem">
                                       </div>  
                                       <input type="submit" value="insert" class="btn text-white btn-block btn-primary" name="insert">   
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </tr>

                        
                   <?php
                }

                //update operation
                if(isset($_POST['update']))
                {
                 
                  $product_count=$_POST['pitem'];
                  if(empty($_POST['pid']))
                  {
                     ?> <script>alert("Product ID should not be empty")</script><?php
                  }else{
                     $sql = "SELECT INV_ID FROM categories where INV_ID = '".$_POST['pid']."'";
                     $res = $conn->query($sql);    
                     $num= $res->num_rows;
                     if ($num >0 ){
                        $product_id=$_POST['pid'];
                     }
                     else{
                        ?> <script>alert("there is no product available with the given ID")</script><?php
                     }
                  }
                  if(empty($_POST['pname']))
                  {
                     ?> <script>alert("Product Name should not be empty")</script><?php
                  }else{
                     $product_name=$_POST['pname'];
                  }
                  if(empty($product_count))
                  {
                     $product_count=0;
                  }
                  if(!empty($product_id) && !empty($product_name))
                  {
                     $sq = "UPDATE categories SET INV_NAME='".$product_name."',NO_OF_ITEMS='".$product_count."'
                     where INV_ID = '".$product_id."'";
                    $result = $conn->query($sq);
                    if($result)
                    {
                       ?><script>alert("Update successful")</script><?php
                    }
                  }
               }

               //insert operation
               if(isset($_POST['insert']))
               {
                
                 $product_count=$_POST['pitem'];
                 if(empty($_POST['pid']))
                 {
                    ?> <script>alert("Product ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT INV_ID FROM categories where INV_ID = '".$_POST['pid']."'";
                    $res = $conn->query($sql);
                    $num= $res->num_rows;
                    if ($num >0 ){
                     ?> <script>alert("Product exists with the given ID")</script><?php
                    }
                    else{
                     $product_id=$_POST['pid'];
                    }
                 }
                if(empty($_POST['pname']))
                 {
                    ?> <script>alert("Product Name should not be empty")</script><?php
                 }else{
                    $product_name=$_POST['pname'];
                 }
                 if(empty($product_count))
                 {
                    $product_count=0;
                 }
                 if(!empty($product_id) && !empty($product_name))
                 {
                    $sq = "INSERT INTO CATEGORIES(INV_ID, INV_NAME, NO_OF_ITEMS) VALUES('".$product_id."' ,'".$product_name."','".$product_count."')";
                   $result = $conn->query($sq);
                   if($result)
                   {
                      ?><script>alert("Insert successful")</script><?php
                   }
                 }
              }

              //delete operation
              if(isset($_POST['delete']))
               {

                 //$product_count=$_POST['pid'];
                 if(empty($_POST['pid']))
                 {
                    ?> <script>alert("Category ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT INV_ID FROM categories where INV_ID = '".$_POST['pid']."'";
                    $res = $conn->query($sql);
                    $num= $res->num_rows;
                    if ($num >0 ){
                       $product_id=$_POST['pid'];
                    }
                    else{
                       ?> <script>alert("there is no category available with the given ID")</script><?php
                    }
                 }
                 if(!empty($product_id))
                 {
                  $conn->query("call delete_category($_POST[pid]) ");
                    $sq = "DELETE FROM categories where INV_ID = '".$_POST['pid']."'";
                   $result = $conn->query($sq);
                   if($result)
                   {
                      ?><script>alert("Delete successful")</script><?php
                   }
                 }
              }

            ?>
            

            </tbody>
            </table>
         </div>
      </div>
      <!-- categories section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
         }
      </script>
   </body>
</html>