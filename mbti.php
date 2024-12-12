<?php

include "subHeader.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {

        max-width: 600px;
        margin: 200px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .question {

       font-size:1.5rem;
        margin:25px;
        display: none;
    }

  
    .question p {
        margin-bottom: 12px;
        
    }


    .question.active {
        display: block;
         transition: transform 0.5s ease-in-out;
    }
    .options {
        margin-bottom: 10px;

    }
    .btn-container {
        display: flex;
        justify-content: space-between;
    }
    button {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<div class="container">


<form action="others/process_mbti.php" method="post">


    <div class="question active" id="question1">
        <p>Question 1: WHEN YOU GO SOMEWHERE FOR THE DAY, WOULD YOU RATHER</p>
        <div class="options">
            <label >
                <input type="radio" name="q1" value="J,2" required> PLAN WHAT YOU WILL DO AND WHEN
            </label><br><br>
            <label>
                <input type="radio" name="q1" value="P,2" required> JUST GO!!
            </label>
            
        </div>
    </div>

    <div class="question active" id="question2">
        <p>Question 2: IF YOU WERE A TEACHER, WOULD YOU RATHER TEACH</p>
        <div class="options">
            <label>
                <input type="radio" name="q2" value="S,2"> FACTS-BASED COURSES
            </label><br><br>
            <label>
                <input type="radio" name="q2" value="N,2"> COURSES INVOLVING OPINION OR THEORY?
            </label>
           
        </div>
    </div>


 <div class="question active" id="question3">
        <p>Question 3: ARE YOU USUALLY</p>
        <div class="options">
            <label>
                <input type="radio" name="q3" value="E,2"> A “GOOD MIXER” WITH GROUPS OF PEOPLE,
            </label><br><br>
            <label>
            <input type="radio" name="q3" value="I,2"> RATHER QUIET AND RESERVED?
            </label>
            
        </div>
    </div>

     <div class="question active" id="question4">
        <p>Question 4: DO YOU MORE OFTEN LET</p>
        <div class="options">
            <label>
                <input type="radio" name="q4" value="F,1"> YOUR HEART RULE YOUR HEAD
            </label><br><br>
            <label>
                <input type="radio" name="q4" value="T,2"> YOUR HEAD RULE YOUR HEART
            </label>
            
        </div>
    </div>

     <div class="question active" id="question5">
        <p>Question 5: IN DOING SOMETHING THAT MANY OTHER PEOPLE DO, WOULD YOU RATHER</p>
        <div class="options">
            <label>
                <input type="radio" name="q5" value="N,1"> INVENT A WAY OF YOUR OWN
            </label><br><br>
            <label>
                <input type="radio" name="q5" value="S,1"> DO IT IN THE ACCEPTED WAY
            </label>
            
        </div>
    </div>


    <div class="question active" id="question6">
        <p>Question 6: AMONG YOUR FRIENDS ARE YOU</p>
        <div class="options">
            <label>
                <input type="radio" name="q6" value="E,2"> FULL OF NEWS ABOUT EVERYBODY
            </label><br><br>
            <label>
                <input type="radio" name="q6" value="I,1"> ONE OF THE LAST TO HEAR WHAT IS GOING ON
            </label>
            
        </div>
    </div>


    <div class="question active" id="question7">
        <p>Question 7: DOES THE IDEA OF MAKING A LIST OF WHAT YOU SHOULD GET DONE OVER A WEEKEND</p>
        <div class="options">
            <label>
                <input type="radio" name="q7" value="J,1"> HELP YOU,
            </label><br><br>
            <label>
                <input type="radio" name="q7" value="P,1"> STRESS YOU
            </label><br><br>

            <label>
                <input type="radio" name="q7" value="P,1"> POSITIVELY DEPRESS YOU
            </label>
            
        </div>
    </div>


    <div class="question active" id="question8">
        <p>Question 8: WHEN YOU HAVE A SPECIAL JOB TO DO, DO YOU LIKE TO</p>
        <div class="options">
            <label>
                <input type="radio" name="q8" value="J,1"> ORGANIZE IT CAREFULLY BEFORE YOU START, 
            </label><br><br>
            <label>
                <input type="radio" name="q8" value="P,2"> FIND OUT WHAT IS NECESSARY AS YOU GO ALONG
            </label>
            
        </div>
    </div>

    <div class="question active" id="question9">
        <p>Question 9: DO YOU TEND TO HAVE</p>
        <div class="options">
            <label>
                <input type="radio" name="q9" value="E,2"> BROAD FRIENDSHIPS WITH MANY DIFFERENT PEOPLE
            </label><br><br>
            <label>
                <input type="radio" name="q9" value="I,1"> DEEP FRIENDSHIP WITH VERY FEW PEOPLE
            </label>
            
        </div>
    </div>

    <div class="question active" id="question10">
        <p>Question 10: DO YOU ADMIRE MORE THE PEOPLE WHO ARE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q10" value="S,1"> NORMAL-ACTING TO NEVER MAKE THEMSELVES THE CENTER OF ATTENTION,
            </label><br><br>
            <label>
                <input type="radio" name="q10" value="N,2"> TOO ORIGINAL AND INDIVIDUAL TO CARE WHETHER THEY ARE THE CENTER OF ATTENTION OR NOT
            </label>
            
        </div>
    </div>


    <div class="question active" id="question11">
        <p>Question 11: DO YOU PREFER TO?</p>
        <div class="options">
            <label>
                <input type="radio" name="q11" value="J,2"> ARRANGE PICNICS, PARTIES ETC, WELL IN ADVANCE,
            </label><br><br>
            <label>
                <input type="radio" name="q11" value="P,1"> BE FREE TO DO WHATEVER TO LOOKS LIKE FUN WHEN THE TIME COMES
            </label>
            
        </div>
    </div>

    <div class="question active" id="question12">
        <p>Question 12: DO YOU USUALLY GET ALONG BETTER WITH?</p>
        <div class="options">
            <label>
                <input type="radio" name="q12" value="S,1"> REALISTIC PEOPLE
            </label><br><br>
            <label>
                <input type="radio" name="q12" value="N,2"> IMAGINATIVE PEOPLE
            </label>
            
        </div>
    </div>

    <div class="question active" id="question13">
        <p>Question 13: WHEN YOU ARE WITH THE GROUP OF PEOPLE, WOULD YOU USUALLY RATHER?</p>
        <div class="options">
            <label>
                <input type="radio" name="q13" value="E,1"> JOIN IN THE TALK OF THE GROUP
            </label><br><br>
            <label>
                <input type="radio" name="q13" value="I,2"> STAND BACK AND LISTEN FIRST
            </label>
            
        </div>
    </div>


    <div class="question active" id="question14">
        <p>Question 14: IS IT A HIGHER COMPLIMENT TO BE CALLED ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q14" value="F,1"> A PERSON OF REAL FEELING
            </label><br><br>
            <label>
                <input type="radio" name="q14" value="T,2"> A CONSISTENTLY REASONABLE PERSON
            </label>
            
        </div>
    </div>


    <div class="question active" id="question15">
        <p>Question 15: IN READING FOR PLEASURE, DO YOU?</p>
        <div class="options">
            <label>
                <input type="radio" name="q15" value="N,0"> ENJOY ODD OR ORIGINAL WAYS OF SAYING THINGS
            </label><br><br>
            <label>
                <input type="radio" name="q15" value="S,1"> LIKE WRITERS TO SAY EXACTLY WHAT THEY MEAN
            </label>
            
        </div>
    </div>


    <div class="question active" id="question16">
        <p>Question 16:DO YOU ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q16" value="E,2"> TALK EASILY TO ALMOST ANYONE FOR AS LONG AS YOU HAVE TO,
            </label><br><br>
            <label>
                <input type="radio" name="q16" value="I,2"> FIND A LOT TO SAY ONLY TO CERTAIN PEOPLE OR UNDER CERTAIN CONDITIONS
            </label>
            
        </div>
    </div>


    <div class="question active" id="question17">
        <p>Question 17: DOES FOLLOWING A SCHEDULE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q17" value="J,2"> APPEAL TO YOU
            </label><br><br>
            <label>
                <input type="radio" name="q17" value="P,2"> CRAMP YOU
            </label>
            
        </div>
    </div>


    <div class="question active" id="question18">
        <p>Question 18: WHEN IT IS SETTLED WELL IN ADVANCE THAT YOU WILL DO A CERTAIN THING AT A CERTAIN TIME,DO YOU FIND IT ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q18" value="J,1"> NICE TO BE ABLE TO PLAN ACCORDINGLY
            </label><br><br>
            <label>
                <input type="radio" name="q18" value="P,1"> A LITTLE UNPLEASANT TO BE TIED DOWN
            </label>
            
        </div>
    </div>

    <div class="question active" id="question19">
        <p>Question 19: ARE YOU MORE SUCCESSFUL ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q19" value="J,1"> AT FOLLOWING A CAREFULLY WORKED OUT PLAN
            </label><br><br>
            <label>
                <input type="radio" name="q19" value="P,1"> AT DEALING WITH THE UNEXPECTED AND SEEING QUICKLY WHAT SHOULD BE DONE
            </label>
            
        </div>
    </div>

    <div class="question active" id="question20">
        <p>Question 20: WOULD YOU RATHER BE CONSIDERED ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q20" value="S,2"> A PRACTICAL PERSON
            </label><br><br>
            <label>
                <input type="radio" name="q20" value="N,2"> AN OUT-OF-THE-BOX-THINKING PERSON
            </label>
            
        </div>
    </div>


    <div class="question active" id="question21">
        <p>Question 21: IN A LARGE GROUP, DO YOU MORE OFTEN ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q21" value="E,2"> INTRODUCE OTHERS
            </label><br><br>
            <label>
                <input type="radio" name="q21" value="I,2"> GET INTRODUCED
            </label>
            
        </div>
    </div>


    <div class="question active" id="question22">
        <p>Question 22: DO YOU USUALLY ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q22" value="F,2"> VALUE EMOTION MORE THAN LOGIC
            </label><br><br>
            <label>
                <input type="radio" name="q22" value="T,2"> VALUE LOGIC MORE THAN FEELINGS
            </label>
            
        </div>
    </div>



    <div class="question active" id="question23">
        <p>Question 23:WOULD YOU RATHER HAVE AS A FRIEND ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q23" value="N,1"> SOMEONE WHO IS ALWAYS COMING UP WITH NEW IDEAS,
            </label><br><br>
            <label>
                <input type="radio" name="q23" value="S,2"> SOMEONE WHO HAS BOTH FEET ON THE GROUND
            </label>
            
        </div>
    </div>



    <div class="question active" id="question24">
        <p>Question 24: CAN THE NEW PEOPLE YOU MEET TELL WHAT YOU ARE INTERESTED IN ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q24" value="E,1"> RIGHT AWAY
            </label><br><br>
            <label>
                <input type="radio" name="q24" value="I,1"> ONLY AFTER THEY REALLY GET TO KNOW YOU
            </label>
            
        </div>
    </div>


    <div class="question active" id="question25">
        <p>Question 25: ON THIS QUESTION ONLY, IF TWO ANSWERS ARE TRUE, CIRCLE BOTH) IN YOUR DAILY WORK, DO YOU?</p>
        <div class="options">
            <label>
                <input type="radio" name="q25" value="J,1"> USUALLY PLAN YOUR WORK SO YOU WON’T NEED TO WORK UNDER PRESSURE
            </label><br><br>
            <label>
                <input type="radio" name="q25" value="P,1"> RATHER ENJOY AN EMERGENCY THAT MAKES YOU WORK AGAINST TIME
            </label>
            <br><br>
             <label>
                <input type="radio" name="q25" value="J,0"> HATE TO WORK UNDER PRESSURE
            </label>
        </div>
    </div>



    <div class="question active" id="question26">
        <p>Question 26: DO YOU USUALLY ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q26" value="E,1"> SHOW YOUR FEELINGS FREELY
            </label><br><br>
            <label>
                <input type="radio" name="q26" value="I,0"> KEEP YOUR FEELINGS TO YOURSELF 
            </label>
            
        </div>
    </div>



    <div class="question active" id="question27">
        <p>Question 27: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q27" value="J,2"> SCHEDULED
            </label><br><br>
            <label>
                <input type="radio" name="q27" value="P,2"> UNPLANNED
            </label>
            
        </div>
    </div>



    <div class="question active" id="question28">
        <p>Question 28: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q28" value="S,2"> FACTS
            </label><br><br>
            <label>
                <input type="radio" name="q28" value="N,1"> IDEAS
            </label>
            
        </div>
    </div>



    <div class="question active" id="question29">
        <p>Question 29: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q29" value="I,2"> QUIET
            </label><br><br>
            <label>
                <input type="radio" name="q29" value="E,2"> HEARTY
            </label>
            
        </div>
    </div>



    <div class="question active" id="question30">
        <p>Question 30: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q30" value="T,2"> CONVINCING
            </label><br><br>
            <label>
                <input type="radio" name="q30" value="F,1"> TOUCHING
            </label>
            
        </div>
    </div>



    <div class="question active" id="question31">
        <p>Question 31: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q31" value="N,0"> IMAGINATIVE
            </label><br><br>
            <label>
                <input type="radio" name="q31" value="S,2"> MATTER-OF-FACT
            </label>
            
        </div>
    </div>



    <div class="question active" id="question32">
        <p>Question 32: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q32" value="T,1"> BENEFITS
            </label><br><br>
            <label>
                <input type="radio" name="q32" value="F,1"> BLESSINGS
            </label>
            
        </div>
    </div>



    <div class="question active" id="question33">
        <p>Question 33: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q33" value="F,0"> PEACEMAKER
            </label><br><br>
            <label>
                <input type="radio" name="q33" value="T,2"> JUDGE
            </label>
            
        </div>
    </div>



    <div class="question active" id="question34">
        <p>Question 34: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q34" value="J,2"> SYSTEMATIC
            </label><br><br>
            <label>
                <input type="radio" name="q34" value="P,2"> SPONTANEOUS
            </label>
            
        </div>
    </div>


    <div class="question active" id="question35">
        <p>Question 35:HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q35" value="S,2"> STATEMENT
            </label><br><br>
            <label>
                <input type="radio" name="q35" value="N,1"> CONCEPT
            </label>
            
        </div>
    </div>



    <div class="question active" id="question36">
        <p>Question 36: What is HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q36" value="I,1"> RESERVED
            </label><br><br>
            <label>
                <input type="radio" name="q36" value="E,2"> TALAKATIVE
            </label>
            
        </div>
    </div>



    <div class="question active" id="question37">
        <p>Question 37: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q37" value="T,1"> ANALYZE
            </label><br><br>
            <label>
                <input type="radio" name="q37" value="F,2"> SYMPATHIZE
            </label>
            
        </div>
    </div>



    <div class="question active" id="question38">
        <p>Question 38: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q38" value="N,0"> CREATE
            </label><br><br>
            <label>
                <input type="radio" name="q38" value="S,2"> MAKE
            </label>
            
        </div>
    </div>



    <div class="question active" id="question39">
        <p>Question 39: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q39" value="T,1"> DETERMINED
            </label><br><br>
            <label>
                <input type="radio" name="q39" value="F,1"> DEVOTED
            </label>
            
        </div>
    </div>


    <div class="question active" id="question40">
        <p>Question 40: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q40" value="F,1"> GENTLE
            </label><br><br>
            <label>
                <input type="radio" name="q40" value="T,2"> FIRM
            </label>
            
        </div>
    </div>



    <div class="question active" id="question41">
        <p>Question 41:HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q41" value="J,2"> SYSTEMATIC
            </label><br><br>
            <label>
                <input type="radio" name="q41" value="P,2"> CASUAL
            </label>
            
        </div>
    </div>


    <div class="question active" id="question42">
        <p>Question 42:HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q42" value="S,1"> CERTAINTY
            </label><br><br>
            <label>
                <input type="radio" name="q42" value="N,2"> THEORY
            </label>
            
        </div>
    </div>


    <div class="question active" id="question43">
        <p>Question 43:HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q43" value="I,1"> CALM
            </label><br><br>
            <label>
                <input type="radio" name="q43" value="E,1"> LIVELY
            </label>
            
        </div>
    </div>

    <div class="question active" id="question44">
        <p>Question 44: HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q44" value="T,1"> JUSTICE
            </label><br><br>
            <label>
                <input type="radio" name="q44" value="F,2"> MERCY
            </label>
            
        </div>
    </div>

    <div class="question active" id="question45">
        <p>Question 45:HOW APPEALS YOU MORE?</p>
        <div class="options">
            <label>
                <input type="radio" name="q45" value="N,0"> FASCINATING
            </label><br><br>
            <label>
                <input type="radio" name="q45" value="S,2"> SENSIBLE
            </label>
            
        </div>
    </div>

    <div class="question active" id="question46">
        <p>Question 46: HOW APPEALS YOU MORE ?</p>
        <div class="options">
            <label>
                <input type="radio" name="q46" value="T,2"> FIRM-MINDED
            </label><br><br>
            <label>
                <input type="radio" name="q46" value="F,0">  WARM HEARTED
            </label>
            
        </div>
    </div>

    <div class="question active" id="question47">
        <p>Question 47: What is the capital of France?</p>
        <div class="options">
            <label>
                <input type="radio" name="q47" value="F,1"> FEELING
            </label><br><br>
            <label>
                <input type="radio" name="q47" value="T,2"> THINKING
            </label>
            
        </div>
    </div>


    <div class="question active" id="question48">
        <p>Question 48: What is the capital of France?</p>
        <div class="options">
            <label>
                <input type="radio" name="q48" value="S,1"> LITERAL
            </label><br><br>
            <label>
                <input type="radio" name="q48" value="N,1"> FIGURATIVE
            </label>
            
        </div>
    </div>


    <div class="question active" id="question49">
        <p>Question 49: What is the capital of France?</p>
        <div class="options">
            <label>
                <input type="radio" name="q49" value="T,2"> ANTICIPATION
            </label><br><br>
            <label>
                <input type="radio" name="q49" value="F,1"> COMPASSION
            </label>
            
        </div>
    </div>


    <div class="question active" id="question50">
        <p>Question 50: What is the capital of France?</p>
        <div class="options">
            <label>
                <input type="radio" name="q50" value="T,2"> HARD
            </label><br><br>
            <label>
                <input type="radio" name="q50" value="F,0"> SOFT
            </label>
            
        </div>
    </div>


     <div class="question active btn btn-primary" id="question51">
        <p>Please Submit Your Answers</p>
        <br>

        <input type="submit" name="submit_data">
        
    </div>
</form>

    <div class="btn-container">
        <button onclick="previousQuestion()">Previous</button>
        <button onclick="nextQuestion()">Next</button>
    </div>
</div>

<script>
    let currentQuestion = 1;
    const totalQuestions = document.querySelectorAll('.question').length;

    function showQuestion(questionNumber) {
        document.querySelectorAll('.question').forEach((question) => {
            question.classList.remove('active');
        });
        document.getElementById(`question${questionNumber}`).classList.add('active');
    }

    function previousQuestion() {
        if (currentQuestion > 1) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    }

    function nextQuestion() {
        if (currentQuestion < totalQuestions) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    }

    // Show the initial question
    showQuestion(currentQuestion);
</script>
</body>
</html>
