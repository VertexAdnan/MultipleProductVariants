<?php
$user = 'root';
$pass = 'strongpassword';
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);


if (isset($_POST['insert'])) {
    $vars = $_POST['options'];
    $prices = $_POST['price'];

    $arr = array_combine($vars, $prices);
    foreach ($arr as $k => $v) {
        $query = "INSERT INTO `test`(`name`, `price`) VALUES ('$k', '$v')";
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
            <input type="text" class="optionsinput" id="options[]" name="options[]" placeholder="Insert Option Name">
            <input type="text" class="pricesinput" id="price[]" name="price[]" placeholder="Insert Price">
        </div> <br>
        <button id="addVar">Add</button>
        <button type="submit" id="insert" name="insert">Insert Data</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#addVar').click(function() {
            var myInput = '<br /> <input type="text" class="optionsinput" name="options[]" placeholder="Insert Option Name"> <input type="text" class="pricesinput" id="price" name="price[]" placeholder="Insert Price">';
            $('#inputs').append(myInput);
            return false;
        });
    </script>
</body>

</html>
