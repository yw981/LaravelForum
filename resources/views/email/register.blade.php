<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravist</title>
</head>
<body>
<h2>Hello,Please confirm your Email</h2>
<a href="{{ url('verify/'.$confirm_code) }}">Click to confirm.</a>
</body>
</html>