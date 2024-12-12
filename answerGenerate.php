<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Typing Effect</title>

<style>
  .typing-text {
    font-family: 'Courier New', monospace;
    font-size: 20px;
    white-space: nowrap; /* Prevent text from wrapping */
    overflow: hidden; /* Hide overflow text */
    border-right: 2px solid #000; /* Cursor effect */
    display: inline-block; /* Ensure inline display for border-right */
  }
</style>
</head>

<body>
<div class="typing-text" id="typing-text"></div><br>
<button onclick="startTyping()">Start Typing</button>

<script>
const textToType = "This is the text that will be typed out.";
const typingText = document.getElementById('typing-text');

function startTyping() {
  typingText.textContent = ''; // Clear previous text
  let index = 0;
  const typingInterval = setInterval(() => {
    typingText.textContent += textToType[index];
    index++;
    if (index >= textToType.length) {
      clearInterval(typingInterval);
      typingText.style.borderRight = 'none'; // Remove cursor effect when typing completes
    }
  }, 30); // Adjust typing speed as needed
}
</script>
</body>
</html>
