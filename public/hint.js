const toggleHint = function() {
    const hint = document.getElementById("hint");
    const hintTrigger = document.getElementById("hint-trigger");

    console.log(hint);

    if(hint) {
        if (hint.className !== "visible") {
            hintTrigger.innerHTML = "Hide hint";
            hint.className += "visible";
            return;
        }

        hintTrigger.innerHTML = "Get a hint?";
        hint.className = "";
    }

}

document.getElementById("hint-trigger").addEventListener("click", toggleHint);
