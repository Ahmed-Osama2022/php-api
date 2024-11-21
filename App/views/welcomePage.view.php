<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
</head>

<style>
  body {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    text-align: center;
    background-color: #f1f1f1;
  }

  .img-wrapper {
    overflow: hidden;
    box-shadow: 0;
    display: flex;
    justify-content: space-between;
    gap: 3rem;
    flex-direction: row;
    align-items: center;
  }

  .img-wrapper img {
    border: 0;
    outline: 0;
    filter: drop-shadow(3px 3px 0.15rem #797AB2);
  }
</style>

<body>
  <div class="img-wrapper">
    <img src="assets/php-icon.png" alt="PHP logo">
    <img src="assets/api-logo.png" alt="API logo" height="70" width="90">

  </div>
  <h1>Welcome to the App</h1>
  <p>If you see this page, this means the app is working just fine</p>
</body>

</html>