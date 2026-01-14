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
  $query = 'SELECT * FROM diplom_sh';
$login=$_POST['login'];
$parol=$_POST['parol'];
  if ($r = mysqli_query($dbc, $query)) {

    print "<div class='container'>";
    print "<h2 class='text-center'>Mavjud diplomlarni ko'rib borish</h2>
    <form class='navbar-brand' method='post' action='../login'> <input type='submit' class='btn btn-secondiry ' value='yangi diplom shakillantrish'>
    <input type='hidden' value='$login' name='login'>
    <input type='hidden' value='$parol' name='parol'>
    </form>";

    print "<a href='../../index'><button type='button' class='btn btn-secondiry btn-sm'>";

    print " </span> qayta kirish </button> </a> ";
    print "<table  class='table table-striped ' style='margin-top:15px'>";

    print " <tr>";

    print "<th>id</th>";
    print "<th>fio</th>";
    print "<th>beriladigan_diplom_nomeri</th>";
    print "<th>Ishlov berish</th>";
    print " </tr>";
    while ($row = mysqli_fetch_array($r)) {
      print "<tr>";
      print "<td>{$row['id']}</td>";
   
      print "<td>{$row['fio']}</td>";
     
      print "<td>{$row['beriladigan_diplom_nomeri']}</td>";
   
      print "<td >   <a href='delete?id={$row['id']}&&login=$login&&parol=$parol&&beriladigan_diplom_nomeri={$row['beriladigan_diplom_nomeri']}'> <button type='button' class='btn btn-danger btn-sm'>
<span class='glyphicon glyphicon-trash'></span> Delete </button>
</a> 
<form  method='post' action='edit'>  <button  class='btn btn-secondiry btn-sm '><span class='glyphicon glyphicon-briefcase'></span> <input type='submit'  value='Edit'>
   </button> <input type='hidden' value='$login' name='login'>
    <input type='hidden' value='$parol' name='parol'>
    <input type='hidden' value='{$row['id']}' name='id'>

    </form>
    <form  method='post' action='editi'>  <button  class='btn btn-secondiry btn-sm '><span class='glyphicon glyphicon-briefcase'></span> <input type='submit'  value='Edit ilova'>
   </button> <input type='hidden' value='$login' name='login'>
    <input type='hidden' value='$parol' name='parol'>
    <input type='hidden' value='{$row['id']}' name='id'>
    <input type='hidden' value='{$row['beriladigan_diplom_nomeri']}' name='d'>

    </form>


</td>";

      print "<tr>";
    }
    print "</table>";
  }

  ?>
</body>

</html>