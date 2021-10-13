<!doctype html>
<html lang='en'>

<head>
    <title>Mystery Word Scramble</title>
    <meta charset='utf-8'>
    <style>
        .correct {
            color: #0a0;
        }

        .incorrect {
            color: #f00;
        }
    </style>
</head>

<body>

    <form method='POST' action='process.php'>
        <h1>Mystery Word Scramble</h1>

        <p>Mystery word: <?php echo $shuffledWord ?></p>
        <p>Hint: <?php echo $wordHint ?></p>

        <label for='answer'>Your guess:</label>
        <input type='text' name='answer' id='answer' autofocus="autofocus" required>

        <button type='submit'>Check answer</button>
    </form>

    <?php if (isset($haveAnswer)) { ?>

        <h1>Results</h1>

        <?php if ($haveAnswer == false) { ?>
            Please enter an answer
        <?php } elseif ($correct) { ?>
            <div class="correct">That's correct! The word was: <?php echo $correctWord ?>!</div>
        <?php } else { ?>
            <div class="incorrect">Wrong answer, the correct word was: <?php echo $correctWord ?>!</div>
        <?php } ?>

    <?php } ?>

</body>

</html>