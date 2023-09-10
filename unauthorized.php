


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
  <title><?php if(isset($_GET['error'])) { echo $_GET['error']; }  else { echo "Oops!! ";}?> </title>
  
  <link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Frijole|Josefin+Sans:300,400,400i,600,700|Viga" rel="stylesheet">
  <link rel="stylesheet" href="css/unauthorized.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <use>
    <!-- simple svg for 403 -->
    <svg class="whistle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
      <!-- simbol for unauthorized -->
      <path d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50 50-22.4 50-50S77.6 0 50 0zm0 90C27.5 90 10 72.5 10 50S27.5 10 50 10s40 17.5 40 40-17.5 40-40 40z"/>
      <path d="M50 20c-11.6 0-21 9.4-21 21s9.4 21 21 21 21-9.4 21-21-9.4-21-21-21zm0 36c-8.3 0-15-6.7-15-15s6.7-15 15-15 15 6.7 15 15-6.7 15-15 15z"/>
      <path d="M50 30c-2.8 0-5 2.2-5 5s2.2 5 5 5 5-2.2 5-5-2.2-5-5-5zm0 8c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z"/>
      <path d="M50 50c-2.8 0-5 2.2-5 5v15c0 2.8 2.2 5 5 5s5-2.2 5-5V55c0-2.8-2.2-5-5-5zm0 20c-1.7 0-3-1.3-3-3V55c0-1.7 1.3-3 3-3s3 1.3 3 3v15c0 1.7-1.3 3-3 3z"/>
      <path d="M50 70c-2.8 0-5 2.2-5 5v15c0 2.8 2.2 5 5 5s5-2.2 5-5V75c0-2.8-2.2-5-5-5zm0 20c-1.7 0-3-1.3-3-3V75c0-1.7 1.3-3 3-3s3 1.3 3 3v15c0 1.7-1.3 3-3 3z"/>
      
    </svg>

</use>
<h1>403 
<br>
<?php if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>

</h1>
<h2>Not this time, access forbidden!</h2>
</body>
</html>
