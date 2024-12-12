<?php 

require "mbtitype.php";
include "../subHeader.php";

if (isset($_POST["submit_data"])) {
    $dataArray = array();
    $maxArray = array();

    for ($i = 1; $i <= 50; $i++) {
        $questionKey = 'q' . $i;
        $dataArray[] = $_POST[$questionKey];
    }

    $E_tot = 0;
    $I_tot = 0;
    $S_tot = 0;
    $N_tot = 0;
    $T_tot = 0;
    $F_tot = 0;
    $J_tot = 0;
    $P_tot = 0;

    foreach ($dataArray as $data) {
        $items = explode(",", $data);

        switch ($items[0]) {
            case "E":
                $E_tot += intval($items[1]);
                break;
            case "I":
                $I_tot += intval($items[1]);
                break;
            case "S":
                $S_tot += intval($items[1]);
                break;
            case "N":
                $N_tot += intval($items[1]);
                break;
            case "T":
                $T_tot += intval($items[1]);
                break;
            case "F":
                $F_tot += intval($items[1]);
                break;
            case "J":
                $J_tot += intval($items[1]);
                break;
            case "P":
                $P_tot += intval($items[1]);
                break;
        }
    }

    $maxArray[0] = ($E_tot > $I_tot) ? "E" : "I";
    $maxArray[1] = ($S_tot > $N_tot) ? "S" : "N";
    $maxArray[2] = ($T_tot > $F_tot) ? "T" : "F";
    $maxArray[3] = ($J_tot > $P_tot) ? "J" : "P";

    $maxString = implode("", $maxArray);

    echo $maxString;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MBTI Result</title>
    <style>
        .container {
            margin: 75px 20px 20px 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .info {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }

        .info ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .info ul li {
            font-size: 1.6rem;
            color: #333;
            margin: 0;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="info">
            <ul id="typing-text"></ul>
        </div>
    </div>

    <script>
        const textToType = <?php echo json_encode(mbtiTypeSelect($maxString)); ?>;
        const typingText = document.getElementById('typing-text');

        function startTyping() {
            typingText.innerHTML = ''; // Clear previous text
            const sentences = textToType.split('.'); // Split text into sentences

            let sentenceIndex = 0;
            let charIndex = 0;

            function typeSentence() {
                if (sentenceIndex < sentences.length) {
                    const sentence = sentences[sentenceIndex];
                    const li = document.createElement('li');
                    li.textContent = '';
                    typingText.appendChild(li);

                    const typingInterval = setInterval(() => {
                        li.textContent += sentence[charIndex];
                        charIndex++;
                        if (charIndex >= sentence.length) {
                            clearInterval(typingInterval);
                            charIndex = 0;
                            sentenceIndex++;
                            if (sentenceIndex < sentences.length) {
                                typeSentence();
                            }
                        }
                    }, 5); // Adjust typing speed as needed
                }
            }

            typeSentence();
        }

        document.addEventListener('DOMContentLoaded', startTyping);
    </script>
</body>
</html>
