         var randomNumber = Math.floor(Math.random()*99) +1;    
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
        
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            var gamesWon = document.querySelector('#won');
            var wins = 0;
            var loss = 0;
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            resetButton.style.display = 'none';
            guessField.focus();
            
            
            
            function checkGuess(){
                var userGuess = Number(guessField.value);
                if(guessCount ===1){
                    guesses.innerHTML = 'Previous guesses: ';
                }
                gamesWon.innerHTML = 'Wins: ' + wins + ' Losses: ' + loss;
                if(userGuess > 0 && userGuess < 100)
                    guesses.innerHTML += userGuess + ' ';
                    
                    if(userGuess === randomNumber){
                        lastResult.innerHTML = 'Congratulations! You got it right!';
                        lastResult.style.backgroundColor = 'green';
                        wins++;
                        lowOrHi.innerHTML = '';
                        setGameOver();
                    } else if(guessCount === 7){
                        lastResult.innerHTML = 'Sorry, you lost';
                        loss++;
                        setGameOver();
                    }else{
                        
                        lastResult.innerHTML = 'Wrong!';
                        lastResult.style.backgroundColor = 'red';
                        if(userGuess < randomNumber){
                            lowOrHi.innerHTML= 'Last guess was too low!';
                        }else if(userGuess > randomNumber){
                            lowOrHi.innerHTML = 'Last guess was too high!';   
                        }
                        else{
                            lowOrHi.innerHTML = 'It says between 1-99 only!';
                            guessCount--;
                        }
                        
                    }
                    guessCount++;
                    guessField.value = '';
                    guessField.focus();
                    
            }
            
            guessSubmit.addEventListener("click", checkGuess);
            
            function setGameOver(){
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            
            function resetGame(){
                guessCount = 1;
                
                var resetParas = document.querySelectorAll('.resultParas p');
                for(var i = 0; i < resetParas.length; i++){
                    resetParas[i].textContent = '';
                }
                
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor((Math.random()*99) +1);
            }