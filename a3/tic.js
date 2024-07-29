const cells = document.querySelectorAll('.cell');
const newButton = document.getElementById('newGame');
const xScoreVal = document.getElementById('xscore');
const oScoreVal = document.getElementById('oscore');
const messageDiv = document.getElementById('message');

let currentPlayer = 'X';
let gameActive = true;

function displayMessage(message) {
    messageDiv.textContent = message;
}

function fetchGameState() {
    fetch('game.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=getState'
    })
    .then(response => response.json())
    .then(data => {
        data.board.forEach((value, index) => {
            cells[index].textContent = value;
        });
        currentPlayer = data.currentPlayer;
        xScoreVal.textContent = data.xScore;
        oScoreVal.textContent = data.oScore;
        gameActive = data.gameActive;
        if (!gameActive) {
            displayMessage('Game Over');
        } else {
            displayMessage(`It's ${currentPlayer}'s turn`);
        }
    });
}

function makeMove(index) {
    fetch('game.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=move&index=${index}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            displayMessage(data.error);
        } else if (data.winner) {
            displayMessage(`Player ${data.winner} wins`);
        } else if (data.draw) {
            displayMessage('Game is a draw!');
        } else {
            fetchGameState();
        }
    });
}

function startNewGame() {
    fetch('game.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=newGame'
    })
    .then(response => response.json())
    .then(() => {
        fetchGameState();
    });
}

cells.forEach(cell => cell.addEventListener('click', (e) => {
    const index = e.target.getAttribute('data-index');
    if (gameActive && !e.target.textContent) {
        makeMove(index);
    }
}));

newButton.addEventListener('click', startNewGame);

fetchGameState();
