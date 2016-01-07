<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <link rel="stylesheet" href="/header.css">

	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Jooks24</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Avaleht</a></li>
            <li><a href="login.php">Logi sisse</a></li>
			<li><a href="data.php">Lisamine</a></li>
			<li><a href="table.php">Andmed</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
	
	<br><br><br><br>
	
	<style>
		body {
			font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
			background: url('../jooks.JPG') no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
			-o-background-size: cover;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-weight: 700;
			letter-spacing: 1px;
		}

		p {
			font-size: 1.25em;
			line-height: 1.6;
			color: #000;
		}

		hr {
			max-width: 400px;
			border-color: #999999;
		}

		.brand,
		.address-bar {
			display: none;
		}

		.navbar-brand {
			font-weight: 700;
			letter-spacing: 2px;
		}

		.navbar-nav {
			font-weight: 400;
			letter-spacing: 3px;
		}

		.brand-before,
		.brand-name {
			text-transform: capitalize;
		}

		.brand-before {
			margin: 15px 0;
		}

		.brand-name {
			margin: 0;
			font-size: 4em;
		}

		.tagline-divider {
			margin: 15px auto 3px;
			max-width: 250px;
			border-color: #999999;
		}

		.box {
			margin-bottom: 20px;
			padding: 30px 15px;
			background: #fff;
			background: rgba(255,255,255,0.9);
		}

		.intro-text {
			text-transform: uppercase;
			font-size: 1.25em;
			font-weight: 400;
			letter-spacing: 1px;
		}

		.img-border {
			float: none;
			margin: 0 auto 0;
			border: #999999 solid 1px;
		}

		.img-right {
			float: none;
			margin: 0 auto 0;
		}

		footer {
			background: #fff;
			background: rgba(255,255,255,0.9);
		}

		footer p {
			margin: 0;
			padding: 50px 0;
		}

		@media screen and (min-width:768px) {
			.brand {
				display: inherit;
				margin: 0;
				padding: 30px 0 10px;
				text-align: center;
				text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
				font-family: "Josefin Slab","Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 5em;
				font-weight: 700;
				line-height: normal;
				color: #fff;
			}

			.top-divider {
				margin-top: 0;
			}

			.img-right {
				float: right;
				margin-left: 25px;
			}

			.address-bar {
				display: inherit;
				margin: 0;
				padding: 0 0 40px;
				text-align: center;
				text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
				text-transform: uppercase;
				font-size: 1.25em;
				font-weight: 400;
				letter-spacing: 3px;
				color: #fff;
			}

			.navbar {
				border-radius: 0;
			}

			.navbar-header {
				display: none;
			}

			.navbar {
				min-height: 0;
			}

			.navbar-default {
				border: none;
				background: #fff;
				background: rgba(255,255,255,0.9);
			}
			
						.nav>li>a {
				padding: 15px;
			}

			.navbar-nav>li>a {
				line-height: normal;
			}

			.navbar-nav {
				display: table;
				float: none;
				margin: 0 auto;
				table-layout: fixed;
				font-size: 1.25em;
			}

		}

		@media screen and (min-width:1200px) {
			.box:after {
				content: '';
				display: table;
				clear: both;
			}
		}
	</style>
