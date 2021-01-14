const toggleHint = function() {
    const hint = document.getElementById("hint");
    const hintTrigger = document.getElementById("hint-trigger");

    if(hint) {
        if (hint.className !== "visible") {
            gtag('event', 'hint', {
                'level': GAME_LEVEL
            });

            hintTrigger.innerHTML = "Hide hint";
            hint.className += "visible";
            return;
        }

        hintTrigger.innerHTML = "Get a hint?";
        hint.className = "";
    }

}

document.getElementById("hint-trigger").addEventListener("click", toggleHint);
