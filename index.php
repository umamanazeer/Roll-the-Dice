<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roll Game</title>
    <style>
        body {
            text-align: center; /* Centers text horizontally within the body */
            font-family: Arial, sans-serif; /* Sets the font family for the body text */
            background-color: #ffebf2; /* Sets the background color of the page to light pink */
            margin: 0; /* Removes default margin from the body */
            padding: 0; /* Removes default padding from the body */
        }
        h1 {
            color: #ff69b4; /* Sets the color of the heading to hot pink */
            margin-top: 20px; /* Adds 20 pixels of space above the heading */
        }
        img {
            width: 100px; /* Sets the width of images to 100 pixels */
            cursor: pointer; /* Changes the cursor to a pointer when hovering over images */
            border: 2px solid #ff69b4; /* Adds a border around images with hot pink color */
            border-radius: 10px; /* Rounds the corners of the image border */
            margin: 20px 0; /* Adds 20 pixels of space above and below the image */
        }
        p {
            font-size: 18px; /* Sets the font size of paragraphs to 18 pixels */
            color: #333; /* Sets the text color to a dark gray for better readability */
            margin: 10px 0; /* Adds 10 pixels of space above and below each paragraph */
        }
        #total {
            font-size: 20px; /* Sets the font size of the total roll element to 20 pixels */
            color: #ff1493; /* Sets the color of the total text to deep pink */
        }
        #rollHistory {
            margin-top: 20px; /* Adds 20 pixels of space above the roll history element */
            font-size: 18px; /* Sets the font size of the roll history list to 18 pixels */
            list-style-type: none; /* Removes bullet points from the list */
            padding: 0; /* Removes padding from the list */
        }
        #rollHistory li {
            display: flex; /* Uses flexbox layout for list items */
            align-items: center; /* Vertically centers items in the list */
            margin-bottom: 10px; /* Adds 10 pixels of space below each list item */
        }
        #rollHistory img {
            width: 50px; /* Sets the width of images in the roll history to 50 pixels */
            margin-right: 10px; /* Adds 10 pixels of space to the right of each image */
            border: 2px solid #ff1493; /* Adds a border around images in the history with deep pink color */
            border-radius: 5px; /* Rounds the corners of the image border in the history */
        }
    </style>
</head>
<body>
    <h1>Roll It</h1> <!-- Heading for the page -->
    <!-- Image tag to display the dice -->
    <img id="diceImage" src="../1.png" alt="Dice"> <!-- Initial image of dice with a source path and alt text -->
    <p>Current Roll: <span id="currentRoll">0</span></p> <!-- Paragraph showing the current roll with a placeholder value -->
    <p>Total of Rolls: <span id="total">0</span></p> <!-- Paragraph showing the total of all rolls with a placeholder value -->
    <p>Roll History:</p> <!-- Label for the roll history section -->
    <ul id="rollHistory"></ul> <!-- Unordered list to display roll history -->

    <script>
        let totalRoll = 0; /* Variable to keep track of the total of all rolls */
        let rollHistory = []; /* Array to store the history of rolls */

        // Array containing image paths with different numbers
        const diceImages = [
            '../1.png', 
            '../2.png', 
            '../3.png', 
            '../4.png', 
            '../5.png', 
            '../6.png'
        ];

        const diceImage = document.getElementById('diceImage'); /* Selects the dice image element by its ID */
        const currentRollElement = document.getElementById('currentRoll'); /* Selects the current roll span by its ID */
        const totalElement = document.getElementById('total'); /* Selects the total span by its ID */
        const rollHistoryElement = document.getElementById('rollHistory'); /* Selects the roll history unordered list by its ID */

        diceImage.addEventListener('click', function() { /* Adds a click event listener to the dice image */
            // Generate a random number between 0 and 5
            let randomIndex = Math.floor(Math.random() * 6); /* Randomly selects an index between 0 and 5 */

            // Update the dice image based on the random index
            diceImage.src = diceImages[randomIndex]; /* Sets the source of the dice image to the randomly chosen image */

            // Update the current roll display
            let currentRoll = randomIndex + 1; /* Calculates the current roll number (1-based) */
            currentRollElement.innerText = currentRoll; /* Updates the displayed current roll number */

            // Add the current roll to the total
            totalRoll += currentRoll; /* Adds the current roll to the total */
            totalElement.innerText = totalRoll; /* Updates the displayed total roll */

            // Add the current roll image to the history
            rollHistory.push({
                roll: currentRoll,
                image: diceImages[randomIndex]
            }); /* Adds an object containing the current roll and its image to the roll history array */

            // Update the roll history display
            rollHistoryElement.innerHTML = ''; /* Clears the existing roll history display */
            rollHistory.forEach(entry => { /* Iterates through each entry in the roll history */
                let listItem = document.createElement('li'); /* Creates a new list item element */
                let rollImage = document.createElement('img'); /* Creates a new image element */
                rollImage.src = entry.image; /* Sets the source of the image element to the image path from the roll history entry */
                let rollText = document.createElement('span'); /* Creates a new span element */
                rollText.innerText = `Roll: ${entry.roll}`; /* Sets the text of the span element to show the roll number */
                listItem.appendChild(rollImage); /* Appends the image element to the list item */
                listItem.appendChild(rollText); /* Appends the text element to the list item */
                rollHistoryElement.appendChild(listItem); /* Appends the list item to the roll history list */
            });
        });
    </script>
</body>
</html>
