<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<body>

<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
 <div class="container">       
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

          </a>
          <a class="brand" href="index.php?recent=1">Give me Book</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              
              
              <li
              <?php if(isset($_GET['recent'])){ echo "class=active";} ?>
              ><a href="index.php?recent=1">Most Recent</a></li>
              
              
              <li
              
              <?php if(isset($_GET['mybook']) || isset($_GET['postbook']) || isset($_GET['editbook'])){ echo "class=active";} ?>
              
              ><a href="index.php?mybook=1">My Books</a></li>
              
              
              <li
              
              <?php if(isset($_GET['myorder'])){ echo "class=active";} ?>
              
              ><a href="index.php?myorder=1">My Order</a></li>

                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<b class="caret"></b></a>
    				<ul class="dropdown-menu">
					<li><a href="index.php?cat=eng">English</a></li>
                    <li><a href="index.php?cat=lau">Languages</a></li>
                    <li><a href="index.php?cat=his">History</a></li>
                    <li><a href="index.php?cat=acc">Accounting</a></li>
                    <li><a href="index.php?cat=sci">Science</a></li>
                    <li><a href="index.php?cat=com">Computer</a></li>
                    <li><a href="index.php?cat=engi">Engineering</a></li>
                    <li><a href="index.php?cat=mus">Music</a></li>
                    <li><a href="index.php?cat=art">Art</a></li>
                    <li><a href="index.php?cat=oth">Other</a></li>
    				</ul>
  				</li>
              <li
			  
			  <?php if(isset($_GET['upload'])){ echo "class=active";} ?>
              
              ><a class="" href="index.php?upload=0">Upload</a></li>
              
              
			  <li class="span1 offset2"></li>
              <li class="nav actions"><a class="" href="index.php?sign=0">SignOut</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
</body>