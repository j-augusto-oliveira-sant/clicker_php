
<?php
include_once '../database/bd.php';
include_once '../database/bd_funcs.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dagon</title>
    <link rel="icon" type="image/x-icon" href="../img/pageicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src='../js/scoreboard.js'></script>
    <!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <nav id='nav1' class="navbar navbar-expand-lg py-4 shadow">
		<div class="container-fluid">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="navbar-brand text-uppercase fs-1 fw-bolder"
						href="../home.php" id="brand_logo">Cult of Dagon</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-3" id="navbarDarkDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="../scoreboard.php">Scoreboard</a></li>
                        <li><a class="dropdown-item" href="../home.php">Home</a></li>
                    </ul>
                </li>
			</ul>
            <!-- nav >> -->
            <ul id='profile_icon' class="navbar-nav ms-auto">
                <ul class="navbar-nav">
                    <p class="nav-item"><?php
                    session_start();
                    echo "<p class='fs-2'>{$_SESSION['username']}</p>";
                    ?></p>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="../accounts/profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="../accounts/action_logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </ul>
		</div>
    </nav>
    <div class='container'>
        <div class='jumbotron'>
            <?php 
            $fishermans = all_fishermans_bd($conn,$_SESSION['usuario_pk']);
            foreach($fishermans as $fisherman){
                echo "<img src='../img/fisherman.png' alt='' width='80px' height='80px'>";
                echo "<div class='comment_type'><p class='fw-bolder'>{$fisherman['nome']}</p><br>"
                ."<p>{$fisherman['descricao']}</p>"
                ."<a style='' href='./action_fisherman.php?action=delete&name={$fisherman['nome']}' class='btn btn-danger'>Vender</a>"
                ." <a href='./action_fisherman.php?action=update&name={$fisherman['nome']}' class='btn btn-info'>Editar</a></p>"
                ."</div>";
            }
            ?>
        </div>
        <div id="new_form" class="container" style='padding: 50px;'>
        <div align='center' class="shadow-sm" style='padding: 10px;background-color: #52796f;border-radius: 12px;'>
            <a class='fishbtn fs-1' name='fisherman' id='brand_logo' href="fisherman_form.php"><img src="../img/fisherman.png" alt="" width='200px' height="200px"></a>
            <br>
            <h3>New fisherman:</h3>
            <br>
            <form name="new_form needs-validation" action="action_fisherman.php" method="POST">
                <div id="div_nome" class="mb-3">
                    <label for="fisherman_name" class="form-label">fisherman Name</label>
                    <input type="text" class="form-control" id="fisherman_name" name="fisherman_name" placeholder="fisherman_name"  require>
                </div>
                <br>
                <div id="div_desc" class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="desc" id="desc" placeholder="desc"  require>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Create New fisherman">
            </form>
            </div>
        </div>
    </div>
    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(53, 79, 82,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(53, 79, 82,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(53, 79, 82,0.1)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(53, 79, 82,0.5)" />
        </g>
        </svg>
    </div>
    <!--Waves end-->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">This is a website for a journaling REST API, created for learning purposes,
                        website and api made with: Python 3,Django,Django Rest Framework</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="{% url 'index' %}">Home</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
                        <a href="#">SOLURIES</a>.
                    </p>
                </div>
            </div>
    </footer>
</body>