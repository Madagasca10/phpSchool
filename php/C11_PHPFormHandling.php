<?php
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C11 - PHP Form Handling</title>
    <link rel="stylesheet" href="css/c11.css">
</head>

<body>
    <?php

    
    ?>

    <section class="container">
        <h1></h1>
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
                        <input type="text" id="arrival" name="arrival" placeholder="Arrival data..."
                            value="">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nights">Nights: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="nights" name="nights" placeholder="Number of nights..."
                            value="">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="adults">Adults: </label>
                    </div>
                    <div class="col-50">
                        <select id="adults" name="adults">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="children">Children: </label>
                    </div>
                    <div class="col-50">
                        <select id="children" name="children">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
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
                        <input type="radio" id="standard" name="room" value="standard">
                        <label for="standard">Standard</label>

                        <input type="radio" id="business" name="room" value="business">
                        <label for="business">Business</label>

                        <input type="radio" id="suite" name="room" value="suite">
                        <label for="suite">Suite</label>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="">Bed type:</label>
                    </div>
                    <div class="col-50">
                        <input type="radio" id="king" name="bed" value="king">
                        <label for="king">King</label>

                        <input type="radio" id="double" name="bed" value="double">
                        <label for="double">Double Double</label>

                        <input type="checkbox" id="smoking" name="smoking" value="smoking">
                        <label for="smoking">Smoking</label>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
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
                            value="">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="email">Email: </label>
                    </div>
                    <div class="col-50">
                        <input type="email" id="email" name="email" placeholder="Insert email..."
                            value="">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="phone" name="phone" placeholder="Insert phone number..."
                            value="">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <input name="form-1" type="submit" value="Submit Reservation">
                <button class="btnClear" name="form-clear">Clear</button>
            </div>
        </form>

        <div class="solution">
            <h1>Your Given details are as:</h1>
            <?php
                if (isset($_POST["form-1"])) {

                    $arrival = $nights = $adults = $children = $room = $bed = $smoking = $name = $email = $phone = "";

                
                    
                    $arrival = (isset($_POST["arrival"])) ? clean_input($_POST["arrival"]) : "";
                    $nights = (isset($_POST["nights"])) ? clean_input($_POST["nights"]) : "";
                    $adults = (isset($_POST["adults"])) ? clean_input($_POST["adults"]) : "";
                    $children = (isset($_POST["children"])) ? clean_input($_POST["children"]) : "";
                    $room = (isset($_POST["room"])) ? clean_input($_POST["room"]) : "";
                    $bed = (isset($_POST["bed"])) ? clean_input($_POST["bed"]) : "";
                    $smoking = (isset($_POST["smoking"])) ? clean_input($_POST["smoking"]) : "";
                    $name = (isset($_POST["name"])) ? clean_input($_POST["name"]) : "";
                    $email = (isset($_POST["email"])) ? clean_input($_POST["email"]) : "";
                    $phone = (isset($_POST["phone"])) ? clean_input($_POST["phone"]) : "";

                    $smokeValue = (!empty($smoking)) ? "Yes" : "No"; 

                    echo "<p> <strong>Arrival:</strong> $arrival.</p>
                    <p> <strong>Nights:</strong> $nights.</p>
                    <p> <strong>Adults:</strong> $adults.</p>
                    <p> <strong>Children:</strong> $children.</p>
                    <p> <strong>Room:</strong> $room.</p>
                    <p> <strong>Bed:</strong> $bed.</p>
                    <p> <strong>Smoking:</strong> $smokeValue.</p>
                    <p> <strong>Email:</strong> $email.</p>
                    <p> <strong>Phone:</strong> $phone.</p>";
                }
            ?>
        </div>
    </section>




    <?php
        $details;

        if (isset($_POST["classRegistration"])) {
            $name = (isset($_POST["name"])) ? clean_input($_POST["name"]) : "";
            $email = (isset($_POST["email"])) ? clean_input($_POST["email"]) : "";
            $time = (isset($_POST["time"])) ? clean_input($_POST["time"]) : "";
            $classDetails = (isset($_POST["classDetails"])) ? clean_input($_POST["classDetails"]) : "";
            $gender = (isset($_POST["gender"])) ? clean_input($_POST["gender"]) : "";

            $details = [$name, $email, $time, $classDetails, $gender];
        }
    ?>
        <section class="registration">
        <h1>Absolute Class Registration</h1>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name"><br><br>

            <label>E-mail:</label>
            <input type="text" name="email"><br><br>

            <label>Especific Time (10h, 15h, 19h):</label>
            <input type="text" name="time"><br><br>

            <label>Class Details:</label>
            <textarea name="classDetails" cols="30" rows="10"></textarea><br><br>

            <label>Gender:</label><br>
            <label>Male</label>
            <input type="radio" name="gender" value="male">
            <label>Female</label>
            <input type="radio" name="gender" value="female"><br><br>

            <input type="submit" name="classRegistration" value="Submit">
        </form>

        <div class="solution">
            <h1>Your Given details are as:</h1>
            <?php
                if (isset($details)) {
                    echo "<p> <strong>Name:</strong> {$details[0]}.</p>
                    <p> <strong>E-mail:</strong> {$details[1]}.</p>
                    <p> <strong>Time:</strong> {$details[2]}.</p>
                    <p> <strong>Class Details:</strong> {$details[3]}.</p>
                    <p> <strong>Gender:</strong> {$details[4]}.</p>";
                }
            ?>
        </div>
    </section>





</body>

</html>