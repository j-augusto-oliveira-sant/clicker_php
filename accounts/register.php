<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dagon</title>
    <link rel="icon" type="image/x-icon" href="../img/pageicon.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<?php
$error_message = isset($_GET['error'])?$_GET['error']:'';
if (str_word_count($error_message) > 0){
    echo "<p class='btn btn-danger'>{$error_message}</p>";
}
?>

<div id="new_form" class="container" style='padding: 50px;'>
    <div class="shadow-sm border bg-light" style='padding: 10px;'>
        <h3>New User:</h3>
        <br>
        <form name="new_form needs-validation" action="action_register.php" method="POST">
            <div id="div_nome" class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username"  require>
            </div>
            <br>
            <div id="div_password" class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="password"  require>
            </div>
            <div id="div_email" class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" require>
            </div>
            <br>
            <input class="btn btn-primary" type="submit" value="Register">
        </form>
        <a href="./login.php">Already has an account?</a>
        </div>
</div>