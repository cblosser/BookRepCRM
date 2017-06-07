<?php
$customers = fopen("customers.txt", 'r+');
$orders = fopen("orders.txt", 'r+');
$order = null;
$customer = null;
if($customers)
{
  $i = 0;
  while(($line = fgets($customers)) !== false)
  {
      $customer[$i] = explode( "," , $line);
      $i++;
  }
  fclose($customers);
}
else
{
  echo "Error opening file.";
}
if(isset($_GET['customer']))
{
  $id = $_GET['customer'];
if($orders)
{
  $x = 0;
  while(($line = fgets($orders)) !== false)
  {
      $line = explode( "," , $line);
        if($id == $line[1])
        {
          $order[$x] = $line;
          $x++;
        }
  }
  fclose($orders);
}
else
{
  echo "Error opening file.";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">

   <!-- Google fonts used in this theme  -->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>  

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- Customer panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th>Name</th>
               <th>Email</th>
               <th>University</th>
               <th>City</th>
             </tr>
             <?php for($i = 0; $i < count($customer); $i++) : ?>
             <tr>       
             <td> <?php echo "<a href='?customer=". $customer[$i][0] ."'>" . $customer[$i][1] ." ". $customer[$i][2]; "</a>" ?> </td>
             <td><?php echo $customer[$i][3]; ?></td>
             <td><?php echo $customer[$i][4]; ?></td>
             <td><?php echo $customer[$i][6]; ?></td>
             </tr>
             <?php endfor; ?>
           </table>
           </div>
          <?php if(isset($_GET['customer'])) : ?>
          <?php if(count($order) > 0) : ?>
          <div class="panel panel-danger spaceabove">
         <div class="panel-heading"><h5>
         <?php
          for($i = 0; $i < count($customer); $i++)
          {
            if($customer[$i][0] == $id)
            {
            echo "Orders for " . $customer[$i][1] . " " . $customer[$i][2]; 
            }
          }
          ?>
          </h5> </div>
         <table class="table">
             <tr>
               <th><th>
               <th>ISDN</th>
               <th>Title</th>
               <th>Category</th>
             </tr>
             <?php for($i = 0; $i < count($order); $i++) : ?>
             <tr>    
             <td><?php echo "<img src='/webdev1/BookRepCustomerRelationsManagement/images/book/tinysquare/" . $order[$i][2] . ".jpg'" ?></td>
             <td></td>   
             <td><?php echo $order[$i][2]; ?></td>
             <td><?php echo $order[$i][3]; ?></td>
             <td><?php echo $order[$i][4]; ?></td>
             </tr>
             <?php endfor; ?>
           </table> 
           <?php endif; ?>
            <?php if(count($order) == 0) : ?>
              There are no orders for this customer.
            <?php endif; ?>
           <?php endif; ?> 
                          
      </div>
      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>