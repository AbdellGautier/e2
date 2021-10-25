function validateMissileLaunch() {

    // Reference all of our target radio buttons
    var rdoTargets = document.getElementsByName('CB');

    // Check if we have any targets selected
    for ( var i = 0; i < rdoTargets.length; i++) {
        if(rdoTargets[i].checked) {
            return true;
        }
    }

    // If the code reached this point, it
    // means that no target was selected.
    alert("Please select a target on the Computer Submarine Region.");
    
    return false;
}