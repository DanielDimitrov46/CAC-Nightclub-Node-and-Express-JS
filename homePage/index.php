<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Шах и мат</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css ">

    <link rel="stylesheet" href="../footer.css">
    <script src="https://kit.fontawesome.com/dbf5309686.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
include("../header.php")
?>

<div class="video-container">
  <video id="myVideo" width="100%" autoplay muted loop>
</video>
  <div class="overlay">
<!--      <--Calculate to be responsive-->
    <h1 class ="ad" style="font-size: 8vw;font-size: 35px;">Добре дошли в най-добрата дискотека на Балканите</h1>
  </div>
</div>





<script>
    var videoSource = new Array();
    videoSource[0] = '../img/video1.mp4';
    videoSource[1] = '../img/video2.mp4';
    var videoCount = videoSource.length;

    document.getElementById("myVideo").setAttribute("src", videoSource[0]);

    function videoPlay(videoNum) {
        document.getElementById("myVideo").setAttribute("src", videoSource[videoNum]);
        document.getElementById("myVideo").load();
        document.getElementById("myVideo").play();
    }

    document.getElementById('myVideo').addEventListener('ended', myHandler, false);

    function myHandler() {
        i++;
        if (i == (videoCount - 1)) {
            i = 0;
            videoPlay(i);
        } else {
            videoPlay(i);
        }

    }
</script>

<?php
include("../footer.php")
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
</body>
</html>