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
      <title>Suppliers</title>
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
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">List of Suppliers</h1>
            <button type="button" name='insert' class="readmore_bt" data-toggle="modal" data-target="#insertModal">Insert</a></button>
         <table class="content-member table table-hover">
          <thead class="thead-dark">
             <tr class="name-row">
               <th>Supplier ID</th>
               <th>Supplier Name</th>
               <th>Phone</th>
               <th>Email</th>
               <th>Location</th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody>
           <?php 
                include $_SERVER["DOCUMENT_ROOT"].'/inventory_db/connection/connection.php';
                
                $query = $conn->query("SELECT * FROM `supplier`");
                while($row = $query->fetch_array()) 
                {
                  
                    ?>
                    <!-- update column -->
                    <tr>
                         <td classs="edit"> <?php echo $row['SUP_ID'];?></td>
                         <td classs="edit"> <?php echo $row['SUP_NAME'];?> </td>
                         <td classs="edit"> <?php echo $row['SUP_MOBILE'];?> </td>
                         <td classs="edit"> <?php echo $row['SUP_EMAIL'];?> </td>
                         <td classs="edit"> <?php echo $row['SUP_LOCATION'];?> </td>
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
                                    <h4 class="modal-title">Update Suppliers</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Supplier Name</label>
                                          <input type="text" class="form-control" name="sname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="phone">Phone</label>
                                          <input type="text" class="form-control" name="smobile">
                                       </div>
                                       <div class="form-group first">
                                          <label for="mail">Email</label>
                                          <input type="email" class="form-control" name="semail">
                                       </div>
                                       <div class="form-group first">
                                          <label for="location">Location</label>
                                          <input type="text" class="form-control" name="slocation">
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
                                    <h4 class="modal-title">Delete Suppliers</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
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
                                    <h4 class="modal-title">Insert Suppliers</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="name">Supplier Name</label>
                                          <input type="text" class="form-control" name="sname">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="phone">Phone</label>
                                          <input type="number" class="form-control" name="smobile">
                                       </div>
                                       <div class="form-group first">
                                          <label for="mail">Email</label>
                                          <input type="email" class="form-control" name="semail">
                                       </div>
                                       <div class="form-group first">
                                          <label for="location">Location</label>
                                          <input type="text" class="form-control" name="slocation">
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
                 
                  //$supplier_count=$_POST['sitem'];
                  if(empty($_POST['sid']))
                  {
                     ?> <script>alert("supplier ID should not be empty")</script><?php
                  }else{
                     $sql = "SELECT SUP_ID FROM supplier where SUP_ID = '".$_POST['sid']."'";
                     $res = $conn->query($sql);    
                     $num= $res->num_rows;
                     if ($num >0 ){
                        $supplier_id=$_POST['sid'];
                     }
                     else{
                        ?> <script>alert("there is no supplier available with the given ID")</script><?php
                     }
                  }
                  if(empty($_POST['sname']))
                  {
                     ?> <script>alert("Supplier Name should not be empty")</script><?php
                  }else{
                     $supplier_name=$_POST['sname'];
                  }
                  if(empty($_POST['smobile']))
                  {
                     ?> <script>alert("Phone number should not be empty")</script><?php
                  }else{
                     $supplier_mobile=$_POST['smobile'];
                  }
                  if(empty($_POST['semail']))
                  {
                     ?> <script>alert("Email should not be empty")</script><?php
                  }else{
                     $supplier_mail=$_POST['semail'];
                  }
                  if(empty($_POST['slocation']))
                  {
                     ?> <script>alert("Location should not be empty")</script><?php
                  }else{
                     $supplier_location=$_POST['slocation'];
                  }
                  /*if(empty($supplier_count))
                  {
                     $supplier_count=0;
                  }*/
                  if(!empty($supplier_id) && !empty($supplier_name))
                  {
                     $sq = "UPDATE SUPPLIER SET SUP_NAME='".$supplier_name."',SUP_MOBILE='".$supplier_mobile."',SUP_EMAIL='".$supplier_mail."',SUP_LOCATION='".$supplier_location."'
                     where SUP_ID = '".$supplier_id."'";
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
                
                 //$supplier_count=$_POST['sitem'];
                 if(empty($_POST['sid']))
                 {
                    ?> <script>alert("supplier ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT SUP_ID FROM supplier where SUP_ID = '".$_POST['sid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                     ?> <script>alert("supplier exists with the given ID")</script><?php
                      // $supplier_id=$_POST['sid'];
                    }
                    else{
                     $supplier_id=$_POST['sid'];
                    }
                 }
                if(empty($_POST['sname']))
                 {
                    ?> <script>alert("Supplier Name should not be empty")</script><?php
                 }else{
                    $supplier_name=$_POST['sname'];
                 }
                 if(empty($_POST['smobile']))
                  {
                     ?> <script>alert("Phone number should not be empty")</script><?php
                  }else{
                     $supplier_mobile=$_POST['smobile'];
                  }
                  if(empty($_POST['semail']))
                  {
                     ?> <script>alert("Email should not be empty")</script><?php
                  }else{
                     $supplier_mail=$_POST['semail'];
                  }
                  if(empty($_POST['slocation']))
                  {
                     ?> <script>alert("Location should not be empty")</script><?php
                  }else{
                     $supplier_location=$_POST['slocation'];
                  }
                 if(!empty($supplier_id) && !empty($supplier_name))
                 {
                    $sq = "INSERT INTO SUPPLIER VALUES('".$supplier_id."' ,'".$supplier_name."','".$supplier_mobile."','".$supplier_mail."','".$supplier_location."')";
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
                
                 //$supplier_count=$_POST['sitem'];
                 if(empty($_POST['sid']))
                 {
                    ?> <script>alert("supplier ID should not be empty")</script><?php
                 }else{
                    $sql = "SELECT SUP_ID FROM supplier where SUP_ID = '".$_POST['sid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                       $supplier_id=$_POST['sid'];
                    }
                    else{
                       ?> <script>alert("there is no supplier available with the given ID")</script><?php
                    }
                 }
                 if(!empty($supplier_id))
                 {
                    $sq = "DELETE FROM supplier where SUP_ID = '".$_POST['sid']."'";
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
         
      <!-- supplies table -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Supply Details</h1>
            <button type="button" name='insert' class="readmore_bt" data-toggle="modal" data-target="#insertModal1">Insert</a></button>
         <table class="content-member table table-hover">
          <thead class="thead-dark">
             <tr class="name-row">
               <th>Supplier ID</th>
               <th>Stock ID</th>
               <th>Item Name</th>
               <th>Quantity</th>
               <th></th>
               <th></th>
             </tr>
           </thead>
           <tbody>
           <?php 
                include $_SERVER["DOCUMENT_ROOT"].'/inventory_db/connection/connection.php';
                
                $query = $conn->query("SELECT * FROM `supplies` ORDER BY 'SUP_ID'");
                while($row = $query->fetch_array()) 
                {
                  
                    ?>
                    <!-- update column -->
                    <tr>
                         <td classs="edit"> <?php echo $row['SUP_ID'];?></td>
                         <td classs="edit"> <?php echo $row['STK_ID'];?> </td>
                         <td classs="edit"> <?php echo $row['ITEM_NAME'];?> </td>
                         <td classs="edit"> <?php echo $row['QUANTITY'];?> </td>
                        <td class="edit-save">
                          <button type="button" name='edit' class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateModal1">Edit</a></button>
                          <button type="button" name='delete' class="readmore_bt" data-toggle="modal" data-target="#deleteM">Delete</a></button>
                        </td>
                        <!-- update -->
                        <div id="updateModal1" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Update Supply Table</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="sid" id="sid">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id1">Stock ID</label>
                                          <input type="text" class="form-control" name="stid" id='stid'>
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="name">Item Name</label>
                                          <input type="text" class="form-control" name="sitem">
                                       </div>
                                       <div class="form-group first">
                                          <label for="quan">Quantity</label>
                                          <input type="number" class="form-control" name="squan">
                                       </div>
                                       <input type="submit" value="update" class="btn text-white btn-block btn-primary" name="update1">   
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- delete -->
                        <div id="deleteM" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Supplies</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="sid1" id="sid1">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id">Stock ID</label>
                                          <input type="text" class="form-control" name="stid" id="stid">
                                       </div>
                                       <input type="submit" value="delete" class="btn text-white btn-block btn-primary" name="delete1">   
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- insert -->
                        <div id="insertModal1" class="modal fade" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title">Insert Supplies</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                       <div class="form-group first">
                                          <label for="id">Supplier ID</label>
                                          <input type="text" class="form-control" name="sid1" id="sid1">
                                       </div>
                                       <div class="form-group first">
                                          <label for="id1">Stock ID</label>
                                          <input type="text" class="form-control" name="stid">
                                       </div>
                                       <div class="form-group last mb-4">
                                          <label for="name">Item Name</label>
                                          <input type="text" class="form-control" name="sitem">
                                       </div>
                                       <div class="form-group first">
                                          <label for="quan">Quantity</label>
                                          <input type="number" class="form-control" name="squan">
                                       </div>
                                       <input type="submit" value="insert" class="btn text-white btn-block btn-primary" name="insert1">   
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
                if(isset($_POST['update1']))
                {
                 
                  //$supplier_count=$_POST['sitem'];
                  if(empty($_POST['sid']))
                  {
                     ?> <script>alert("Supplier ID should not be empty")</script><?php
                  }else{
                     $sql = "SELECT SUP_ID FROM supplier where SUP_ID = '".$_POST['sid']."'";
                     $res = $conn->query($sql);    
                     $num= $res->num_rows;
                     if ($num >0 ){
                        $supplier_id=$_POST['sid'];
                     }
                     else{
                        ?> <script>alert("Supplier ID does not exist")</script><?php
                     }
                  }
                  if(empty($_POST['stid']))
                  {
                     ?> <script>alert("Stock ID should not be empty")</script><?php
                  }else{
                     $sql = "SELECT STK_ID FROM stock where STK_ID = '".$_POST['stid']."'";
                     $res = $conn->query($sql);    
                     $num= $res->num_rows;
                     if ($num >0 ){
                        $stk_id=$_POST['stid'];
                     }
                     else{
                        ?> <script>alert("Stock ID does not exist")</script><?php
                     }
                  }
                  if(empty($_POST['sitem']))
                  {
                     ?> <script>alert("Item name should not be empty")</script><?php
                  }else{
                     $supplies_item=$_POST['sitem'];
                  }
                  if(empty($_POST['squan']))
                  {
                     ?> <script>alert("Quantity should not be empty")</script><?php
                  }else{
                     $supply_quan=$_POST['squan'];
                  }

                  if(!empty($supplier_id) && !empty($stk_id))
                  {
                     $sq = "UPDATE SUPPLIES SET ITEM_NAME='".$supplies_item."',QUANTITY='".$supply_quan."' where SUP_ID = '".$supplier_id."' and STK_ID = '".$stk_id."'";
                    $result = $conn->query($sq);    
                    if($result)
                    {
                       ?><script>alert("Update successful")</script><?php
                    }
                  }
               }

               //insert operation
               if(isset($_POST['insert1']))
               {
                
                 if(empty($_POST['sid1']) && empty($_POST['stid']))
                 {
                    ?> <script>alert("No field should not be empty")</script><?php
                 }else{
                    $sql = "SELECT SUP_ID, STK_ID FROM supplies where SUP_ID = '".$_POST['sid1']."' and STK_ID = '".$_POST['stid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                     ?> <script>alert("entries exists with the given ID")</script><?php
                    }
                    else{
                     $supplier_id=$_POST['sid1'];
                     $stk_id=$_POST['stid'];
                    }
                 }
                 if(empty($_POST['sitem']))
                 {
                    ?> <script>alert("Item name should not be empty")</script><?php
                 }else{
                    $supplies_item=$_POST['sitem'];
                 }
                 if(empty($_POST['squan']))
                 {
                    ?> <script>alert("Quantity should not be empty")</script><?php
                 }else{
                    $supply_quan=$_POST['squan'];
                 }
                 if(!empty($supplier_id) && !empty($stk_id))
                 {
                    $sq = "INSERT INTO SUPPLIES VALUES('".$supplier_id."' ,'".$stk_id."','".$supplies_item."','".$supply_quan."')";
                   $result = $conn->query($sq);    
                   if($result)
                   {
                      ?><script>alert("Insert successful")</script><?php
                   }
                 }
              }

              //delete operation
              if(isset($_POST['delete1']))
               {
                
                 //$supplier_count=$_POST['sitem'];
                 if(empty($_POST['sid1']) && empty($_POST['stid']))
                 {
                    ?> <script>alert("Fields should not be empty")</script><?php
                 }else{
                    $sql = "SELECT SUP_ID, STK_ID FROM supplies where SUP_ID = '".$_POST['sid1']."' and STK_ID = '".$_POST['stid']."'";
                    $res = $conn->query($sql);    
                    $num= $res->num_rows;
                    if ($num >0 ){
                       $supplier_id=$_POST['sid1'];
                       $stk_id=$_POST['stid'];
                    }
                    else{
                       ?> <script>alert("there is no entry available with the given IDs")</script><?php
                    }
                 }
                 if(!empty($supplier_id))
                 {
                    $sq = "DELETE FROM supplies where SUP_ID = '".$_POST['sid1']."' and STK_ID = '".$_POST['stid']."'";
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
      <!-- services section end -->
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