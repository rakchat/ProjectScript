<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="menu/menu-style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>จุฬาลงกรณ์มหาวิทยาลัย</title>
</head>
<body>
    <!-- ========================== menu ========================== -->
    <div class="layout-container">
        <div class="menu">
            <nav>
                <div class="c1">
                    <a href="index.html">
                        <img src="images\logomenu.png" alt="" style="height: 9.5vw;">
                    </a>
                    <div id="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>

                <a href="index.html" class="logo-tab">
                    <img src="images\logomenu.png" alt="" style="height: 3.1em; width: 15em; margin: 0px 0px 10px 0px;">
                </a>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    
                    <li><a href="#">Brand<i class="fa fa-sort-desc" style="font-size: initial"></i></a>
                        <ul>
                            <li><a href="#">Adidas</a></li>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Convers</a></li>
                            <li><a href="#">Vans</a></li>
                        </ul>
                    </li>

                    <li><a href="index.html">Register</a></li>
                    <li><a href="index.html">Login</a></li>

                </ul>
            </nav>
        </div>
        
    </div>
    <!-- ========================== menu ========================== -->

    <div class="header">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
              <li data-target="#demo" data-slide-to="3"></li>
              <li data-target="#demo" data-slide-to="4"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="image/banner.jpg" alt="Los Angeles" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner2.jpg" alt="Chicago" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner3.jpg" alt="New York" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner4.jpg" alt="New York" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner5.jpg" alt="New York" width="1100" height="500">
              </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
    </div>
    <div class="menu-order">
        <!-- <a href="#">Adidas</a> 
        <a href="#">Nike</a> 
        <a href="#">Vans</a> 
        <a href="#">Converse</a>  -->
    </div>
    <div class="Search-box">
      <i class="fa fa-search w3-large" > <b>Search</b> </i>  <input type="text"   placeholder="Search">  <i class="fa fa-shopping-cart" style="font-size:24px"></i>
    </div>
<div class="content">
<h2>Adidas</h2>
<div class="row">
    <div class="column">
      <div class="card">
        <img src="image/adidas.jpg"  style="width:100%">
        <div class="container">
          <h5>Adidas Ultra Boost</h5>
          <p class="title">3500 Baht</p>
          <p><button onclick="location.href='detailorder.html'">More</button></p>
        </div>
      </div>
    </div>
   </div>
   <!--    สินค้า       -->
   <div class="row">
    <div class="column">
      <div class="card">
        <img src="image/adidas.jpg"  style="width:100%">
        <div class="container">
          <h5>Adidas Ultra Boost</h5>
          <p class="title">3500 Baht</p>
          <p><button>More</button></p>
        </div>
      </div>
    </div>
   </div>
</div>

<body>
    <div class="footer">
    สมาชิก<br>
    1. B6122256 นายสุนทร รักชาติ<br>
    2. B6122553 นายอิบรอเฮ็ม บูละ<br>
    3. B6122171 นายธิติพันธุ์ พอควร<br>
    4. B6121785 นางสาวปนัดดา เบ็ดกระโทก<br>
    5. B6122898 นายปิยพนธ์ พุ่มหมื่นไวย<br>
</div>

    <!-- ========================== JS ========================== -->
    <script>
        $(window).scroll(function() {
              var scrollPos = $(this).scrollTop();
              $(".logo_banner").css({
                    'width' : 70 - (scrollPos/12) + '%' 
              });
        });

        $("#icon").click(function() {
            $("ul").slideToggle();
            $("ul ul").css("display", "none");
        });

        $("ul li").click(function() {
            $("ul ul").slideUp();
            $(this).find('ul').slideToggle();
        });

        $(window).resize(function() {
            if ($(window).width() > 768) {
                $("ul").removeAttr('style');
            }
        });
    </script>
    <!-- ========================== JS ========================== -->

    <!-- ========================== AOS ========================== -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- ==============x=========== AOS =========x================ -->
</body>
</html>