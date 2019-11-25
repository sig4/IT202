<html>
    <body>
        <form  method="POST">
            <input type="submit" name="on" value="on">
            <input type="submit" name="off" value="off">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['on'])) {
        echo "button on clicked";
    }
    if(isset($_POST['off'])) {
        offFunc();
    }

    function onFunc(){
        echo "Button on Clicked";
    }
    function offFunc(){
        echo "Button off clicked";
    }
?>
