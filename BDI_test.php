<?php

include "subHeader.php";


$questions = [
    "Sadness",
    "Pessimism",
    "Past Failure",
    "Loss of Pleasure",
    "Guilty Feelings",
    "Punishment Feelings",
    "Self-Dislike",
    "Self-Criticalness",
    "Suicidal Thoughts or Wishes",
    "Crying",
    "Agitation",
    "Loss of Interest",
    "Indecisiveness",
    "Worthlessness",
    "Loss of Energy",
    "Changes in Sleeping Pattern",
    "Irritability",
    "Changes in Appetite",
    "Concentration Difficulty",
    "Tiredness or Fatigue",
    "Loss of Interest in Sex"
];

$options = [
    [
        "I do not feel sad.",
        "I feel sad much of the time.",
        "I am sad all the time.",
        "I am so sad or unhappy that I can't stand it."
    ],
    [
        "I am not discouraged about my future.",
        "I feel more discouraged about my future than I used to.",
        "I do not expect things to work out for me.",
        "I feel my future is hopeless and will only get worse."
    ],
    [
        "I do not feel like a failure.",
        "I have failed more than I should have.",
        "As I look back, I see a lot of failures.",
        "I feel I am a total failure as a person."
    ],
    [
        "I get as much pleasure as I ever did from the things I enjoy.",
        "I don't enjoy things as much as I used to.",
        "I get very little pleasure from the things I used to enjoy.",
        "I can't get any pleasure from the things I used to enjoy."
    ],
    [
        "I don't feel particularly guilty.",
        "I feel guilty over many things I have done or should have done.",
        "I feel quite guilty most of the time.",
        "I feel guilty all of the time."
    ],
    [
        "I don't feel I am being punished.",
        "I feel I may be punished.",
        "I expect to be punished.",
        "I feel I am being punished."
    ],
    [
        "I feel the same about myself as ever.",
        "I have lost confidence in myself.",
        "I am disappointed in myself.",
        "I dislike myself."
    ],
    [
        "I don't criticize or blame myself more than usual.",
        "I am more critical of myself than I used to be.",
        "I criticize myself for all of my faults.",
        "I blame myself for everything bad that happens."
    ],
    [
        "I don't have any thoughts of killing myself.",
        "I have thoughts of killing myself, but I would not carry them out.",
        "I would like to kill myself.",
        "I would kill myself if I had the chance."
    ],
    [
        "I don't cry any more than usual.",
        "I cry more now than I used to.",
        "I cry all the time now.",
        "I used to be able to cry, but now I can't cry even though I want to."
    ],
    [
        "I am no more restless or wound up than usual.",
        "I feel more restless or wound up than usual.",
        "I am so restless or agitated that it's hard to stay still.",
        "I am so restless or agitated that I have to keep moving or doing something."
    ],
    [
        "I have not lost interest in other people or activities.",
        "I am less interested in other people or things than before.",
        "I have lost most of my interest in other people or things.",
        "It's hard to get interested in anything."
    ],
    [
        "I make decisions about as well as ever.",
        "I find it more difficult to make decisions than usual.",
        "I have much greater difficulty in making decisions than I used to.",
        "I have trouble making any decisions."
    ],
    [
        "I do not feel worthless.",
        "I don't consider myself as worthwhile and useful as I used to.",
        "I feel more worthless as compared to others.",
        "I feel utterly worthless."
    ],
    [
        "I have as much energy as ever.",
        "I have less energy than I used to have.",
        "I don't have enough energy to do very much.",
        "I don't have enough energy to do anything."
    ],
    [
        "I have not experienced any change in my sleeping pattern.",
        "I sleep somewhat more than usual.",
        "I sleep somewhat less than usual.",
        "I sleep a lot more than usual.",
        "I sleep a lot less than usual."
    ],
    [
        "I am no more irritable than usual.",
        "I am more irritable than usual.",
        "I am much more irritable than usual.",
        "I am irritable all the time."
    ],
    [
        "I have not experienced any change in my appetite.",
        "My appetite is somewhat less than usual.",
        "My appetite is somewhat greater than usual.",
        "I have no appetite at all.",
        "I crave food all the time."
    ],
    [
        "I can concentrate as well as ever.",
        "I can't concentrate as well as usual.",
        "It's hard to keep my mind on anything for very long.",
        "I find I can't concentrate on anything."
    ],
    [
        "I am no more tired or fatigued than usual.",
        "I get tired or fatigued more easily than usual.",
        "I am too tired or fatigued to do a lot of the things I used to do.",
        "I am too tired or fatigued to do most of the things I used to do."
    ],
    [
        "I have not noticed any recent change in my interest in sex.",
        "I am less interested in sex than I used to be.",
        "I have lost most of my interest in sex.",
        "I have lost all of my interest in sex."
    ]
];
?>


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
        font-size: 1.5rem;
        margin: 25px;
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
    .submit-container {
        display: none;
    }
</style>








</head>
<body>
<div class="container">
<form action="others/process_BDI.php" method="post">

    <?php for ($i = 1; $i <= 21; $i++): ?>
        <div class="question <?php echo $i === 1 ? 'active' : ''; ?>" id="question<?php echo $i; ?>">
            <p><?php echo $i; ?>. <?php echo $questions[$i - 1]; ?></p>
            <div class="options">
                <?php foreach ($options[$i - 1] as $value => $option): ?>
                    <label>
                        <input type="radio" name="q<?php echo $i; ?>" value="<?php echo $value; ?>" required> <?php echo $option; ?>
                    </label><br><br>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endfor; ?>

    <div class="btn-container">
        <button type="button" id="prevBtn" onclick="changeQuestion(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="changeQuestion(1)">Next</button>
        <button type="submit" id="submitBtn" name="submit_data" class="submit-container">Submit</button>
    </div>
</form>
</div>

<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>

<script>
    let currentQuestion = 1;
    const totalQuestions = 21;

    function changeQuestion(n) {
        const current = document.getElementById(`question${currentQuestion}`);
        current.classList.remove('active');
        currentQuestion += n;
        const next = document.getElementById(`question${currentQuestion}`);
        next.classList.add('active');
        document.getElementById('prevBtn').style.display = currentQuestion === 1 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = currentQuestion === totalQuestions ? 'none' : 'inline-block';
        document.getElementById('submitBtn').style.display = currentQuestion === totalQuestions ? 'inline-block' : 'none';
    }

    document.getElementById('prevBtn').style.display = 'none';
</script>

</body>
</html>
