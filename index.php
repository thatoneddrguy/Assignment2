<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assignment 2</title>
    </head>
    <body>
        <?php
            //$filepath = $_SERVER['DOCUMENT_ROOT']."employees.txt";
            $filepath = "employees.txt";
            if(is_readable($filepath))
            {
                echo "yes";
            }
        ?>
    </body>
</html>
