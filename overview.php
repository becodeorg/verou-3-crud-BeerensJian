<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MouseHero - Track the latest top gaming mice</title>
</head>
<body>

<h1>MouseHero - Track the latest top gaming mice</h1>

<ul>
    <?php foreach ($_SESSION["mice"] as $mouse) : ?>
        <li><?= $mouse['name'] . " : " . $mouse["price"] . "$" ?></li>
    <?php endforeach; ?>
</ul>


<form action="" method="get">
    <h3>Add a mouse to the database:</h3>
    <label for="mouseName">Name of the Mouse: </label>
    <input type="text" name="name" id="mouseName">
    <label for="mousePrice">Price : </label>
    <input type="text" name="price" id="mousePrice">
    <label for="mouseWeight">Weight: </label>
    <input type="text" name="weight" id="mouseWeight">
    <label for="mouseBrand">Brand: </label>
    <input type="text" name="brand" id="mouseBrand">
    <br>
    <input type="submit" name="action" value="create">
</form>

</body>
</html>