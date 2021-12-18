// Generates a random funky nickname for the Home page's use
function getFunkyNickname() {

    // Define our funky nicknames
    let funkyNicknames = [
        "Thornuts", "2SlowBut2Furious", "MarvelousMarvel", "Catman", "LemonyTilapia", "FlyingTurtly", "Aragonaut",
        "TinyBotiBot", "MrJingles", "Othello", "AlienInterceptor", "TheProtector", "DanielSan", "TDLemons",
        "MonasticMonk", "UnluckyCharms", "CocoChoco", "SpaceBowler", "SmurfsfySlushie", "IceColdSurfer",
        "SneakySnake", "ParagonOfParagons", "ChewyMangoeyMango", "LetGoOfLegolasTheLego", "AntiGravityMouse"];

    // Grab a reference to the Nickname field
    let Player_Nickname = document.getElementById("Player_Nickname");

    while (true) {
        // Obtain a random funky nickname
        let randomNickname = funkyNicknames[Math.floor(Math.random() * funkyNicknames.length)];

        // Avoid placing the same existing nickname
        if (Player_Nickname.value != randomNickname) {
            Player_Nickname.value = randomNickname;
            Player_Nickname.focus();

            // Exit the loop
            break;
        }
    }
}

// Validation of Home page's form fields
function validateGameLaunch() {

    // Grab a reference to the Nickname field
    var Player_Nickname = document.getElementsByName('Player_Nickname');

    // Check if we the form is valid before starting a new game
    if (Player_Nickname.value != "" && rdoDifficulty.checked) {
        return true;
    }

    // If the code reached this point, it
    // means that there is a problem with the form.
    alert("Please specify your Nickname (for scorekeeping).");

    return false;
}

// Ensure that a spot/radiobutton is selected before launching a missile
function validateMissileLaunch() {

    // Reference all of our target radio buttons
    var rdoTargets = document.getElementsByName('CB'); // CB = Computer Board

    // Check if we have any targets selected
    for (var i = 0; i < rdoTargets.length; i++) {
        if (rdoTargets[i].checked) {
            return true;
        }
    }

    // If the code reached this point, it
    // means that no target was selected.
    alert("Please select a target on the Computer Submarine Region.");

    return false;
}