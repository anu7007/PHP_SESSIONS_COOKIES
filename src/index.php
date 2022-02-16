<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
</head>
<style>
  #gallery{
  display: grid;
  grid-template-columns: auto auto auto auto;
}
#upload{
  color: white;
  background-color: blue;
  padding: 10px;
  border: none;
}
.pic{
  margin-bottom: 10px;
}
  </style>

  
<body>
  <h2>Image Gallery</h2>
  <p>This page displays the list of uploaded images</p>
<form action="upload.php" method="post" enctype="multipart/form-data">

  <input type="file" name="picture" id="picture"><br><br>
  <input type="submit" id="upload" name="submit" value="Upload"><br><br>
</form>


<div id="gallery">
  <?php
  $_SESSION['pics'] = glob("uploads/*.*");
  $len=count($_SESSION['pics']);
  for($i=0;$i<$len;$i++)
  {?>
    <img src="<?php echo $_SESSION['pics'][$i]; ?>" alt="picture" width="200px" height="150px" class="pic"/><?php
  }?> 
</div>

</body>
</html>