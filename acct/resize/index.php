<?php 

$scripts = '  <script type="text/javascript" src="lib/prototype.js"></script>
  <script type="text/javascript" src="lib/scriptaculous.js"></script>
  <script type="text/javascript" src="lib/init_wait.js"></script>';

include 'header.php' ?>

  <div class="info">
    <h1>JavaScript Crop and Resize Images</h1>

    <p>The following is a demo of <a href="http://mondaybynoon.com/2007/01/22/crop-resize-with-javascript-php-and-imagemagick/">
    JavaScript Crop and Resize Images</a>.  Using a combination of <a href="http://www.php.net/">PHP</a>, 
    <a href="http://www.imagemagick.org/">ImageMagick</a>, <a href="http://prototypejs.org/">Prototype</a>, 
    <a href="http://script.aculo.us/">script.aculo.us</a>, and the 
    <a href="http://www.defusion.org.uk/code/javascript-image-cropper-ui-using-prototype-scriptaculous/">JavaScript 
    Image Cropper UI</a> by Dave Spurr, this demo provides a visitor the ability to upload an image, crop it 
    to their liking, and then resize the picture.</p>

    <p>Current filesize limit is <strong>50k</strong>, you can change that as you see fit.</p>

    <form action="crop_image.php" method="post" name="imageUpload" id="imageUpload" enctype="multipart/form-data">
    <fieldset>
      <legend>Upload Image</legend>
      <input type="hidden" class="hidden" name="max_file_size" value="50000" />
      <div class="file">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" />
      </div>
      <div id="submit">
        <input class="submit" type="submit" name="submit" value="Upload" id="upload" />
      </div>
      <div class="hidden" id="wait">
        <img src="images/wait.gif" alt="Please wait..." />
      </div>
    </fieldset>
    </form>

  </div> <!-- /info -->

<?php include 'footer.php' ?>
