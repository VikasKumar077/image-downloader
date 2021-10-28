<?php
if (isset($_POST['DownBtns'])) {


  if ($_POST['file'] != "") {
    $data = file_get_contents($_POST['file']);
    $exploder_Url = explode("/", $_POST['file']);
     $image = end($exploder_Url);
    $filename = rand();

    file_put_contents($image, $data);
  } 
  
  
  else {
    echo "please enter some url";
  }
}

?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://use.fontawesome.com/f58ad378b5.js"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="main">
    <div class="container1">
      <!-- <img src="https://images.indianexpress.com/2021/10/Untitled-design-8-3.jpg" alt=""> -->

      <div id="img-preview">

      </div>
      <div class="content">
        <i class="fa fa-picture-o" aria-hidden="true"></i>
        <div class="text">
          Paste the image url below, to see a preview or download!
        </div>
      </div>


      <div class="cross-btn">
        <i class="fa fa-times-circle" aria-hidden="true" id="close"></i>

      </div>
    </div>


    <div class="form">

      <form action="index.php" method="POST">
        <input type="text" id="input" placeholder="Paste the image url to download" name="file" />
        <br>
        <input type="submit" value="Download" id="submit" name="DownBtns" style="cursor: pointer;" />
      </form>
    </div>

  </div>
  <script>
    let input = document.getElementById('input');
    input.addEventListener('focusout', function() {
      var imgUrl = input.value;
      if (imgUrl != "") {

        var regPattern = /\.(jpe?g|png|gif|bmp)$/i;
        if (regPattern.test(imgUrl)) {
          //  var imgTag= '<img src="'+imgUrl+'" alt=" ">';
          var imgTag = document.createElement('img');
          imgTag.setAttribute('src', imgUrl)

          //    var imgTag=`<img src="${imgUrl}" alt="">`;


          // alert('pattern matched')
          let imgPreview = document.getElementById('img-preview');
          imgPreview.append(imgTag);

          let closeBtn = document.querySelector('#close');
          closeBtn.addEventListener('click', () => {


            imgPreview.remove(imgTag);

          })
        } else {
          alert('not matched')
          input.value = "";
        }
      }
    })
  </script>
</body>

</html>