<?php

?>
<html lang="en">
<head>
    </style>
    <link rel="stylesheet" href="css/styles.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Nicholas Phillimore - CMP306</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Call Font Awesome for page fonts and icons-->
    <script src="https://kit.fontawesome.com/45da6e9d86.js" crossorigin="anonymous"></script>
    <!-- End Bootstrap -->
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>

</head>
<!-- Start Page Main Body -->
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Video Games</h1>
            <p class="lead text-muted">Lets see some games!</p>
        </div>
    </section>
    <!-- Begin Navigation bar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light">

        <!-- Navbar Togglable when on Mobile -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav">
            <div class="navbar-name">
                <li>
                    <h1><?php
                        if ($_SESSION['User']) {
                            echo "Hello, " . $_SESSION['User'][1];
                        }
                        ?>
                    </h1>
                </li>
            </div>
        </div>
        <!-- Navbar Toggle Icon for Mobile -->
        <div class="navbar-nav">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-nav">
            <li class="nav-item border rounded-cicle mx-2 search-icon">
                <a href="itemSearch.php">
                    <i class="fas fa-search p-2"></i></a>
            </li>
        </div>
        <div class="navbar-nav">
            <li class="nav-item border rounded-cicle mx-2 basket-icon">
                <a href="displayBasket.php">
                    <i class="fas fa-shopping-basket p-2"></i></a>
            </li>
        </div>
        <div class="navbar-nav">
            <li class="nav-item border rounded-cicle mx-2 user-icon">
                <a href="<?php
                if ($_SESSION['User']) {
                    echo 'userAccount.php';
                } else {
                    echo 'login.php';
                }
                ?>"><i class="fas fa-user p-2"></i></a>
            </li>
        </div>
    </nav>
    <div class="row">
        <div class="col-sm-12">
            <div class="return-button">
                <div class="card">
                    <a href="../../../folioMain/work/workitems.php">Return to portfolio</a>
                </div><!-- card body -->
            </div><!-- card -->
        </div> <!-- column -->
    </div><!-- row -->
    <div class="row">
        <!-- End Navigation bar -->
    <div class="container">
  	<?php
  		$url = "https://feeds.bbci.co.uk/sport/34032412-5e2a-324d-bb3e-d0d4b16df2d4/rss.xml" ;
  		$xml = new DOMDocument() ;
  		$xml->load($url) ;
  		// var_dump($xml) ;
  		$xsl = new DOMDocument() ;
  		$xsl->load("../xsl/rss.xsl") ;
  		//var_dump($xsl) ;
  		$proc = new XSLTProcessor() ;
  		$proc -> importStyleSheet($xsl) ;
  		$result = $proc -> transformtoXML($xml) ;
  		// echo $result ;
		// echo "<br/><br/>" ;


		echo '<div class="card">' ;
		echo '<div class="card-header">Newcastle United</div>' ;
		echo '<div class="card-body">' ;
		echo $result ;
		echo '</div>' ;
		echo '<div class="card-footer">Data &#169;bbc.co.uk/news.org</div>' ;
		echo '</div>' ;
	?>
	</div>
    </div>
</main>
<!-- End Page Main Body -->
<!-- Begin Page Footer-->
<footer>
    <h1>Nicholas Phillimore - 2005734 - CMP306</h1>
</footer>
<!-- End Page Footer -->
</html>