<?php

$questions = [
    "I feel dirty or contaminated.",
    "I feel the need to check things over and over.",
    "I have thoughts that are unpleasant to me.",
    "I feel compelled to do things a certain way to prevent harm to myself or others.",
    "I avoid things that make me anxious.",
    "I feel uneasy if objects are not in a particular order or position.",
    "I feel anxious when things are not symmetrical or exact.",
    "I feel the need to repeat certain acts or actions until they are just right.",
    "I have fears about contamination (e.g., dirt, germs, viruses).",
    "I have unwanted thoughts that are sexual or violent.",
    "I feel anxious or uncomfortable when I am uncertain about something.",
    "I have thoughts that are forbidden or not acceptable to me.",
    "I feel a need to put things in order or arrange things until they are perfect.",
    "I feel a need to count things or perform tasks in a certain order until it feels right.",
    "I feel the need to wash or clean myself repeatedly (e.g., hands, body).",
    "I feel a need to ask for reassurance about my thoughts or actions.",
    "I feel a need to hoard things (e.g., newspapers, food, mail).",
    "I feel the need to repeat certain words silently until they are just right."
];

$answer = ["Not at all", "A little", "Moderately", "A lot", "Extremely"];

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
            font-size: 1.2rem;
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

        .error {
            color: red;
            font-size: 0.9rem;
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="others/ocdTestProcess.php" method="post" id="quizForm">

        <?php for ($i = 1; $i <= count($questions); $i++): ?>
            <div class="question <?php echo $i === 1 ? 'active' : ''; ?>" id="question<?php echo $i; ?>">
                <p><?php echo $i; ?>. <?php echo $questions[$i - 1]; ?></p>
                <div class="options">
                    <?php foreach ($answer as $key => $value): ?>
                        <label>
                            <input type="radio" name="q<?php echo $i; ?>" value="<?php echo $key; ?>" required> <?php echo $value; ?>
                        </label><br><br>
                    <?php endforeach; ?>
                </div>
                <div class="error" id="error<?php echo $i; ?>">Please select an answer!</div>
            </div>
        <?php endfor; ?>

        <div class="btn-container">
            <button type="button" id="prevBtn" onclick="changeQuestion(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="changeQuestion(1)">Next</button>
            <button type="submit" id="submitBtn" name="submit_data" class="submit-container">Submit</button>
        </div>
    </form>
</div>

<script>
    let currentQuestion = 1;
    const totalQuestions = <?php echo count($questions); ?>;

    function changeQuestion(n) {
        const current = document.getElementById(`question${currentQuestion}`);
        const radios = document.getElementsByName(`q${currentQuestion}`);
        let answered = false;

        // Check if the current question is answered
        for (let i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                answered = true;
                break;
            }
        }

        if (!answered) {
            document.getElementById(`error${currentQuestion}`).style.display = 'block';
            return; // Prevent moving to next question if not answered
        } else {
            document.getElementById(`error${currentQuestion}`).style.display = 'none'; // Hide error if answered
        }

        // Move to the next or previous question
        current.classList.remove('active');
        currentQuestion += n;
        const next = document.getElementById(`question${currentQuestion}`);
        next.classList.add('active');

        // Control button visibility
        document.getElementById('prevBtn').style.display = currentQuestion === 1 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = currentQuestion === totalQuestions ? 'none' : 'inline-block';
        document.getElementById('submitBtn').style.display = currentQuestion === totalQuestions ? 'inline-block' : 'none';
    }

    document.getElementById('prevBtn').style.display = 'none';
</script>

</body>
</html>
