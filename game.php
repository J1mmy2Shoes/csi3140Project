<?php
session_start();

if (!isset($_SESSION['gameState'])) {
    $_SESSION['gameState'] = [
        'board' => array_fill(0, 9, ''),
        'currentPlayer' => 'X',
        'xScore' => 0,
        'oScore' => 0,
        'gameActive' => true,
        'leaderboard' => []
    ];
}

function checkWinner($board) {
    $winPatterns = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
    ];
    foreach ($winPatterns as $pattern) {
        if ($board[$pattern[0]] && $board[$pattern[0]] === $board[$pattern[1]] && $board[$pattern[0]] === $board[$pattern[2]]) {
            return true;
        }
    }
    return false;
}

$action = $_POST['action'];

switch ($action) {
    case 'move':
        $index = $_POST['index'];
        if ($_SESSION['gameState']['board'][$index] !== '' || !$_SESSION['gameState']['gameActive']) {
            echo json_encode(['error' => 'Invalid move']);
            exit;
        }

        $_SESSION['gameState']['board'][$index] = $_SESSION['gameState']['currentPlayer'];

        if (checkWinner($_SESSION['gameState']['board'])) {
            $winner = $_SESSION['gameState']['currentPlayer'];
            $_SESSION['gameState'][$winner === 'X' ? 'xScore' : 'oScore']++;
            $_SESSION['gameState']['leaderboard'][] = [
                'player' => $winner,
                'score' => $_SESSION['gameState'][$winner === 'X' ? 'xScore' : 'oScore']
            ];
            usort($_SESSION['gameState']['leaderboard'], function($a, $b) {
                return $b['score'] - $a['score'];
            });
            $_SESSION['gameState']['leaderboard'] = array_slice($_SESSION['gameState']['leaderboard'], 0, 10);
            $_SESSION['gameState']['gameActive'] = false;
            echo json_encode(['winner' => $winner]);
            exit;
        }

        if (!in_array('', $_SESSION['gameState']['board'])) {
            $_SESSION['gameState']['gameActive'] = false;
            echo json_encode(['draw' => true]);
            exit;
        }

        $_SESSION['gameState']['currentPlayer'] = $_SESSION['gameState']['currentPlayer'] === 'X' ? 'O' : 'X';
        echo json_encode(['success' => true, 'currentPlayer' => $_SESSION['gameState']['currentPlayer']]);
        break;

    case 'newGame':
        $_SESSION['gameState'] = [
            'board' => array_fill(0, 9, ''),
            'currentPlayer' => 'X',
            'xScore' => $_SESSION['gameState']['xScore'],
            'oScore' => $_SESSION['gameState']['oScore'],
            'gameActive' => true,
            'leaderboard' => $_SESSION['gameState']['leaderboard']
        ];
        echo json_encode(['success' => true]);
        break;

    case 'getState':
        echo json_encode($_SESSION['gameState']);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}
?>
