<?php

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function validate_POST($name, $errorMessage) {
        if (isset($_POST[$name]) && $_POST[$name] !== "") {

            return [
                    "value" => clean_input($_POST[$name]), 
                    "errorMessage" => ""
                ];
        } else {
            return [
                    "value" => "", 
                    "errorMessage" => $errorMessage
                ];
        }
    }

    function print_error_message($variable) {
        echo (!empty($variable)) ? $variable["errorMessage"] : "";
    }

    function print_value($variable) {
        echo (!empty($variable)) ? $variable["value"] : "";
    }

    function print_value_on_selected($variable, $value, $propName) {
        echo (!empty($variable) && $variable["value"] == $value) ? $propName : "";
    }

    function valid_Date($date) {
        $spliter = "";
        if (str_contains($date, '/')) {
            $spliter = '/';
        } else if(str_contains($date, '-')) {
            $spliter = '-';
        }

        if ($spliter !== "") {
            $dateArr = explode($spliter, $date);
            if (count($dateArr) === 3) {
                if (strlen($dateArr[0]) <= 2 && strlen($dateArr[1]) <= 2 && strlen($dateArr[2]) == 4) {
                    $day = $dateArr[0];
                    $month = $dateArr[1];
                    $year = $dateArr[2];
                    
                    if (checkdate($month, $day, $year)) return true;
                }
            } 
        }

        return false;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C15 - PHP Form Complete Form Example</title>
    <link rel="stylesheet" href="css/c15.css">
</head>
<body>
<?php

    $arrival = $nights = $adults = $children = $room = $bed = $smoking = $name = $email = $phone = [];


    if (isset($_POST["form-1"])) {
        $arrival = validate_POST(name: "arrival", errorMessage: "Arrival is required.");
        $nights = validate_POST(name: "nights", errorMessage: "Nights must be a number.");
        $adults = validate_POST(name: "adults", errorMessage: "Adults must be a number.");
        $children = validate_POST(name: "children", errorMessage: "Children must be a number.");
        $room = validate_POST(name: "room", errorMessage: "Select a room type.");
        $bed = validate_POST(name: "bed", errorMessage: "Select a bed type.");
        $smoking = validate_POST(name: "smoking", errorMessage: "");
        $name = validate_POST(name: "name", errorMessage: "Name is required.");
        $email = validate_POST(name: "email",errorMessage: "Email address is required.");
        $phone = validate_POST(name: "phone", errorMessage: "Phone number is required.");

        if ($arrival["value"] !== "" && !valid_Date($arrival["value"])) {
            $arrival["errorMessage"] = "Inválid date format!";
        }

        if ($name["value"] !== "" && !preg_match("/^[a-zA-Z-' ]*$/", $name["value"])) {
            $name["errorMessage"] = "Only letters and white space allowed.";
        }

        if ($email["value"] !== "" && !filter_var($email["value"], FILTER_VALIDATE_EMAIL)) {
            $email["errorMessage"] = "Invalid email format!";
        }

    }
?>

<section class="container">
    <h1>Reservation Request</h1>
    <form method="POST" id="form-1">
        <div class="fields">
            <div class="title">
                <span>General Information</span>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="arrival">Arrival Date:</label>
                </div>
                <div class="col-50">
                    <input type="text" id="arrival" name="arrival" placeholder="Arrival data. Ex: 20/01/2021"
                        value="<?php print_value($arrival); ?>">
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($arrival) ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="nights">Nights: </label>
                </div>
                <div class="col-50">
                    <input type="number" id="nights" name="nights" placeholder="Number of nights..."
                        value="<?php print_value($nights); ?>">
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($nights) ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="adults">Adults: </label>
                </div>
                <div class="col-50">
                    <select id="adults" name="adults">
                        <option <?php print_value_on_selected($adults, 1, "selected"); ?> value="1">1</option>
                        <option <?php print_value_on_selected($adults, 2, "selected"); ?> value="2">2</option>
                        <option <?php print_value_on_selected($adults, 3, "selected"); ?> value="3">3</option>
                    </select>
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($adults) ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="children">Children: </label>
                </div>
                <div class="col-50">
                    <select id="children" name="children">
                        <option <?php print_value_on_selected($children, 0, "selected"); ?> value="0">0</option>
                        <option <?php print_value_on_selected($children, 1, "selected"); ?> value="1">1</option>
                        <option <?php print_value_on_selected($children, 2, "selected"); ?> value="2">2</option>
                        <option <?php print_value_on_selected($children, 3, "selected"); ?> value="3">3</option>
                    </select>
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($children) ?></span>
                    </div>
                </div>
            </div>


        </div>


        <div class="fields">
            <div class="title">
                <span>Preferences</span>
            </div>

            <div class="row">
                <div class="col-25">
                    <label>Room type:</label>
                </div>
                <div class="col-50">
                    <input type="radio" id="standard" name="room" value="standard"
                        <?php print_value_on_selected($room, "standard", "checked"); ?>>
                    <label for="standard">Standard</label>

                    <input type="radio" id="business" name="room" value="business"
                        <?php print_value_on_selected($room, "business", "checked"); ?>>
                    <label for="business">Business</label>

                    <input type="radio" id="suite" name="room" value="suite"
                        <?php print_value_on_selected($room, "suite", "checked"); ?>>
                    <label for="suite">Suite</label>
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($room) ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="">Bed type:</label>
                </div>
                <div class="col-50">
                    <input type="radio" id="king" name="bed" value="king"
                        <?php print_value_on_selected($bed, "king", "checked"); ?>>
                    <label for="king">King</label>

                    <input type="radio" id="double" name="bed" value="double"
                        <?php print_value_on_selected($bed, "double", "checked"); ?>>
                    <label for="double">Double Double</label>

                    <input type="checkbox" id="smoking" name="smoking" value="smoking"
                        <?php print_value_on_selected($smoking, "smoking", "checked"); ?>>
                    <label for="smoking">Smoking</label>
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($bed) ?></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="fields">
            <div class="title">
                <span>Contact Information</span>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="name">Name:</label>
                </div>
                <div class="col-50">
                    <input type="text" id="name" name="name" placeholder="Insert full name..."
                        value="<?php print_value($name); ?>">
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($name) ?></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="email">Email: </label>
                </div>
                <div class="col-50">
                    <input type="email" id="email" name="email" placeholder="Insert email..."
                        value="<?php print_value($email); ?>">
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($email) ?></span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-25">
                    <label for="phone">Phone: </label>
                </div>
                <div class="col-50">
                    <input type="number" id="phone" name="phone" placeholder="Insert phone number..."
                        value="<?php print_value($phone); ?>">
                </div>
                <div class="col-25">
                    <div class="warning">
                        <span><?php print_error_message($phone) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <input name="form-1" type="submit" value="Submit Reservation">
            <button class="btnClear" name="form-clear">Clear</button>
        </div>
    </form>
</section>
</body>
</html>