<?php

  $test = "test_content";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>pass php pram to js</title>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>

  <div id="d"></div>


  <div id="a"></div>

  <script>
    $("#d").html("<?php echo $test?>");
    var content_after = $("#d").html();

    console.log(content_after);

    $("#a").html(content_after);
    
  </script>
  
</body>
</html>