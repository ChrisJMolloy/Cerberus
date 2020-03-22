<?php
//header for all pages
//always put   </body> </html> at the end of a file
include('header.html');
//connection to DB
include('connection.php');

?>
<style>
  html, body {margin: 0; height: 100%; overflow: hidden}

    header {
        /*https://images.freeimages.com/images/large-previews/d8b/dog-1407433.jpg*/ 
        background-image: url('dog.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center top;
    }
</style>
<header class="bg-primary">
        <div class="h-100">
            <div class="row h-100">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <!--FIX THIS FOR ALL WINDOW SIZES-->
            <div class="col-4" style="padding-top :120px; margin-left:-80px;"> <div class="m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        
                        
                        
                        
                    </div></div>

                </div>
            </div>
        </div>
    </header>
  </body>
</html>