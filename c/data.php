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
<body class="bg-green-100">

<header class="bg-green-800 py-2 fixed mt-0 w-full">
    <nav>
        <ul class="flex flex-row justify-around text-lg">
            <li><a class="text-white" href="index.php">Home</a></li>
            <li><a class="text-white" href="data.php">View All files in Database</a></li>
            <li><a class="text-white" href="search.php">Search in Database</a></li>
        </ul>
    </nav>
</header>

<div class="p-20">
<?php $sql_show = "SELECT DISTINCT * FROM characters;";
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
      <td><div class="ml-36 my-5 h-14 w-14">
        <img class="object-fill" src="<?=$row["img"]?>" alt="NAN">
        </div></td>
  </tr>
  </tbody>
  </table>
  </table>




 <?php endwhile; 
 endif; ?>
</div>
</body>
</html>