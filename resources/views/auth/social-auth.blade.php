<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Social Auth</title>


    <style type="text/css">
    .google-btn {
        width: 184px;
        height: 42px;
        background-color: #4285f4;
        border-radius: 2px;
        box-shadow: 0 3px 4px 0 rgba(0,0,0,.25);
        cursor: pointer;
        display: flex;
        align-items: center;
    }
    .google-icon-wrapper {
        width: 40px;
        height: 40px;
        border-radius: 2px;
        background-color: #fff;
        margin-left: 1px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .google-icon {
        width: 18px;
        height: 18px;
    }
    .btn-text {
        color: #fff;
        font-size: 14px;
        letter-spacing: 0.2px;
        font-family: "Roboto", sans-serif;
        margin-left: 10px;
        margin-top: 0;
        margin-bottom: 0;
    }
    .google-btn:hover {
        box-shadow: 0 0 6px #4285f4;
    }
    .google-btn:active {
        background: #1669F2;
    }
    </style>
</head>
<body>

<div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
    <div class="google-btn" onclick="window.location.href='{{route('googleRedirect')}}'">
        <div class="google-icon-wrapper">
            <img class="google-icon" src="https://developers.google.com/static/identity/images/g-logo.png?hl=ko"/>
        </div>
        <p class="btn-text"><b>Sign in with Google</b></p>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
