<html>
<head>
  <!--<script src="jquery.js" type="text/javascript"></script>-->
  <script src="<?php echo assets_dir()?>reload_page/progress.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo assets_dir()?>reload_page/progress_style.css">
</head>
<body>
  
  <div class='progress' id="progress_div">
    <div class='bar' id='bar1'></div>
    <div class='percent' id='percent1'></div>
  </div>
  
  <!-- <div id="wrapper">
    <div id="content">
      <h1>Display Progress Bar While Page Loads Using jQuery<p>TalkersCode.com</p></h1>
    </div>
  </div> -->
  
  <input type="hidden" id="progress_width" value="0">
</body>
</html>