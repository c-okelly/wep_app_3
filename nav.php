<html>
    <body>
        <div class="container banner">        
            <div class="row"> <!-- Banner -->
                <div class="four columns banner_text" >
                    <section class="center">
                       
                    </section>
                </div>
            </div> <!-- Banner end -->
        </div>
     
        <div class="container nav"><!-- Nav -->  
            <div class="row"> 
                <div class="twelve columns"> 
                    <nav>
                        <ul class="not_so_tall">
                            <li> <a href="index.php">Home</a></li>
                            <li><a href="Product.php">Products</a>
                            <li><a  href="Customers.php">Customers</a>
                            <li><a href="Order.php">Orders</a>
                        </ul>
                        
                        <div class="mobile_nav">
                            <select onchange="if (this.value) window.location.href=this.value">
                                <option value="" selected="selected">Menu</option> 
                                <option value="index.html">Home</option> 
                                <option value="Products.php">Products</option>
                                <option value="Customers.php">Customers</option>
                                <option value="Order.php">Orders</option>
                            </select>
                        </div>
                    </nav>
                </div>
            </div>
        </div><!-- Nav end -->  
    </body>
</html>