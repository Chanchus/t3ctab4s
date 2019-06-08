<?php require 'navbar.php'; ?>



<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js">
</script>

<script>

function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}

</script>


<div style="height:10px"> </div>


<div class="container">
    
    <h1 style=font-size:60px> Overview | Scanner </h1>
    
    <br><br>

    <!-- <div class="row">
        <a href="createuser.php" class="btn btn-info btn-lg" id="menubtn"> Register User</a>
        
         <a href="#" class="btn btn-light btn-lg" id="menubtn"> New User</a> 
        
    </div> -->


    <br>
</div>

<div class="container" style="margin-top:20px;">

    <br>
        <h2> QR Code Scanner </h2>
  

        <input type=text class=qrcode-text>
        <label class="btn btn-light">
        <input type=file
                accept="image/*"
                capture=environment
                onchange="openQRCamera(this);"
                tabindex=-1>
        </label>
        

    <br>
</div>