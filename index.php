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
            
            if(isset($_POST['employeeid']))
            {
                $emp_ID_form = $_POST['employeeid'];
                $emp_ID_isset = true;
            }
            else
            {
                $emp_ID_isset = false;
            }
            $emp_ID_found = false; //default value, only set to true if employee id is, in fact, found in the text file
            
            if(is_readable($filepath) and $emp_ID_isset)
            {
                $fh = fopen($filepath,"r");
                while(!feof($fh))
                {
                    $lineoftext = fgets($fh);
                    $line_arr = explode(",", $lineoftext);
                    $emp_ID_txt = trim($line_arr[0]);
                    if($emp_ID_txt == $emp_ID_form)
                    {
                        $emp_ID_found = true;
                        $emp_last_name = trim($line_arr[1]);
                        $emp_first_name = trim($line_arr[2]);
                        $emp_pay_rate = trim($line_arr[3]);
                        $emp_hours = trim($line_arr[4]);
                    }
                }
            }
        ?>
        
        <form method="POST">
            Employee ID: <input type="text" name="employeeid" value="<?php echo $emp_ID_found ? $emp_ID_form : "ERROR: Employee ID not found." ?>" size="30"><br>
            Last Name: <input type="text" <?php if($emp_ID_found) echo "value=".$emp_last_name ?> readonly><br>
            First Name: <input type="text" <?php if($emp_ID_found) echo "value=".$emp_first_name ?> readonly><br>
            PayRate: <input type="text" <?php if($emp_ID_found) echo "value=".$emp_pay_rate ?> readonly><br>
            Hours: <input type="text" <?php if($emp_ID_found) echo "value=".$emp_hours ?> readonly><br>
            <input type="submit" value="Lookup">
        </form>
        
    </body>
</html>
