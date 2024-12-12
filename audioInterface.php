<?php
include "subHeader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaxing Music for Mental Health</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
            font-size: 140%;
        }

        .container {
            max-width: 800px;
            margin: 80px auto;
            text-align: center;
        }

        header {
            margin-bottom: 20px;
        }

        .music-list {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .music-list li {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .music-list li a {
            text-decoration: none;
            flex: 1;
        }

        .music-list li .duration {
            margin-left: 10px;
            color: white;
        }

        .icone {
            margin-right: 10px;
            color: white;
            cursor: pointer;
        }

        .link {
            color: white;
        }

        .music-list a:hover {
            text-decoration: underline;
        }

        .player {
            margin-top: 20px;
        }

        .carousel-item img {
            max-width: 100%;
            max-height: 300px; 
            object-fit: contain; 
            margin: 0 auto;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1 style="color: white;">Relaxing Music for Mental Health</h1>
        </header>

        <video class="video-background" autoplay muted loop>
            <source src="video/bgVideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/audioImg/a1.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/audioImg/a2.jpg" alt="Second slide">
                </div>
                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="music-list">
            <ul>
                <li>
                    <span class="icone" data-src="Audio/ocean-waves.mp3" aria-label="ocean-waves"><i class='far fa-play-circle' style='font-size:24px'></i></span>  
                    <a class="link" href="#">ocean-waves</a>
                    <span class="duration">4:05</span>
                </li>
                <li>
                    <span class="icone" data-src="Audio/ambient-piano-and-strings.mp3" aria-label="ambient-piano-and-strings"><i class='far fa-play-circle' style='font-size:24px'></i></span> 
                    <a class="link" href="#">Ambient-piano-and-strings</a>
                    <span class="duration">4:05</span>
                </li>
                <li>
                    <span class="icone" data-src="Audio/calm.mp3" aria-label="calm"><i class='far fa-play-circle' style='font-size:24px'></i></span> 
                    <a class="link" href="#">calm</a>
                    <span class="duration">4:05</span>
                </li>
                <li>
                    <span class="icone" data-src="Audio/atmosfera-hostil-lofi.mp3" aria-label="Play Peaceful Piano"><i class='far fa-play-circle' style='font-size:24px'></i></span> 
                    <a class="link" href="#">Peaceful Piano</a>
                    <span class="duration">4:05</span>
                </li>
            </ul>
        </div>

        <div class="player">
            <audio id="audioPlayer" controls>
                <source id="audioSource" src="" type="audio/mp3">
                Your browser does not support the audio element.
            </audio>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const audioPlayer = document.getElementById('audioPlayer');
            const audioSource = document.getElementById('audioSource');

            // Add click event listener to the music icons
            document.querySelectorAll('.music-list .icone').forEach(icon => {
                icon.addEventListener('click', function () {
                    const src = this.getAttribute('data-src');
                    if (audioPlayer.src !== src) { // Check if the selected audio is different
                        audioSource.setAttribute('src', src);
                        audioPlayer.load();
                    }
                    if (audioPlayer.paused) {
                        audioPlayer.play();
                    } else {
                        audioPlayer.pause();
                    }
                });
            });

            // Error handling for audio source
            audioPlayer.addEventListener('error', function () {
                alert("There was an error playing the audio. Please try again later.");
            });

            // Prevent default anchor behavior for links
            document.querySelectorAll('.music-list .link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent default anchor behavior
                });
            });
        });
    </script>
</body>
</html>
