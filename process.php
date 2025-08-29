<?php
// $result = '';
if ($_SERVER['REQUEST_METHOD']=='POST') {
   $inputText = $_POST['inputText'];
   $operation = $_POST['operation'];
   switch ($operation) {
    case 'uppercase':
        $result = strtoupper($inputText);
        break;
    
    case 'lowercase':
        $result = strtolower($inputText);
        break;
    case 'reverse':
        $result = strrev($inputText);
        break;
    case 'charCount':
        $result = strlen($inputText);
        break;
    case 'removeSpaces':
        $result = str_replace(" ",'',$inputText);  
        break;     
    case 'explode':
        $words = explode(" ",$inputText);  
        $result = implode(",",$words);
        break;
    case 'wordCount':
        $result = str_word_count($inputText);
        break;  
    case 'shuffle':
        $result = str_shuffle($inputText);   
        break;
    case 'wordWrap':
        $result = is_numeric($inputText)? wordwrap($inputText,3,' ',true) : wordwrap($inputText,4,'-',true);
        break;
    case 'findPosition':
        $substring = $_POST['substring'];
        $result = strpos(strtolower($inputText),strtolower($substring));
        $result = $result?"'$substring' is found at position '$result'" : "'$substring' id not found!";
        break;
    case 'substr':
        if (isset($_POST['start']) && is_numeric($_POST['start'])) {
            $start = intval($_POST['start']);
            if (isset($_POST['length']) && is_numeric($_POST['length']) && $_POST['length'>0]) {
            $length = intval($_POST['length']);
            $result = substr($inputText,$start,$length);
               
            }
            else {
                $result = substr($inputText,$start);
            }
        }
        else {
            $result = "Start Position is not provided or invalid for substr operation !";
        }
         break;
    case  'numeric':
        $result = is_numeric($inputText)? "Numerical !": "Not Numeric";
        break;    
    case 'getNum':
       $result= intval($inputText);
        $result = $result? $result:"No numeric value is present!";
        break;
    default:
        $result = "Invalid Operation";
        break;
   }
}
else{
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Transformation Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Text Transformation Result</h1>

        <p>Original Text: <?php echo $inputText; ?></p>
        <p>Result: <?php echo $result; ?></p>
        <p><a href="index.php">Back to Text Transformation Tool</a></p>
    </div>
</body>
</html>
