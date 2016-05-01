<html>
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>Products</title>
        <meta name="Weather Forecast!" content="">
        <meta name="Conor O'Kelly" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- FONT
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

      <!-- CSS
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="css/normalize.css" type="text/css">
        <link rel="stylesheet" href="css/skeleton.css"  type="text/css">
        <link rel="stylesheet" href="css/styles.css" type="text/css">

    <!-- JavaScript
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
     <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

      <!-- Icon
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="images/Icon.jpg">
    </head>
 <body class="classic_car">
     
        <!--           Include banner and nav          -->
            <?php include "Nav.php"; ?>    
     
     
        <!--            Main page content        -->

     
     <!--     Ask user to choose a product line     -->
     
<!--    Set php function to capture user request and return string     -->
     <?php
        $user_requst = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_request = $_POST['user_request'];
        }
     
     ?>
     
     <h2 class="center">Choose a produce line.</h2>
<form class="center" action="<?$_SERVER['PHP_SELF'];?>" method="post" onChange='submit();'>
   Choice: &nbsp
   <input type="radio" name="user_request" value="Motorcycles"> Motorcycles &nbsp
   <input type="radio" name="user_request" value="Planes"> Planes &nbsp
   <input type="radio" name="user_request" value="Ships"> Ships &nbsp
   <input type="radio" name="user_request" value="Trains"> Trains &nbsp
   <input type="radio" name="user_request" value="Vintage Cars"> Vintage Cars &nbsp
   <input type="radio" name="user_request" value="Trucks and Buses"> Trucks and Buses &nbsp
   <input type="radio" name="user_request" value="Classic Cars"> Classic Cars &nbsp
   <br><br>
</form>

     
     <div class="center">Table of all products in requested category<br><br></div>
     
     <!--    Connect to database       -->
     <?php        
//        require_once "dbconfig.php";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "classicmodels";
     
     try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         

        // Create query and perpare it
        $sql = "SELECT * FROM products WHERE productLine = '$user_request';";
        $query = $conn->query($sql);
        
        
        // Start of table
        echo '<table class="border_table format_table"><tr><td>Product Code</td><td>Product Name</td><td>Product line</td><td>Product Scale</td><td>Prdouct Vendor</td><td>Product Description</td><td>Stock</td><td>Price</td></tr>';
            
//         Generate table
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $product = $row['productCode'];
            $product_name = $row['productName'];
            $product_line = $row['productLine'];
            $product_scale = $row['productScale'];
            $product_vendor = $row['productVendor'];
            $product_description = $row['productDescription'];
            $product_stock = $row['quantityInStock'];
            $product_price = $row['buyPrice'];
            
            
            // Print out div of relevant information
            echo '<tr><td>',$product,'</td>';
            echo '<td>',$product_name,'</td>';
            echo '<td>',$product_line,'</td>';
            echo '<td>',$product_scale,'</td>';
            echo '<td>',$product_vendor,'</td>';
            echo '<td>',$product_description,'</td>';
            echo '<td>',$product_stock,'</td>';
            echo '<td>',$product_price,'</td></tr>';
            }
         
         // Finish table
        echo "</table>";
         
//        echo "New records created successfully";
     }
     catch (PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
     // Kill connection
     $conn = null;
         
     ?>
     
     
        <!--            Include footer for page        -->
            <?php include "Footer.php"; ?>
     
 </body>
</html>
