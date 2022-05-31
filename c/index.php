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

<div class="grid place-content-center h-screen">
  
<form action="result.php" method="POST">

    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="name"><h2 class="fs-2">Enter Breaking Bad characters First Name<h2></label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" required name="name" id="name">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"  for="surname"><h2 class="fs-2">Enter Breaking Bad Characters Last Name<h2></label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" required name="surname" id="surname">
    <input class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit" name="submit">

</form>
</div>


</body>
</html>

