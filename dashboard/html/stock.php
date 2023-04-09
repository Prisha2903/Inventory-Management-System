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
      <title>Stock</title>
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
      <!-- stock section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">List of Items</h1>
            <button type="button" name='insert' class="readmore_bt" data-toggle="modal" data-target="#insertModal">Insert</a></button>
            <table class="content-member table table-hover">
          <thead class="thead-dark">
             <tr class="name-row">
               <th>Stock ID</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th>Supplier ID</th>
               <th>Cat ID</th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody>
           <?php 
                include $_SERVER["DOCUMENT_ROOT"].'/inventory_db/connection/connection.php';
                
                $query = $conn->query("SELECT * FROM `stock` ORDER BY INV_ID");
                while($row = $query->fetch_array()) 
                {
                  
                    ?>
                    <!-- update column -->
                    <tr>
                         <td classs="edit"> <?php echo $row['STK_ID'];?></td>
                         <td classs="edit"> <?php echo $row['ITEM_NAME'];?> </td>
                         <td classs="edit"> <?php echo $row['QUANTITY'];?> </td>
                         <td classs="edit"> <?php echo $row['SUP_ID'];?> </td>
                         <td classs="edit"> <?php echo $row['INV_ID'];?> </td>
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
                                    <h4 class="modal-title">Update Stock</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Stock ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Item Name</label>
                                          <input type="text" class="form-control" name="sname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="quantity">Quantity</label>
                                          <input type="number" class="form-control" name="squan">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="supid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id">Category ID</label>
                                          <input type="text" class="form-control" name="catid">
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
                                    <h4 class="modal-title">Delete Item</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Stock ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
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
                                    <h4 class="modal-title">Insert Items</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Stock ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Item Name</label>
                                          <input type="text" class="form-control" name="sname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="quantity">Quantity</label>
                                          <input type="number" class="form-control" name="squan">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="supid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id">Category ID</label>
                                          <input type="text" class="form-control" name="catid">
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
                 
                  //$stock_count=$_POST['sitem'];
                  if(empty($_POST['sid']))
                  {
                     ?> <script>alert("stock ID should not be empty")</script><?php
                  }else{
                     $sql = "SELECT STK_ID FROM stock where STK_ID = '".$_POST['sid']."'";
                     $res = $conn->query($sql);
                     $num= $res->num_rows;
                     if ($num >0 ){
                        $stock_id=$_POST['sid'];
                     }
                     else{
                        ?> <script>alert("there is no item available with the given ID")</script><?php
                     }
                  }
                  if(empty($_POST['sname']))
                  {
                     ?> <script>alert("Item Name should not be empty")</script><?php
                  }else{
                     $stock_name=$_POST['sname'];
                  }
                  if(empty($_POST['squan']))
                  {
                     ?> <script>alert("Quantity should not be empty")</script><?php
                  }else{
                     $stock_quantity=$_POST['squan'];
                  }
                  if(empty($_POST['supid']))
                  {
                     ?> <script>alert("Supplier ID should not be empty")</script><?php
                  }else{
                     $stock_supid=$_POST['supid'];
                  }
                  if(empty($_POST['catid']))
                  {
                     ?> <script>alert("Inv ID should not be empty")</script><?php
                  }else{
                     $stock_catid=$_POST['catid'];
                  }

                  if(!empty($stock_id) && !empty($stock_name))
                  {
                     $sq = "UPDATE STOCK SET ITEM_NAME='".$stock_name."',QUANTITY='".$stock_quantity."',SUP_ID='".$stock_supid."',INV_ID='".$stock_catid."'
                     where STK_ID = '".$stock_id."'";
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
                
                 //$stock_count=$_POST['sitem'];
                 if(empty($_POST['sid']))
                 {
                    ?> <script>alert("stock ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT STK_ID FROM stock where STK_ID = '".$_POST['sid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                     ?> <script>alert("stock exists with the given ID")</script><?php
                      // $stock_id=$_POST['sid'];
                    }
                    else{
                     $stock_id=$_POST['sid'];
                    }
                 }
                if(empty($_POST['sname']))
                 {
                    ?> <script>alert("Supplier Name should not be empty")</script><?php
                 }else{
                    $stock_name=$_POST['sname'];
                 }
                 if(empty($_POST['squan']))
                  {
                     ?> <script>alert("Quantity should not be empty")</script><?php
                  }else{
                     $stock_quantity=$_POST['squan'];
                  }
                  if(empty($_POST['supid']))
                  {
                     ?> <script>alert("Supplier ID should not be empty")</script><?php
                  }else{
                     $stock_supid=$_POST['supid'];
                  }
                  if(empty($_POST['catid']))
                  {
                     ?> <script>alert("Inv ID should not be empty")</script><?php
                  }else{
                     $stock_catid=$_POST['catid'];
                  }
                 if(!empty($stock_id) && !empty($stock_name))
                 {
                    $sq = "INSERT INTO STOCK VALUES('".$stock_id."' ,'".$stock_name."','".$stock_quantity."','".$stock_supid."','".$stock_catid."')";
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
                
                 //$stock_count=$_POST['sitem'];
                 if(empty($_POST['sid']))
                 {
                    ?> <script>alert("stock ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT STK_ID FROM stock where STK_ID = '".$_POST['sid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                       $stock_id=$_POST['sid'];
                    }
                    else{
                       ?> <script>alert("there is no stock available with the given ID")</script><?php
                    }
                 }
                 if(!empty($stock_id))
                 {
                    $sq = "DELETE FROM stock where STK_ID = '".$_POST['sid']."'";
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
      <!-- stock section end -->
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
   </body>
</html>