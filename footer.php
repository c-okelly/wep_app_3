<html>
 <head>
  <title>Footer</title>
 </head>
 <body>
<div class="footer"> <!-- Footer -->
            <div class="row">
                <div class="seven columns">
                    <footer class="small_footer">
                        This Website was built using a Skeleton Framework
                        <br> Built by Conor O'Kelly
                        <br> <a class="email" href="mailto:C10305243@dit.ie">Contact: Myemail@no.com</a>
                        <section>The current date and time is:  
                            <script type="text/javascript">
                            var currentDate = new Date()
                            var month = currentDate.getMonth() + 1
                            var day = currentDate.getDate()
                            var year = currentDate.getFullYear()
                            document.write(month + "/" + day + "/" + year)
                            </script>
                            <script type="text/javascript">
                                var currentTime = new Date()
                                var hour = currentTime.getHours()
                                var minute = currentTime.getMinutes()
                                if (minute < 10 ){ 
                                    minute = "0" + minute
                                }
                                document.write(hour + ":" + minute)
                                if (hour > 11 ){ 
                                    document.write(" PM")
                                } else {
                                    document.write(" AM")
                                }
                                
                            </script>
                            </section>
                    </footer>
                </div>
                
                <div class="five columns">
                    <section class="center">
                        <div class="social small_social">
                        Wana to get Social? <br>
                            <a href="https://www.facebook.com/bicycletouring" target="_blank"><span> <img src="images/Social/facebook42.jpg" class="rotate" title="Facebook link" alt="link"></span></a>
                            <a href="https://twitter.com/hashtag/cycletouring" target="_blank"><span> <img src="images/Social/twitter42.png" class="rotate" title="Twitter link" height="40" width="40" alt="link"></span></a>
                            <a href="https://www.youtube.com/user/globalcyclingnetwork" target="_blank"><span> <img src="images/Social/youtube42.png" class="rotate" title="Youtube link" height="40" width="40" alt="link"></span></a>
                            <a href="https://ie.linkedin.com/pub/conor-o-kelly/68/a67/658" target="_blank"><span> <img src="images/Social/linkedin42.png" class="rotate" title="LinkedIn link" height="40" width="40" alt="link"></span></a>
                        </div>
                    </section>
                </div>
            </div>
        </div><!-- Footer end -->
 </body>
</html>
