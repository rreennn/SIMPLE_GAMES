const game = ()=>{
    let playerScore = 0;
    let compScore = 0;
    let moves = 0;
    let yourScore = 0;
    let totalScore = 0;

    const play = function() {
        const choice = document.querySelectorAll(".button");
        let playerDisplay = document.getElementById('player-score')
        let playerChoose = document.getElementById('player-choose')
        let compDisplay = document.getElementById('comp-score')
        let compChoose = document.getElementById('comp-choose')
        let gameResult = document.getElementById('result')
        let playerImg = document.getElementById('img-player')
        let compImg = document.getElementById('img-comp')
        let gameScore = gameResult.dataset.value;

        totalScore = totalScore + parseInt(gameScore)
        
        choice.forEach(button => button.addEventListener("click", ()=>{
            const computer = computerTurn();
            player = button.textContent;
            playerImg.setAttribute('src','hero/'+player+'.png')
            
            check(player, computer)
            shuffle()
            
            playerChoose.innerHTML = `You Choose: ${player}`
            setTimeout(()=>{
                let compImg = document.getElementById('img-comp')
                compImg.setAttribute('src','hero/'+computer+'.png')
                if(check(player, computer) == "You Win!") {
                    gameResult.style.color = "green"
                    playerScore++
                } else if(check(player, computer) == "You Lose") {
                    gameResult.style.color = 'maroon'
                    compScore++
                } else {
                    gameResult.style.color = 'orange'
                }
                playerDisplay.innerHTML = `You: ${playerScore}`
                compDisplay.innerHTML = `Computer: ${compScore}`
                compChoose.innerHTML = `Computer Choose: ${computer}`   
                gameResult.innerHTML = check(player, computer);
            },1200)       
            
            moves++
            if(moves == 5) {
                gameOver(playerScore, compScore)
                if(gameOver(playerScore, compScore) == "Bonus round!") {
                    console.log(gameOver(playerScore, compScore))
                    gameResult.innerHTML = `Bonus round!`
                    gameResult.style.color = 'black'
                    moves = 4
                } else {
                    if(gameOver(playerScore, compScore) == "Congratulation, You've won this game!") {
                        yourScore = yourScore + 100
                        Swal.fire({
                            title: "Congratulations! You've won this round!",
                            text: "You got 100 points!",
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: "Play again!",
                            cancelButtonText: "Back to Home",
                        }).then((result)=> {
                            if (result.isConfirmed) {
                                playerDisplay.innerHTML = `You: ${yourScore}`
                                playerChoose.innerHTML = `You Choose: `
                                playerImg.setAttribute('src','hero/placeholderimg.jpg')
                                compImg.setAttribute('src','hero/placeholderimg.jpg')
                                compDisplay.innerHTML = `Computer: ${compScore}`
                                compChoose.innerHTML = `Computer Choose: `
                                gameResult.innerHTML = `Score : ${yourScore + totalScore}`
                                gameResult.style.color = 'black'
                                moves = 0
                                compScore = 0
                                playerScore = 0
                            } else if(result.isDismissed){
                                location.href = `../index.php?score=${yourScore + totalScore}`
                            }
                        })
                    } else {
                        yourScore -= 20
                        Swal.fire({
                            title: "Sorry, you've lost this round!",
                            text: "You got -20 points!",
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonText: "Play again!",
                            cancelButtonText: "Back to Home",
                        }).then((result)=> {
                            if (result.isConfirmed) {
                                console.log(result.isConfirmed)
                                playerDisplay.innerHTML = `You: ${yourScore}`
                                playerChoose.innerHTML = `You Choose: `
                                playerImg.setAttribute('src','hero/placeholderimg.jpg')
                                compImg.setAttribute('src','hero/placeholderimg.jpg')
                                compDisplay.innerHTML = `Computer: ${compScore}`
                                compChoose.innerHTML = `Computer Choose: `
                                gameResult.innerHTML = `Score : ${yourScore + totalScore}`
                                gameResult.style.color = 'black'
                                moves = 0
                                compScore = 0
                                playerScore = 0
                            } else if(result.isDismissed) {
                                location.href = `../index.php?score=${yourScore + totalScore}`
                            }
                        })
                    }
                }
            } 
        }))  
        
        function computerTurn() {
            const random = Math.floor(Math.random()*3) + 1;
            if(random == 1) {
                return "Scissors"
            } else if (random == 2) {
                return "Paper"
            } else {
                return "Rock"
            }
        }
        
        function check(player, computer) {
            if(player === computer) {
                return "Tie!"
            } else {
                if (player === "Rock") {
                    if (computer === "Scissors") {
                        return "You Win!"
                    } else {
                        return "You Lose"
                    }
                } else if (player === "Scissors") {
                    if (computer === "Paper") {
                        return "You Win!"
                    } else {
                        return "You Lose"
                    }
                } else if (player === "Paper") {
                    if (computer === "Rock") {
                        return "You Win!"
                    } else {
                        return "You Lose"
                    }
                }
            }
        }
        
        function gameOver(playerScore, compScore) {
            if(playerScore > compScore) {
                return "Congratulation, You've won this game!"
            } else if(playerScore < compScore) {
                return "Sorry, you've lost this game!"
            } else {
                return "Bonus round!"
            }
        }

        function shuffle() {
            const start = new Date().getTime()
            let compImg = document.getElementById('img-comp')
            const image = ["Paper", "Rock", "Scissors"]
            let i = 0
            setInterval(()=>{
                if(new Date().getTime() - start > 1000) {
                    clearInterval()
                    return
                }
                compImg.setAttribute("src", "hero/"+image[i++]+".png")
                if(i == image.length) {
                    i = 0
                }
            },100)
        }
    }
    play()
}

const close = document.querySelector('.button-50[type="button"]')
const popUp = document.querySelector('.pop-up')
close.addEventListener('click', () => {
    popUp.style.display = "none"
})
game()
