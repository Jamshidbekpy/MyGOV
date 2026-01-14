<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show news</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include '../../mysqli_connect.php';
  $query = "SELECT * FROM  qayta_ta_f";

  if ($r = mysqli_query($dbc, $query)) {
    while ($row = mysqli_fetch_array($r)) {
      if ($_POST['id'] == $row['id']) {
        print "<div class='container mt-4'>";
        print "  <div class='row'>";
        print " <div class='col-md-1'></div>";
        print " <div class='col-md-10 text-center' style='background:#fff'>";
        print "  <form action='edit1' class='form-group' method='POST' enctype='multipart/form-data'> ";

        print " <span style='font-weight:bold; font-size:24px'></span>";
        print "<br>   <label for='maqola'>Fan nomi</label>
              <textarea  id='maqola'  class='form-control' rows='1' style='resize: none;' name='name'>{$row['name']}</textarea>";
          print "<br>   <label for='maqola'>Malumot</label>
      
      <textarea  id='maqola'  class='form-control' rows='1' style='resize: none;' name='malumot'>{$row['malumot']}</textarea>";
  print "<br>   <label for='maqola'>Soat</label>
  <textarea  id='maqola'  class='form-control' rows='1' style='resize: none;' name='soat'>{$row['soat']}</textarea>";
print "<input type='submit'   class='btn btn-warning ' value='edit' style='font-size:30px; font-weight:bold;float:right;   font-size:18px; margin:15px'> ";

        print "<input type='hidden'name='id' value='{$row['id']}'>";
        print "<input type='hidden'name='login' value='{$_POST['login']}'>";
        print "<input type='hidden'name='parol' value='{$_POST['parol']}'>";
        print "</form>  </div> <div class='col-md-1'></div></div></div>";
      }
    }
  }



  ?>
</body>

</html>