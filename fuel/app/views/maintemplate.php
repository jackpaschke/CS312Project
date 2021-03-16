<head>
	<title><?php echo$title; ?> </title>
	<meta charset="utf-8"></meta>
	<meta name="author" content="Michael Webb"></meta>
	<meta name="description" content="Fuel Template for M1"></meta>
	<?php echo Asset::css($css) ?>
</head>

<body>
    <header>
	<h1><?php echo$title; ?></h1>
        <ul>
            <li><a href="https://cs.colostate.edu:4444/~mwebbj/m1/index/main">Home</a></li>
            <li><a href="https://cs.colostate.edu:4444/~mwebbj/m1/index/about">About</a></li>
            <li><a href="https://cs.colostate.edu:4444/~mwebbj/m1/index/ccg">Color Coordinate Generation</a></li>
        </ul>
    </header>
    <main>  
	<?php echo $content ?>
    </main>
    <footer>
	<br>
       	Created by Michael Webb, Jake Paschke, Eileen Rice for CS312
    </footer>
</body>
