<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        .quiz-container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
        .question-group {
            margin-bottom: 10px;
        }
        .quiz-container button {
            display: block;
            width: 100%;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .quiz-container button:hover {
            background-color: #45a049;
        }

        #review-container {
            width: 200px;
            height: 4px;
            position: relative;
            overflow: hidden;
        }

        .good {
            background-color: red;
            box-shadow: 0 0 10px 5px red;
        }

        .average {
            background-color: blue;
            box-shadow: 0 0 10px 5px blue;
        }

        .excellent {
            background-color: green;
            box-shadow: 0 0 10px 5px green;
           animation: glow 1s ease-in-out infinite alternate;
        }

        .good::before,
        .average::before,
        .excellent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            animation: glow 1s infinite alternate;
        }

        @keyframes glow {
  0% {
    box-shadow: 0 0 10px 0 #ff0080, 0 0 20px 0 #ff0080, 0 0 30px 0 #ff0080;
  }
  50% {
    box-shadow: 0 0 20px 10px #ff0080, 0 0 40px 10px #ff0080, 0 0 60px 10px #ff0080;
  }
  100% {
    box-shadow: 0 0 10px 0 #ff0080, 0 0 20px 0 #ff0080, 0 0 30px 0 #ff0080;
  }
}
input[type="radio"] {
    display: none; 
}
input[type="radio"] + label:before {
    content: "";
    display: inline-block;
    width: 20px;
    height: 20px; 
    background-color: #fff; 
    border: 1px solid #ccc; 
    border-radius: 3px; 
    margin-right: 5px; 
}

input[type="radio"]:checked + label:before {
    content: "\2713"; 
    font-size: 16px; 
    line-height: 20px; 
    text-align: center; 
    color: #4CAF50; 
    background-color: #fff; 
    border: 1px solid #4CAF50; 
}
.quiz-container {
    width: 120%;
    max-width: 1000px; 
    margin: 0 auto;
}
.question-group {
    margin-bottom: 10px;
}

.quiz-container button {
    margin-top: 20px; 
}
input[type="radio"] + label {
    display: inline-block; 
    vertical-align: middle; 
    cursor: pointer; 
}
.question-group {
    margin-bottom: 10px;
}

        .wrapper {
    display: grid;
    grid-template-columns: 40% 20%; 
    grid-gap: 10px; 
}



    </style>
</head>

<body>
    <div class="quiz-container">
        <form id="quizForm">
            <h2>Food</h2>
            <p>QUESTION1: What type of diet do you follow?</p>
            <div class="question-group">
                <input type="radio" id="option1" name="food_type" value="0">
                <label for="option1">Mostly vegetarian (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option2" name="food_type" value="1">
                <label for="option2">Balanced diet (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option3" name="food_type" value="2">
                <label for="option3">Mostly meat-based (2 points)</label><br><br>
            </div>

            <p>QUESTION2: How often do you eat out at restaurants or cafes per week?</p>
            <div class="question-group">
                <input type="radio" id="option4" name="food_type1" value="0">
                <label for="option4">Rarely or never (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option5" name="food_type1" value="1">
                <label for="option5">1-2 times per week (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option6" name="food_type1" value="2">
                <label for="option6">3-5 times per week (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option7" name="food_type1" value="3">
                <label for="option7">More than 5 times per week (3 points)</label><br>
            </div>

            <p>Question 3: How much food do you waste on average per week?</p>
            <div class="question-group">
                <input type="radio" id="option8" name="food_waste" value="0">
                <label for="option8">Almost none (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option9" name="food_waste" value="1">
                <label for="option9">A little (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option10" name="food_waste" value="2">
                <label for="option10">Moderate amount (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option11" name="food_waste" value="3">
                <label for="option11">A lot (3 points)</label><br>
            </div>

            <p>Question 4: How often do you consume packaged or processed foods?</p>

            <div class="question-group">
                <input type="radio" id="option12" name="processed_food" value="0">
                <label for="option12">Rarely or never (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option13" name="processed_food" value="1">
                <label for="option13">Occasionally (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option14" name="processed_food" value="2">
                <label for="option14">Frequently (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option15" name="processed_food" value="3">
                <label for="option14">Almost always (3 points)
                </label><br>
            </div>
            <h2>Travel</h2>
            <p>Question 1: What is your primary mode of transport for commuting?</p>
            <div class="question-group">
                <input type="radio" id="option16" name="travel_mode" value="0">
                <label for="option16">Public transportation or cycling (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option17" name="travel_mode" value="1">
                <label for="option17">Carpooling or car-sharing (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option18" name="travel_mode" value="2">
                <label for="option18">Driving alone (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option19" name="travel_mode" value="3">
                <label for="option19">Using rideshare services (3 points)</label><br>
            </div>

            <p>Question 2: How much time do you spend traveling per week (in hours)?</p>
            <div class="question-group">
                <input type="radio" id="option20" name="travel_time" value="0">
                <label for="option20">Less than 5 hours (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option21" name="travel_time" value="1">
                <label for="option21">5-10 hours (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option22" name="travel_time" value="2">
                <label for="option22">11-20 hours (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option23" name="travel_time" value="3">
                <label for="option23">More than 20 hours (3 points)</label><br>
            </div>

            <p>Question 3: How many flights have you boarded in the past year?</p>
            <div class="question-group">
                <input type="radio" id="option24" name="flights" value="0">
                <label for="option24">None (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option25" name="flights" value="1">
                <label for="option25">1-2 flights (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option26" name="flights" value="2">
                <label for="option26">3-5 flights (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option27" name="flights" value="3">
                <label for="option27">More than 5 flights (3 points)</label><br>
            </div>
            <p>Question 4: How often do you use eco-friendly modes of transportation (e.g., walking, cycling)?
            </p>

            <div class="question-group">
                <input type="radio" id="option28" name="eco_travel" value="0">
                <label for="option28">Often (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option29" name="eco_travel" value="1">
                <label for="option29">Occasionally (1 point)
                </label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option30" name="eco_travel" value="2">
                <label for="option30">Rarely (2 points)

                </label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option31" name="eco_travel" value="3">
                <label for="option31">Never (3 points)
                </label><br>
            </div>
            <h2>Home</h2>
            <p>Question 1: How many members are there in your household?</p>
            <div class="question-group">
                <input type="radio" id="option32" name="household_size" value="0">
                <label for="option32">1-2 members (0 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option33" name="household_size" value="1">
                <label for="option33">3-4 members (1 point)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option34" name="household_size" value="2">
                <label for="option34">5-6 members (2 points)</label><br>
            </div>
            <div class="question-group">
                <input type="radio" id="option35" name="household_size" value="3">
                <label for="option35">More than 6 members (3 points)</label><br>
            </div>
            <p>Question 2: What is your average monthly electricity consumption (in kWh)?</p>
            <form action="result.html" method="post">
                <div class="question-group">
                    <input type="radio" id="option36" name="electricity_usage" value="0">
                    <label for="option36">Less than 100 kWh (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option37" name="electricity_usage" value="1">
                    <label for="option37">100-300 kWh (1 point)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option38" name="electricity_usage" value="2">
                    <label for="option38">301-500 kWh (2 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option39" name="electricity_usage" value="3">
                    <label for="option39">More than 500 kWh (3 points)</label><br>
                </div>
                <p>Question 3: How often do you remember to switch off lights and appliances when not in use?
                </p>

                <div class="question-group">
                    <input type="radio" id="option40" name="switch_off" value="0">
                    <label for="option40">Always (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option41" name="switch_off" value="1">
                    <label for="option41">Most of the time (1 point)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option42" name="switch_off" value="2">
                    <label for="option42">Sometimes (2 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option43" name="switch_off" value="3">
                    <label for="option43">Rarely or never (3 points)</label><br>
                </div>
                <p>Question 4: Do you practice energy-saving habits (e.g., using energy-efficient appliances,
                    insulating your
                    home)?</p>

                <div class="question-group">
                    <input type="radio" id="option44" name="energy_saving" value="0">
                    <label for="option44">Yes, regularly (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option45" name="energy_saving" value="1">
                    <label for="option45">Sometimes (1 point)
                    </label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option46" name="energy_saving" value="2">
                    <label for="option46">Rarely (2 points)
                    </label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option47" name="energy_saving" value="3">
                    <label for="option47">Never (3 points)
                    </label><br>
                </div>
                <h2>Other Habits</h2>

                <p>Question 1: How much do you spend on clothing and fashion items per month?</p>

                <div class="question-group">
                    <input type="radio" id="option48" name="clothing_spend" value="0">
                    <label for="option48">Minimal spending (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option49" name="clothing_spend" value="1">
                    <label for="option49">Moderate spending (1 point)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option50" name="clothing_spend" value="2">
                    <label for="option50">High spending (2 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option51" name="clothing_spend" value="3">
                    <label for="option51">Excessive spending (3 points)</label><br>
                </div>



                <p>Question 2: How often do you upgrade or purchase new electronic appliances?</p>

                <div class="question-group">
                    <input type="radio" id="option52" name="appliance_upgrade" value="0">
                    <label for="option52">Rarely or never (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option53" name="appliance_upgrade" value="1">
                    <label for="option53">Occasionally (1 point)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option54" name="appliance_upgrade" value="2">
                    <label for="option54">Frequently (2 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option55" name="appliance_upgrade" value="3">
                    <label for="option55">Very frequently (3 points)</label><br>
                </div>



                <p>Question 3: Do you participate in activities to reduce waste, such as recycling or
                    composting?</p>

                <div class="question-group">
                    <input type="radio" id="option56" name="waste_reduction" value="0">
                    <label for="option56">Yes, regularly (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option57" name="waste_reduction" value="1">
                    <label for="option57">Sometimes (1 point)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option58" name="waste_reduction" value="2">
                    <label for="option58">Rarely (2 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option59" name="waste_reduction" value="3">
                    <label for="option59">Never (3 points)</label><br>
                </div>



                <p>Question 4: How often do you use single-use plastics (e.g., plastic bags, bottles,
                    utensils)?</p>

                <div class="question-group">
                    <input type="radio" id="option60" name="single_use_plastic" value="0">
                    <label for="option60">Rarely or never (0 points)</label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option61" name="single_use_plastic" value="1">
                    <label for="option61">Occasionally (1 point)
                    </label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option62" name="single_use_plastic" value="2">
                    <label for="option62">Frequently (2 points)
                    </label><br>
                </div>
                <div class="question-group">
                    <input type="radio" id="option64" name="single_use_plastic" value="3">
                    <label for="option51">Always (3 points)
                    </label><br>
                </div>


            </form>
        <button onclick="calculateScore()">Submit</button>
        <div onclick="REVIEW" id="result"></div>
        <br>
        <div class="wrapper">
        <div id="colorindicate"></div><br>
        <div id="review-container"><br>
            <div id="review" class=""></div>

        </div>
    </div>
        <br>
   

    </div>

    <script>
        function calculateScore() {
            var score = 0;

            score += parseInt(document.querySelector('input[name="food_type"]:checked').value);
            score += parseInt(document.querySelector('input[name="food_type1"]:checked').value);
            score += parseInt(document.querySelector('input[name="food_waste"]:checked').value);
            score += parseInt(document.querySelector('input[name="processed_food"]:checked').value);
            score += parseInt(document.querySelector('input[name="household_size"]:checked').value);
            score += parseInt(document.querySelector('input[name="electricity_usage"]:checked').value);
            score += parseInt(document.querySelector('input[name="switch_off"]:checked').value);
            score += parseInt(document.querySelector('input[name="energy_saving"]:checked').value);
            score += parseInt(document.querySelector('input[name="clothing_spend"]:checked').value);
            score += parseInt(document.querySelector('input[name="appliance_upgrade"]:checked').value);
            score += parseInt(document.querySelector('input[name="waste_reduction"]:checked').value);
            score += parseInt(document.querySelector('input[name="single_use_plastic"]:checked').value);
            score += parseInt(document.querySelector('input[name="travel_mode"]:checked').value);
            score += parseInt(document.querySelector('input[name="travel_time"]:checked').value);
            score += parseInt(document.querySelector('input[name="flights"]:checked').value);
            score += parseInt(document.querySelector('input[name="eco_travel"]:checked').value);


            // Display the score
            document.getElementById("result").innerHTML = "Your total score is: " + score;
        }
    </script>
</body>

</html>