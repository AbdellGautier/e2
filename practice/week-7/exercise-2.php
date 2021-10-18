<?php

# Define 4 different variables, which will
# each represent how much a given coin is worth
function vowelCount($word)
{
    // Vowels definition
    $vowels = array("a", "e", "i", "o", "u");

    $vowelCount = 0;

    // Count the vowel present in the word provided
    foreach (str_split($word) as $ch) {
        if (in_array($ch, $vowels)) {
            $vowelCount += 1;
        }
    }

    return $vowelCount;
}

echo "apple: " . vowelCount('apple'); # Should yield 2
echo "<br>";
echo "lynx: " . vowelCount('lynx'); # Should yield 0
echo "<br>";
echo "hi: " . vowelCount('hi'); # Should yield 1
echo "<br>";
echo "mississippi: " . vowelCount('mississippi'); # Should yield 4
