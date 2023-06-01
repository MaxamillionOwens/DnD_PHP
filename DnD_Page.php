<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DnD Assistance</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Random D&D Character Generator</h1>

    <form method="POST">
        <label for="level">Select Character Level:</label>
        <select name="level" id="level">
            <option value="1">Level 1</option>
            <option value="2">Level 2</option>
            <option value="3">Level 3</option>
            <option value="4">Level 4</option>
            <option value="5">Level 5</option>
        </select>
        <br><br>
        <input type="submit" name="generate" value="Generate Character">
    </form>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include 'DnD_Classes.php';

    $raceArray = array_values((new ReflectionClass('Race'))->getConstants());
    
    $randomIndex = rand(0, count($raceArray) - 1);

    function getRandomInt($min, $max)
    {
        return rand($min, $max);
    }

    if (isset($_POST['generate'])) {
        $character = new Character();
        $character->race = $raceArray[$randomIndex];
        $character->gender = getRandomInt(0, 1) ? Gender::Male : Gender::Female;
        $character->name = chooseName($character->race, $character->gender);
        $character->class = $classes[getRandomInt(0, count($classes) - 1)];
        $selectedLevel = isset($_POST['level']) ? $_POST['level'] : 1;
        $character->level = $selectedLevel;

        foreach ($attributes as $attribute) {
            $character->$attribute = getRandomInt(3, 18);
        }

        $character->skills = $skillsByClass[$character->class];
        $feats = $featsByRace[$character->race];
        $randomIndex = getRandomInt(0, count($feats) - 1);
        $character->feats = $feats[$randomIndex];

        echo "<h2><strong>Name:</strong> " . $character->name . "</h2>";
        echo "<p><strong>Race:</strong> " . $character->race . "</p>";
        echo "<p><strong>Gender:</strong> " . $character->gender . "</p>";
        echo "<p><strong>Class:</strong> " . $character->class . "</p>";
        echo "<p><strong>Level:</strong> " . $character->level . "</p>";
        echo "<p><strong>Attributes:</strong></p>";
        echo "<ul>";
        foreach ($attributes as $attribute) {
            echo "<li>" . ucfirst($attribute) . ": " . $character->$attribute . "</li>";
        }
        echo "</ul>";
        echo "<p><strong>Skills:</strong></p>";
        echo "<ul>";
        foreach ($character->skills as $skill) {
            echo "<li>" . $skill . "</li>";
        }
        echo "</ul>";
        echo "<p><strong>Feats:</strong></p>";
        echo "<ul>";
        echo "<li>" . $character->feats . "</li>";
        echo "</ul>";
    
        $characterText = "Name: " . $character->name . "\n";
        $characterText .= "Race: " . $character->race . "\n";
        $characterText .= "Gender: " . $character->gender . "\n";
        $characterText .= "Class: " . $character->class . "\n";
        $characterText .= "Level: " . $character->level . "\n";
        $characterText .= "\nAttributes:\n";
        foreach ($attributes as $attribute) {
            $characterText .= ucfirst($attribute) . ": " . $character->$attribute . "\n";
        }
        $characterText .= "\nSkills:\n";
        foreach ($character->skills as $skill) {
            $characterText .= $skill . "\n";
        }
        $characterText .= "\nFeats:\n";
        $characterText .= $character->feats . "\n";

        // Download button
        $filename = "character.txt";
        $file = fopen($filename, "w");
        fwrite($file, $characterText);
        fclose($file);
        echo '<a href="' . $filename . '" download>Download Character</a>';
    }
    ?>
</body>

</html>