<?php include_once "includes/dbh.inc.php";

$response = file_get_contents("https://www.breakingbadapi.com/api/characters?name=". $_POST["name"]."+".$_POST["surname"]);
 

$data = json_decode($response, true);
if($data):
$name = $data[0]['name'];
$birthday = $data[0]['birthday'];
$img = $data[0]['img'];
$actor = $data[0]['portrayed'];
$arr = explode(" ",$name);
$firstname = $arr[0];
$lastname = $arr[1];


$sql_upload = "INSERT INTO characters (fullname, birthday, img, actor, firstname, lastname) VALUES ('$name', '$birthday', '$img', '$actor', '$firstname', '$lastname');";
mysqli_query($conn, $sql_upload);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Breaking Bad</title>
</head>
<body class="bg-green-100">

<header class="bg-green-800 py-2 fixed w-full">
    <nav>
        <ul class="flex flex-row justify-around text-lg">
            <li><a class="text-white" href="index.php">Home</a></li>
            <li><a class="text-white" href="data.php">View All files in Database</a></li>
            <li><a class="text-white" href="search.php">Search in Database</a></li>
        </ul>
    </nav>
</header>

<?php $sql_show = "SELECT * FROM characters WHERE fullname = '$name';";
$result = mysqli_query($conn, $sql_show);
$result_check = mysqli_num_rows($result);

if($result_check > 0):
 if($row = mysqli_fetch_assoc($result)): ?>

<div class="flex justify-center items-center h-screen">
    <div  class="grid place-items-center gap-y-1 w-full">
        <h1 class="text-6xl"><?= $row["fullname"] ?></h1>
        <h2 class="text-xl">Date of Birth: <?= $row["birthday"] ?></h2>
        <h2 class="text-xl">Played by <?= $row["actor"]?> </h2>
        <div class="h-52 w-52">
        <img class="object-fill" src="<?=$row["img"]?>" alt="NAN">
        </div>
    </div>
<div>
 <?php endif;
 endif; 
else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Breaking Bad</title>
</head>
<body class="bg-green-100">

<header class="bg-green-800 py-2 fixed w-full">
    <nav>
        <ul class="flex flex-row justify-around text-lg">
            <li><a class="text-white" href="index.php">Home</a></li>
            <li><a class="text-white" href="data.php">View All files in Database</a></li>
            <li><a class="text-white" href="search.php">Search in Database</a></li>
        </ul>
    </nav>
</header>

<div class="flex justify-center items-end h-44">
<h1 class="text-7xl">No such Character</h1>
<div>

<?php endif; ?>
    
</body>
</html>

