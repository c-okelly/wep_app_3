<html>
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>Customers</title>
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
     
     <table><tr style="display:none;"><td>Customer no</td><td>Phone</td><td>Address line 1</td><td>Address line 2</td><td>City</td><td>State</td><td>Postal Code</td><td>Sales rep employee no</td><td>Credit Limit</td>      </tr></table>
     
     
        <!--            Main page content        -->
     
     <div>
         <p class="center underlined">
            Here is a list of all cusotmers currently in the database.
         </p>
     </div>

     
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

         
        $sql = "SELECT * FROM customers order by country;";
        $query = $conn->query($sql);
        
         
        // Define count variable
        $count = 0;
        // Talbe start
        echo '<table class="border_table format_table"><tr><td>Customer name</td><td>Country</td></tr>';
         
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $customer_name = $row['customerName'];
            $country = $row['country'];
            
            $customer_no = $row['customerNumber'];
            $phone = $row['phone'];
            $address_1  = $row['addressLine1'];
            $address_2 = $row['addressLine2'];
            $city = $row['city'];
            $state = $row['state'];
            $postal_code = $row['postalCode'];
            $sales_rep_emp_no = $row['salesRepEmployeeNumber'];
            $credit_limit = $row['creditLimit'];
            
            // Print out div of relevant information
            echo '<tr class="name_',$count,'"> <td>',$customer_name,'</td><td>',$country,'</td> </tr>';
            echo '<tr style="display:none;" class="extra_info_',$count,'"><td>Customer no</td><td>Phone</td><td>Address line 1</td><td>Address line 2</td><td>City</td><td>State</td><td>Postal Code</td><td>Sales rep employee no</td><td>Credit Limit</td></tr>
                <tr style="display:none;" class="extra_info_',$count,'"><td>',$customer_no,'<td><td>',$phone,'</td><td>',$address_1,'</td><td>',$address_2,'</td><td>',$city,'</td><td>',$state,'</td><td>',$sales_rep_emp_no,'</td><td>',$credit_limit,'</td></tr>
            ';
            #style="display:none;
            
            $count += 1;
            }
         
        echo '</table>';

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
            <?php include "Footer.php" ?>
     
        <!--    Java script for page     -->
     <script type="application/javascript">
     
         $(document).ready(function() {
             // Get number of rows from php
             var no_rows = <?php echo $count;?>;
            // for number of rows
             for (i=0;i<no_rows;i++){ 
                var listener = ".name_" + i.toString();
                var hidden_rows = ".extra_info_" + i.toString();
                
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
