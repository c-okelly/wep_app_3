<html>
 <head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <title>Home Page</title>
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


      <!-- Icon
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="images/Icon.jpg">
    </head>
 <body class="classic_car">
     
        <!--           Include banner and nav          -->
            <?php include "Nav.php"; ?>    
     
     
        <!--            Main page content        -->
     <div>
         <p class="center underlined">
            Here is a list and discription of all the produts that are currently being offered by Classic models!
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

         
        $sql = "SELECT * FROM productlines;";
        $query = $conn->query($sql);
        
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $product = $row['productLine'];
            $descrip = $row['textDescription'];
            // Print out div of relevant information
            echo '<div> 
        <p class="center underlined">', $product ,' </p>
         <p class="index_data">
         ',$descrip,'
         </p>
     </div>
            ';
            }

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
     
 </body>
</html>
