<?php
    // Error Validation
    $errorTitle = hasError("errorTitle", "Title is Required.");
    $errorDescription = hasError("errorDescription", "Description is Required.");
    $errorGenre = hasError("errorGenre", "Genre is Required.");
    $errorSubject = hasError("errorSubject", "Subject is Required.");
    $errorMedium = hasError("errorMedium", "Medium is Required.");
    $errorYear = hasError("errorYear", "Year is Required.");
    $errorMuseum = hasError("errorMuseum", "Museum is Required.");
    
    function hasError($errorName, $errorMessage){
        if (isset($_GET[$errorName])) {
            return $errorMessage;
        }
        return "";
    }
    // Error Validation
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

<?php
    $genres = ["Abstract", "Baroque", "Gothic", "Renaissance"];
    $subjects = ["Animals", "Landscape", "People"];

    
    function print_Options_From_Array($optionsArray){
        $options = "";
        foreach ($optionsArray as $option) {
            $options .= "<option>$option</option>";
        }
        echo $options;
    }

?>


<main>
<form class="form"  id="mainForm" method="POST" action="art-process.php">
   <fieldset class="form__panel">
      <legend class="form__heading">Edit Art Work Details</legend>
        <p class="form__row">
           <label>Title</label><br/>
           <span class="error"><?php echo $errorTitle ?></span><br/>
           <input type="text" name="title" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label>Description</label><br/>
           <span class="error"><?php echo $errorDescription ?></span><br/>
           <input type="text" name="description" class="form__input form__input--large">
       </p>            
       <p class="form__row"> 
           <label>Genre</label><br/>
           <span class="error"><?php echo $errorGenre ?></span><br/>
           <select name="genre" class="form__input form__select">
              <option>Choose genre</option> 
              <?php print_Options_From_Array($genres); ?>
           </select>
       </p>
       <p class="form__row"> 
           <label>Subject</label><br/>
           <span class="error"><?php echo $errorSubject ?></span><br/>
           <select name="subject" class="form__input form__select">
              <option>Choose subject</option> 
              <?php print_Options_From_Array($subjects); ?>
           </select>
       </p>
       <p class="form__row">	
           <label>Medium</label><br/>
           <span class="error"><?php echo $errorMedium ?></span><br/>            
           <input type="text" name="medium" class="form__input form__input--medium" />
       </p>
       <p class="form__row">	
           <label>Year</label><br/>
           <span class="error"><?php echo $errorYear ?></span><br/>            
           <input type="text" name="year" class="form__input form__input--small" />
       </p>  
       <p class="form__row">	
           <label>Museum</label><br/>   
           <span class="error"><?php echo $errorMuseum ?></span><br/>            
           <input type="text" name="museum" class="form__input form__input--medium"/>
       </p>                             

       <div class="form__box"> 
          <input type="submit" class="form__btn"> <input type="reset" value="Clear Form" class="form__btn">      
       </div>
   </fieldset>
</form>
</main>       
</body>
</html>
