
<?php
  if($_SERVER['REQUEST_METHOD']=="GET"){
    header('Location:../index');


  }?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>OʼQISH JOYIDАN MАʼLUMOTNOMА</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
  include '../mysqli_connect.php';
  $query = 'SELECT * FROM hujjatt ORDER BY id DESC;';
$login=$_POST['login'];
$parol=$_POST['parol'];
  if ($r = mysqli_query($dbc, $query)) {

    print "<div class='container'>";
    print "<h2 class='text-center'>Barcha OʼQISH JOYIDАN MАʼLUMOTNOMА hujjatlar</h2>";
    print "<form class='needs-validation' novalidate action='neww' method='post'>
          <input type='hidden' name='login' value='{$login}'>
          <input type='hidden' name='parol' value='{$parol}'>
      <input type='submit' value='yangi hujjat tayorlash' class='btn btn-primary btn-sm ' > 
      </form>
     ";
     print "<table  class='table table-striped ' style='margin-top:15px'>";

    print " <tr>";

    print "<th>id</th>";
    print "<th>F.I.O</th>";
    print "<th>pinfl</th>";
  
    print "<th>Ma`lumotnoma</th>";
    print "<th>Ishlov berish</th>";
    print " </tr>";
    while ($row = mysqli_fetch_array($r)) {
      print "<tr>";
      print "<td>{$row['id']}</td>";
   
      print "<td>{$row['fio']}</td>";
   
      print "<td>{$row['pinfl']}</td>";
    
      print "<td><a href='../files/download/{$row['numbers']}.pdf'  class='btn btn-info' download>Ma`lumotnoma </a></td>";
    
   
      print "<td>  
      <form class='needs-validation' novalidate action='editt' method='post' style='border:1px solid;text-align:center;padding:3px; border-radius:3px'>
          <input type='hidden' name='login' value='{$login}'>
          <input type='hidden' name='parol' value='{$parol}'>
          <input type='hidden' name='id' value='{$row['id']}'>
      <span class='glyphicon glyphicon-briefcase'></span> <input type='submit' value='Edit' class='btn btn-primary btn-sm ' > 
      </form>
      

</td>";

      print "<tr>";
    }
    print "</table>";
  }
  }
  ?>
</body>

</html>