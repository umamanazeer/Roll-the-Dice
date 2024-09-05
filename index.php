<?php
session_start(); // Start the session to store roll history and total roll

// Initialize or retrieve roll history and total roll from the session
if (!isset($_SESSION['rollHistory'])) {
    $_SESSION['rollHistory'] = [];
}
if (!isset($_SESSION['totalRoll'])) {
    $_SESSION['totalRoll'] = 0;
}

// Dice images paths
$diceImages = [
    '../1.png', 
    '../2.png', 
    '../3.png', 
    '../4.png', 
    '../5.png', 
    '../6.png'
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Generate a random number between 1 and 6
    $currentRoll = rand(1, 6);
    $imagePath = $diceImages[$currentRoll - 1];

    // Update the total roll
    $_SESSION['totalRoll'] += $currentRoll;

    // Add the roll to history
    $_SESSION['rollHistory'][] = [
        'roll' => $currentRoll,
        'image' => $imagePath
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roll Game</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #ffebf2;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #ff69b4;
            margin-top: 20px;
        }
        img {
            width: 100px;
            cursor: pointer;
            border: 2px solid #ff69b4;
            border-radius: 10px;
            margin: 20px 0;
        }
        p {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }
        #total {
            font-size: 20px;
            color: #ff1493;
        }
        #rollHistory {
            margin-top: 20px;
            font-size: 18px;
            list-style-type: none;
            padding: 0;
        }
        #rollHistory li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        #rollHistory img {
            width: 50px;
            margin-right: 10px;
            border: 2px solid #ff1493;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Roll it</h1>
    <img id="diceImage" src="<?php echo isset($imagePath) ? $imagePath : '../1.png'; ?>" alt="Dice">
    <form method="POST" action="">
        <button type="submit">Roll Dice</button>
    </form>
    <p>Current Roll: <span id="currentRoll"><?php echo isset($currentRoll) ? $currentRoll : '0'; ?></span></p>
    <p>Total of Rolls: <span id="total"><?php echo $_SESSION['totalRoll']; ?></span></p>
    <p>Roll History:</p>
    <ul id="rollHistory">
        <?php foreach ($_SESSION['rollHistory'] as $entry): ?>
            <li>
                <img src="<?php echo htmlspecialchars($entry['image']); ?>" alt="Dice Roll Image">
                <span>Roll: <?php echo htmlspecialchars($entry['roll']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
