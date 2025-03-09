<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            .start-button {
                display: block;
            }
            .game {
                background-color: pink;
                display: none;
                display: flex;
            }

            .card {
                border: 2px solid black;
                padding: 5px;
                margin: 10px;
                background-color: white;
                color: white;
            }

            .card.revealed {
                color: black;
            }
        </style>
    </head>
    <body>
        <div id="main">
           <button class="start-button" id="start-button" onclick="startGame()">Start the game</button>
           <div class="game" id="gameContainer"></div>
        </div>
    </body>
    <script>
        let cardValues = ['1','2','3','1','2','3'] ;
        let shuffledCards = [];
        let flippedCards = [];
        let attempts = 0;
        let matchedPairs = 0;
        let totalPairs = 3;

        function startGame(){
            let startButton = document.getElementById("start-button")
            startButton.style.display = "none";
            let gameContainer = document.getElementById("gameContainer");
            gameContainer.style.display = "flex";
            const shuffledCards = shuffleCards(cardValues);
            shuffledCards.forEach(value => {
                let cardDiv = document.createElement("div");
                cardDiv.classList.add("card");
                cardDiv.onclick = function() {turnCard(this);};
                cardDiv.innerHTML = value;
                gameContainer.appendChild(cardDiv);               
            });
        }

        function shuffleCards(array){
            for (let i = array.length - 1; i > 0; i--) { 
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function turnCard(card) {
            card.classList.add("revealed");

            if (flippedCards.length === 0){
                flippedCards.push(card);
            } else {
                const prevCard = flippedCards.pop();
                attempts++;

                if (card.textContent === prevCard.textContent) {
                    matchedPairs++;
                    if (matchedPairs === totalPairs) {
                        gameOver();
                        return;
                    }
                }
                else {
                    setTimeout(() => {
                        card.classList.remove("revealed");
                        prevCard.classList.remove("revealed");
                    }, 1000);
                }
            }
        }

        function gameOver(){
            alert('Game Over! You completed the game with ' + attempts + ' attempts.');
        }
    </script>
</html>