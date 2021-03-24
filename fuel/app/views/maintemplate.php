<head>
	<title><?php echo$title; ?> </title>
	<meta charset="utf-8"></meta>
	<meta name="author" content="Michael Webb"></meta>
	<meta name="description" content="Fuel Template for M1"></meta>
	<?php echo Asset::css($css) ?>
</head>

<body>
    <header>
        <h1> 
            <?php echo Asset::img('nemotech.png', array('style' => 'width: 190px')) ?>
            <?php echo$title; ?> 
        </h1>
    </header>
    <nav>
        <ul>
            <li><a href="https://cs.colostate.edu:4444/~eileenr/m1/index/main">Home</a></li>
            <li><a href="https://cs.colostate.edu:4444/~eileenr/m1/index/main/about">About</a></li>
            <li><a href="https://cs.colostate.edu:4444/~eileenr/m1/index/main/color">Color Coordinate Generation</a></li>
        </ul>
    </nav>
    <main>  
	    <?php echo $content ?>
    </main>
    <footer>
	<br>
       	Created by Michael Webb, Jake Paschke, Eileen Rice for CS312
        <p>Copyright © 2020 Nemo Technologies</p>
            <p>
                <a>About</a> -
                <a>Privacy Policy</a> -
                <a>Contact Us</a>
            </p>
    </footer>
</body>
