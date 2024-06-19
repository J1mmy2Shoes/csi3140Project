const cells = document.querySelectorAll('.cell');
const newButton = document.getElementById('newGame');
const xScoreVal = document.getElementById('xscore');
const oScoreVal = document.getElementById('oscore');

let Board = ['', '', '', '', '', '', '', '', ''];
let currentPlayer = 'X';
let xScore = 0;
let oScore = 0;
let gameActive = true;

const winBoard = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

function clickCell(e) {
    const cell = e.target;
    const index = cell.getAttribute('data-index');

    if (Board[index] !== '' || !gameActive) {
        return;
    }

    Board[index] = currentPlayer;
    cell.textContent = currentPlayer;

    if (checkWinner()) {
        alert(`Player ${currentPlayer} wins`);
        updateScore(currentPlayer);
        gameActive = false;
        return;
    }

    if (!Board.includes('')) {
        alert('Game is a draw!');
        gameActive = false;
        return;
    }

    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
}

function checkWinner() {
    for (let i = 0; i < winBoard.length; i++) {
        const [a, b, c] = winBoard[i];
        if (Board[a] && Board[a] === Board[b] && Board[a] === Board[c]) {
            return true;
        }
    }
    return false;
}

function updateScore(player) {
    if (player === 'X') {
        xScore++;
        xScoreVal.textContent = xScore;
    } else {
        oScore++;
        oScoreVal.textContent = oScore;
    }
}

function newGame() {
    Board = ['', '', '', '', '', '', '', '', ''];
    currentPlayer = 'X';
    gameActive = true;
    cells.forEach(cell => cell.textContent = '');
}

cells.forEach(cell => cell.addEventListener('click', clickCell));
newButton.addEventListener('click', newGame);
