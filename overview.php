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
    <label for="mouseName">Name of the Mouse: </label>
    <input type="text" name="name" id="mouseName">
    <label for="mouseName">Price : </label>
    <input type="text" name="name" id="mouseName">
    <label for="mouseName">Weight: </label>
    <input type="text" name="name" id="mouseName">
    <label for="mouseName">Brand: </label>
    <input type="text" name="name" id="mouseName">
</form>

</body>
</html>