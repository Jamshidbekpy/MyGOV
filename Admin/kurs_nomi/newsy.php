<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show maqola</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <?php
  include '../../mysqli_connect.php';
  $query = 'SELECT * FROM kurs_nomi';

  if ($r = mysqli_query($dbc, $query)) {

    print "<div class='container'>";
    print "<h2 class='text-center'>O'quv kurs nomi mavzularini ko'rib borish</h2>";
    print "<a href='new'><button type='button' class='btn btn-primary btn-sm '>";
    print "<span class='glyphicon glyphicon-plus'>";
    print " </span> yangi kurs nomi qo'shish </button> </a> ";
    print "<a href='../../index'><button type='button' class='btn btn-secondiry btn-sm'>";

    print " </span> qayta kirish </button> </a> ";
    print "<table  class='table table-striped ' style='margin-top:15px'>";

    print " <tr>";

    print "<th>id</th>";
    print "<th>nomi</th>";
    print "<th>Ishlov berish</th>";
    print " </tr>";
    while ($row = mysqli_fetch_array($r)) {
      print "<tr>";
      print "<td>{$row['id']}</td>";
   
      print "<td>{$row['name']}</td>";
   
      print "<td>   <a href='delete?id={$row['id']}'> <button type='button' class='btn btn-danger btn-sm'>
<span class='glyphicon glyphicon-trash'></span> Delete </button>
</a>  <a href='edit?id={$row['id']}'> <button type='button' class='btn btn-secondiry btn-sm'>
<span class='glyphicon glyphicon-briefcase'></span> Edit
</button></a>

</td>";

      print "<tr>";
    }
    print "</table>";
  }

  ?>
</body>

</html>