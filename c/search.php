<?php include_once "includes/dbh.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Breaking Bad</title>
    
</head>
<body class="bg-green-100 w-screen">

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
<form class="w-72" action="search.php" method="GET">
<label class=" uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="search">Enter Character information</label>
<input class="appearance-none w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" required id="search" name="search">
<button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" name="submit">submit</button>
</form>
</div>
<?php if(isset($_GET["submit"])):
    $str = $_GET["search"];

    $sql_show = "SELECT * FROM characters WHERE fullname = '$str' OR birthday = '$str' OR actor = '$str' OR firstname = '$str' OR lastname = '$str' ;";
$result = mysqli_query($conn, $sql_show);
$result_check = mysqli_num_rows($result);

if($result_check > 0): ?>
 <table class="table-fixed w-full">
<thead>
    <tr>
      <th class="text-3xl text-center"><h3>Characters</h3></th>
      <th class="text-3xl text-center"><h3>Birthday</h3></th>
      <th class="text-3xl text-center"><h3>Actor</h3></th>
      <th class="text-3xl text-center"><h3>Image</h3></th>
    </tr>
  </thead>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <table class="table-fixed w-full">
        <tbody>
       
    <tr class="w-full">
      <td class="text-3xl text-center"><h4> <?php echo $row["fullname"] ."\n"; ?> </h4></td>
      <td class="text-3xl text-center"><p><?php echo $row["birthday"] ."\n"; ?></a> </p></td>
      <td class="text-3xl text-center"><p><?php echo $row["actor"] ."\n"; ?></a> </p></td>
      <td><div class="my-5 ml-40 h-14 w-14">
        <img class="object-fill" src="<?=$row["img"]?>" alt="NAN">
        </div></td>
  </tr>
  </tbody>
  </table>
  </table>


 <?php endwhile;
 endif;
endif; ?>
</body>
</html>