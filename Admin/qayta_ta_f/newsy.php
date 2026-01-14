<!DOCTYPE html>
<html lang="en">

<head>
  <title>Diplom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <?php
  include '../../mysqli_connect.php';
  $query = 'SELECT * FROM qayta_ta_f';
  $login=$_POST['login'];
  $parol=$_POST['parol'];
  if ($r = mysqli_query($dbc, $query)) {

    print "<div class='container'>";
    print "<h2 class='text-center'>Mavjud fanlarni ko'rib borish</h2>";
    print "<form  method='post' action='new'>  <button  class='btn btn-secondiry btn-sm '>Yangi fan 
    </button> <input type='hidden' value='$login' name='login'>
     <input type='hidden' value='$parol' name='parol'>
    
 
     </form>";
    print "<a href='../../index'><button type='button' class='btn btn-secondiry btn-sm'>";

    print " </span> qayta kirish </button> </a> ";
    print "<table  class='table table-striped ' style='margin-top:15px'>";

    print " <tr>";


    print "<th>id</th>";
    print "<th>name</th>";
      print "<th>malumot	</th>";
    print "<th>soat</th>";
    print "<th>Ishlov berish</th>";
    print " </tr>";
    while ($row = mysqli_fetch_array($r)) {
      print "<tr>";
      print "<td>{$row['id']}</td>";
   
      print "<td>{$row['name']}</td>";
      print "<td>{$row['malumot']}</td>";
      print "<td>{$row['soat']}</td>";
   
      print "<td >   
      <form  method='post' action='delete'>  
      <span class='glyphicon glyphicon-trash'></span> <input type='submit'class='btn btn-danger btn-sm '  value='Delete'>
 <input type='hidden' value='$login' name='login'>
    <input type='hidden' value='$parol' name='parol'>
    <input type='hidden' value='{$row['qisqa']}' name='qisqa'>
    <input type='hidden' value='{$row['id']}' name='id'>

    </form>
<form  method='post' action='edit'>  <button  class='btn btn-secondiry btn-sm '><span class='glyphicon glyphicon-briefcase'></span> <input type='submit'  value='Edit'>
   </button> <input type='hidden' value='$login' name='login'>
    <input type='hidden' value='$parol' name='parol'>
    <input type='hidden' value='{$row['id']}' name='id'>

    </form>


</td>";

      print "<tr>";
    }
    print "</table>";
  }

  ?>
</body>

</html>