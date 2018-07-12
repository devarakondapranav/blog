<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<!-- -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	<link rel="stylesheet" type="text/css" href="myblogstyle.css">
	<script src="myblogbasic.js"></script>
</head>
<body>
	<!-- Fixed navbar -->
        <nav id="header" class="navbar navbar-fixed-top" style="background-color: black;">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="#">My Blog</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Post</a></li>
                        <li><a href="#about">Admin</a></li>
                        <!--<li><a href="#contact">Contact</a></li>-->
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->
        

        <div class="container">

            <div class="row row-offcanvas row-offcanvas-right">
            </div>
            <script >
                var start = 1;
                var working = false;
                $(document).ready(function() {
                        $.ajax({
                                type: "GET",
                                url: "myblogGetData.php?start="+start,
                                processData: false,
                                contentType: "application/json",
                                data: '',

                                success: function(r) {
                                    //console.log("r is " + String(r));
                                        console.log("r is " + String(r));
                                        
                                        r = JSON.parse(r)
                                        console.log("R length is " + String(r.length) + " ans start is "+ start);

                                        for (var i = 0; i < r.length; i++) {
                                                $('body').append('<div class="col-xs-12 col-sm-9"><p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p><div class="jumbotron"><h1>#'+ r[i].postno + '</h1> by'+ r[i].poster + '<p><br>'+r[i].message+'</p></div></div></div>');
                                                console.log(r[i].message);
                                        }
                                        start += 4;
                                        //console.log("Connected ");
                                        
                                    
                                },
                                error: function(r) {
                                        console.log("Something went wrong!");
                                }
                        })
                })



                $(window).scroll(function () { 
                    //if ($(window).scrollTop() >= $(document).height() - $(window).height() - 50) {4
                        if ($(this).scrollTop() + 5 >= $('body').height() - $(window).height()){
      //Add something at the end of the page
                        //alert("Reached bottom of page...");
                        console.log("reached bottom ans start is " + start);
                        $.ajax({

                                type: "GET",
                                url: "myblogGetData.php?start="+start,
                                processData: false,
                                contentType: "application/json",
                                data: '',

                                success: function(r) {
                                    //console.log("r is " + String(r));
                                        //console.log("r is " + String(r));
                                        
                                        r = JSON.parse(r)
                                        //console.log("R length is " + String(r.length));
                                        for (var i = 0; i < r.length; i++) {
                                                $('body').append('<div class="col-xs-12 col-sm-9"><p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p><div class="jumbotron"><h1>#'+ r[i].postno + '</h1> by'+ r[i].poster + '<p><br>'+r[i].message+'</p></div></div></div>');
                                                console.log(r[i].message);
                                        }
                                        start += 4;
                                        //console.log("Connected ");
                                        
                                    
                                },
                                error: function(r) {
                                        console.log("Something went wrong!");
                                }

                        })
                    }
                });
            </script>
                
                
           

            <footer>
                <p>san</p>
            </footer>

        </div><!--/.container-->
        <!--
         <?php 
                $con = mysqli_connect('localhost:3306', 'root', '', 'blog');
                if($con)
                {
                    $sql = 'select * from posts';
                    $result = $con->query($sql);
                    while($row = $result->fetch_assoc())
                    {
                        echo '<div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p><div class="jumbotron"><h1>#'.$row["postno"].'</h1> by'.$row["poster"].'<p><br>'.$row["blogmessage"].'</p></div></div></div>';
                    
            }
                }
            else
                echo "Not connected";
            ?>
        -->
</body>
</html>