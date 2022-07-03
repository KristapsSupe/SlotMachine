<?php

$card = [
    1 => 10,
    2 => 50,
    3 => 100,
];

$creditDeposit = 0;
$prize = 0;



foreach ($card as $amountKey => $amount) {
    echo "Press $amountKey insert $amount EUR | ";
}

echo PHP_EOL;

$board = [
    [" ", " ", " ", " ", " ",],
    [" ", " ", " ", " ", " ",],
    [" ", " ", " ", " ", " ",]
];


function drawBoard(array $board): void
{
    echo $board[0][0] . ' | ' . $board[0][1] . ' | ' . $board[0][2] . ' | ' . $board[0][3] . ' | ' . $board[0][4] . PHP_EOL;
    echo $board[1][0] . ' | ' . $board[1][1] . ' | ' . $board[1][2] . ' | ' . $board[1][3] . ' | ' . $board[1][4] . PHP_EOL;
    echo $board[2][0] . ' | ' . $board[2][1] . ' | ' . $board[2][2] . ' | ' . $board[2][3] . ' | ' . $board[2][4] . PHP_EOL;
}

$symbols = [
    1 => "A",
    2 => "B",
    3 => "C" ,
    4 => "D",
    5 => "X",
];

while (true) {

    $userInput = readline("Inserted deposit: " . $creditDeposit . PHP_EOL);
    echo "// 1-3: add funds // 4: Bet 5x // 5: Bet 10x // 6: Cash In" . PHP_EOL;

    if ($userInput < 0) {
        echo "Invalid input" . PHP_EOL;
        continue;
    }

    $setBet = 1;

    if ($userInput <= 3) {
        $creditDeposit  += $card[$userInput];
        continue;
    }
    if ($userInput > 6) {
        echo "Invalid input" . PHP_EOL;
        continue;
    }

    if ($creditDeposit <= 0) {
        echo "Insufficient funds" . PHP_EOL;
        continue;
    }

    $symbolsCount = count($symbols);
    $randomSymbol = array_rand($symbols, $symbolsCount);
    $maxRandom = $symbolsCount - 1;

    $board[0][0] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[0][1] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[0][2] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[0][3] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[0][4] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[1][0] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[1][1] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[1][2] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[1][3] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[1][4] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[2][0] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[2][1] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[2][2] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[2][3] = $symbols[$randomSymbol[rand(0,$maxRandom)]];
    $board[2][4] = $symbols[$randomSymbol[rand(0,$maxRandom)]];

    drawBoard($board);
    echo PHP_EOL;

    switch ($userInput) {
        case $userInput == 6:
            $creditDeposit += $prize;
            echo "Your prize: " . $creditDeposit . PHP_EOL;
            exit;
        case $userInput == 4:
            $setBet += 4;
            $creditDeposit -= $setBet;
            echo "SetBet is: " . $setBet. PHP_EOL;
            break;
        case $userInput == 5:
            $setBet += 9;
            $creditDeposit -= $setBet;
            echo "SetBet is: " . $setBet. PHP_EOL;
            break;
    }

    for ($i = 1 ; $i <= $symbolsCount -1; $i++)
    {
        // Line 1
        if ($board[0][0] === $symbols[$i] &&
            $board[0][1] === $symbols[$i] &&
            $board[0][2] === $symbols[$i] &&
            $board[0][3] === $symbols[$i] &&
            $board[0][4] === $symbols[$i]) {
            $prize = $setBet * $setBet;
            $creditDeposit += $prize;
        echo "You won " . $prize . PHP_EOL;
        }
        // Line 2
        if ($board[1][0] === $symbols[$i] &&
            $board[1][1] === $symbols[$i] &&
            $board[1][2] === $symbols[$i] &&
            $board[1][3] === $symbols[$i] &&
            $board[1][4] === $symbols[$i]) {
            $prize = $setBet * $setBet;
            $creditDeposit += $prize;
            echo "You won " . $prize . PHP_EOL;
        }
        // Line 3
        if ($board[2][0] === $symbols[$i] &&
            $board[2][1] === $symbols[$i] &&
            $board[2][2] === $symbols[$i] &&
            $board[2][3] === $symbols[$i] &&
            $board[2][4] === $symbols[$i]) {
            $prize = $setBet * $setBet;
            $creditDeposit += $prize;
            echo "You won " . $prize . PHP_EOL;
        }
        // UpDown Diagonal
        if ($board[0][0] === $symbols[$i] &&
            $board[1][1] === $symbols[$i] &&
            $board[2][2] === $symbols[$i] &&
            $board[1][3] === $symbols[$i] &&
            $board[0][4] === $symbols[$i]) {
            $prize = $setBet * $setBet;
            $creditDeposit += $prize;
            echo "You won " . $prize . PHP_EOL;
        }
        // DownUp Diagonal
        if ($board[2][0] === $symbols[$i] &&
            $board[1][1] === $symbols[$i] &&
            $board[0][2] === $symbols[$i] &&
            $board[1][3] === $symbols[$i] &&
            $board[2][4] === $symbols[$i]) {
            $prize = $setBet * $setBet;
            $creditDeposit += $prize;
            echo "You won " . $prize . PHP_EOL;
        }
    }
}




