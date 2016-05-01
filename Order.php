<html>
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>Orders</title>
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

        # Orders in process
         
        $sql = "SELECT * FROM orders where status = 'In Process';";
        $query = $conn->query($sql);
         
        $sql_2 = "SELECT * FROM orders where status = 'Cancelled';";
        $query_2 = $conn->query($sql_2);
         
        $sql_3 = "select * from orders order by orderDate desc limit 20;";
        $query_3 = $conn->query($sql_3);
    
        echo '<p class="center">In process orders <br> Click on order no for more info.</p>';
        echo '<table class="border_table format_table"><tr><td>Order Number name</td><td>Order Date</td><td>Status</td></tr>'; 
        $in_process_count = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $order_no = $row['orderNumber'];
            $order_date = $row['orderDate'];
            $status = $row['status'];
            
            $required_date = $row['requiredDate'];
            $shipped_date = $row['shippedDate'];            
            $comments = $row['comments'];
            $customer_no = $row['customerNumber'];
            
            
            
            
            // Print out div of relevant information
            echo '<tr><td class="in_process_',$in_process_count,'">',$order_no,'</td><td>',$order_date,'</td><td>',$status,'</td></tr>';
            echo '<tr style="display:none; color:yellow;" class="extra_info_process_',$in_process_count,'"><td>Reqiured Date</td><td>Shipped Date</td><td>Comments</td><td>Customer Number</td></tr>
                <tr style="display:none; color:yellow;" class="extra_info_process_',$in_process_count,'"><td>',$required_date,'</td><td>',$shipped_date,'</td><td>',$comments,'</td><td>',$customer_no,'</td></tr>
            '; # style="display:none;"
            
            // Increase count 
            $in_process_count += 1;
            
            }
         
        // Finish table
        echo "</table>";
         
        # Cancelled orders
    
        echo '<p class="center">Cancelled orders <br> Click on order no for more info.</p>';
        echo '<table class="border_table format_table"><tr><td>Order Number name</td><td>Order Date</td><td>Status</td></tr>'; 
        $cancell_count = 0;
        while ($row = $query_2->fetch(PDO::FETCH_ASSOC)) {
            $order_no = $row['orderNumber'];
            $order_date = $row['orderDate'];
            $status = $row['status'];
            
            $required_date = $row['requiredDate'];
            $shipped_date = $row['shippedDate'];            
            $comments = $row['comments'];
            $customer_no = $row['customerNumber'];
            
            
            
            
            // Print out div of relevant information
            echo '<tr><td class="cancell_',$cancell_count,'">',$order_no,'</td><td>',$order_date,'</td><td>',$status,'</td></tr>';
            echo '<tr style="display:none; color:yellow;" class="extra_info_cancell_',$cancell_count,'"><td>Reqiured Date</td><td>Shipped Date</td><td>Comments</td><td>Customer Number</td></tr>
                <tr style="display:none; color:yellow;" class="extra_info_cancell_',$cancell_count,'"><td>',$required_date,'</td><td>',$shipped_date,'</td><td>',$comments,'</td><td>',$customer_no,'</td></tr>
            '; # style="display:none;"
            
            // Increase count 
            $cancell_count += 1;
            
            }
        echo "</table>";
         
        # 20 most recent orders
         
        echo '<p class="center">Latest 20 orders <br> Click on order no for more info.</p>';
        echo '<table class="border_table format_table"><tr><td>Order Number name</td><td>Order Date</td><td>Status</td></tr>'; 
        $last_20 = 0;
        while ($row = $query_3->fetch(PDO::FETCH_ASSOC)) {
            $order_no = $row['orderNumber'];
            $order_date = $row['orderDate'];
            $status = $row['status'];
            
            $required_date = $row['requiredDate'];
            $shipped_date = $row['shippedDate'];            
            $comments = $row['comments'];
            $customer_no = $row['customerNumber'];
            
            
            
            
            // Print out div of relevant information
            echo '<tr><td class="last_20_',$last_20,'">',$order_no,'</td><td>',$order_date,'</td><td>',$status,'</td></tr>';
            echo '<tr style="display:none; color:yellow;" class="last_20_info_',$last_20,'"><td>Reqiured Date</td><td>Shipped Date</td><td>Comments</td><td>Customer Number</td></tr>
                <tr style="display:none; color:yellow;" class="last_20_info_',$last_20,'"><td>',$required_date,'</td><td>',$shipped_date,'</td><td>',$comments,'</td><td>',$customer_no,'</td></tr>
            '; # style="display:none;"
            
            // Increase count 
            $last_20 += 1;
            
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
     
<!--    Cancelled Orders    -->
     
<!--    20 most recent orders   -->
    
     
     <!--            Include footer for page        -->
            <?php include "Footer.php"; ?>
     
     <!--    Java script for differnet sectioncs    -->
     <script type="application/javascript">
        
         // While loop for inprocess
         $(document).ready(function() {
            // Get number of rows from php
            var no_rows = <?php echo $in_process_count;?>;
            
            // for number of rows
             for (i=0;i<no_rows;i++){ 
                var listener = ".in_process_" + i.toString();
                var hidden_rows = ".extra_info_process_" + i.toString();
                
                generate_handler(listener,hidden_rows);
                }
             });
        
         
         // While loop for cancelled
         $(document).ready(function() {
            // Get number of rows from php
            var no_rows = <?php echo $cancell_count;?>;
            
            // for number of rows
             for (i=0;i<no_rows;i++){ 
                var listener = ".cancell_" + i.toString();
                var hidden_rows = ".extra_info_cancell_" + i.toString();
                
                generate_handler(listener,hidden_rows);
                }
             });
         
          // While loop for last 20 orders
         $(document).ready(function() {
            // Get number of rows from php
            var no_rows = <?php echo $last_20;?>;
            
            // for number of rows
             for (i=0;i<no_rows;i++){ 
                var listener = ".last_20_" + i.toString();
                var hidden_rows = ".last_20_info_" + i.toString();
                
                generate_handler(listener,hidden_rows);
                }
             });
                     
         
        function generate_handler(click_targer, hidden_row) {
            $(click_targer).click(function() {
                     $(hidden_row).css("display", "");
                });
        }
     </script>
     
        
     
     
 </body>
</html>
