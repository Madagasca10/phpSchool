<?php 

// WITH ERROR VALIDATION
$namesToValidate = ["title", "description", "genre", "subject", "medium", "year", "museum"];
$errorTypes = ["errorTitle", "errorDescription", "errorGenre", "errorSubject", "errorMedium", "errorYear", "errorMuseum"];

$errors = checkForErrors($namesToValidate, $errorTypes);
if (strlen($errors) > 0) {
  header('Location: challenge02.php' . $errors);
  exit;
} 

function checkForErrors($pNames, $pErrors){
  $errorString = "?";

  for ($i=0; $i < count($pNames); $i++) { 
    $name = $pNames[$i];
    if (!isValidPOST($name)) {
      $errorString .= $pErrors[$i] . '&';
    }
  }

  return substr($errorString, 0, -1); 
}

function isValidPOST($name) {
  return (isset($_POST[$name]) && $_POST[$name] !== "");
}
// WITH ERROR VALIDATION



// WITH NO ERROR VALIDATION

//$namesToValidate = ["title", "description", "genre", "subject", "medium", "year", "museum"];
// if (!validate_POSTS($namesToValidate)) {
//     header('Location: challenge02.php');
//     exit;
// }

// function validate_POSTS($names){
//   foreach ($names as $name) {
//     if ( !(isset($_POST[$name]) && $_POST[$name] !== "") ) return false;
//   }
//   return true;
// }
// WITH NO ERROR VALIDATION
  
  function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function print_Value_From_POST($name){
    if (!isset($name)) return;
    echo clean_input($_POST[$name]);
  }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Chapter 12</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/misc.js"></script>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php include 'header.inc.php'; ?>
    
<main>
    <section class="results">
    
    <table>
      <caption class="results__caption">Art Work Saved</caption>
      <tr>
        <td class="results__label">Title</td>    
        <td class="results__value"><?php print_Value_From_POST("title"); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Description</td>    
        <td class="results__value"><?php print_Value_From_POST("description"); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Genre</td>    
        <td class="results__value"><?php print_Value_From_POST("genre"); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Subject</td>    
        <td class="results__value"><?php print_Value_From_POST("subject"); ?></td> 
      </tr>
      <tr>
        <td class="results__label">Medium</td>    
        <td class="results__value"><?php print_Value_From_POST("medium"); ?></td> 
      </tr>   
      <tr>
        <td class="results__label">Year</td>    
        <td class="results__value"><?php print_Value_From_POST("year"); ?></td> 
      </tr>  
      <tr>
        <td class="results__label">Museum</td>    
        <td class="results__value"><?php print_Value_From_POST("museum"); ?></td> 
      </tr>          
    </table>
    
    </section>
</main>       
</body>
</html>
