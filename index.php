<?php
$user = 'root';
$pass = 'strongpassword';
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);


if (isset($_POST['insert'])) {
    $vars = $_POST['options'];
    $numVar = count($vars);
    
    foreach($vars as $row){
        $query = "INSERT INTO `test`(`name`) VALUES ('$row')";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="myForm" method="post">
        <div id="inputs">
            <input type="text" name="options[]" placeholder="Insert Option Name">
        </div> <br>
        <button id="addVar">Add</button>
        <button type="submit" name="insert">Insert Data</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#addVar').click(function() {
            var myInput = '<input type="text" name="options[]" placeholder="Insert Option Name">';
            $('#inputs').append(myInput);

            return false;
        });
    </script>
</body>

</html>