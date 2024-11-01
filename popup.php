<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pl-PL">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Google+</title>
</head>
<body>
    <style type="text/css">
        *       {padding: 2px 0 0 3px; color: #444; font: 17px arial,sans-serif;}
        iframe  {height: 440px !important;}
        h1      {margin: 0 0 10px; font-size: 17px; font-weight: normal;}
    </style>


    <?php
    if($_GET['service']=='googleplus')
        { ?>
        <h1><?php echo $_GET['msg'] ?></h1>
        <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="400" data-href="<?php echo $_GET['url'] ?>"></div>
        <script type="text/javascript">
          window.___gcfg = {lang: 'pl'};
        
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
        <?php }
    ?>

</body>
</html>