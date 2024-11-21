<?php

/**
 * This UI template is made just for the developer in order to test the APP. 
 */
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
    min-height: 90vh;
    text-align: center;
    background-color: #f1f1f1;
    position: relative
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

  p {
    font-size: larger;
  }

  #link {
    margin-top: 4rem;
  }

  .footer {
    position: absolute;
    bottom: -20px;
    right: 0;
    left: 0;
    margin: auto;
    width: 100%;
  }

  #country {
    font-size: 16px;
  }
</style>

<body>
  <div class="img-wrapper">
    <img src="assets/php-icon.png" alt="PHP logo">
    <img src="assets/api-logo.png" alt="API logo" height="70" width="90">
  </div>

  <h1>PHP | API</h1>
  <h2>Welcome to the App</h1>
    <p>If you see this page, this means the app is working just fine</p>
    <p id="link">Visit the project at Github to check for updates</p>
    <a href="https://github.com/Ahmed-Osama2022/php-api">

      <svg height="32" aria-hidden="true" viewBox="0 0 24 24" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle color-fg-default">
        <path d="M12.5.75C6.146.75 1 5.896 1 12.25c0 5.089 3.292 9.387 7.863 10.91.575.101.79-.244.79-.546 0-.273-.014-1.178-.014-2.142-2.889.532-3.636-.704-3.866-1.35-.13-.331-.69-1.352-1.18-1.625-.402-.216-.977-.748-.014-.762.906-.014 1.553.834 1.769 1.179 1.035 1.74 2.688 1.25 3.349.948.1-.747.402-1.25.733-1.538-2.559-.287-5.232-1.279-5.232-5.678 0-1.25.445-2.285 1.178-3.09-.115-.288-.517-1.467.115-3.048 0 0 .963-.302 3.163 1.179.92-.259 1.897-.388 2.875-.388.977 0 1.955.13 2.875.388 2.2-1.495 3.162-1.179 3.162-1.179.633 1.581.23 2.76.115 3.048.733.805 1.179 1.825 1.179 3.09 0 4.413-2.688 5.39-5.247 5.678.417.36.776 1.05.776 2.128 0 1.538-.014 2.774-.014 3.162 0 .302.216.662.79.547C20.709 21.637 24 17.324 24 12.25 24 5.896 18.854.75 12.5.75Z"></path>
      </svg>
    </a>
    <hr>
    <div class="footer">
      <p><b>Author:</b> <i>Ahmed Osama Khashaba</i></p>
      <p id="country">From Egypt with 💕</p>
    </div>
</body>

</html>