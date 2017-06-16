<html>
    <head>
        <title><?php echo $DynmapTitle; ?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/css_disconected.php" />
    </head>
    <body>
        <form action="" method="post">
            <font style="font-size: 35px; font-weight: bold">Please click connect to resume<br /><br/>
                 <div id="connect" class="menu">
                <button type="submit" class="bnt bnt-default">
                    <i class="fa fa-sign-out"></i>
                    <font style="font-size: 26px">&nbsp;connect</font>
                </button>
                <input type="hidden" name="action2" id="action2" value="connect" />
            </div>
            </font>
        </form>
        <div id="version">
        Version : <?php echo $version; ?>
        </div>
    </body>
</html>