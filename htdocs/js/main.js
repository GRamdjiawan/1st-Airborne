window.addEventListener('load', () => {
    window.location.href = "index.html#start";
})

function playClip() {
    const clips = document.querySelectorAll('.clips')

    clips.forEach((e) => {
        // when you hover over a clip it will start playing
        e.addEventListener('mouseenter', () => {
            e.play();

        });

        //  when you hover over a clip it will stop playing and reset the video
        e.addEventListener('mouseout', () => {
            e.pause();
            e.currentTime = 0;

        });

        e.muted = true;

    })
}



playClip();