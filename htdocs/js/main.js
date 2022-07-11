// window.addEventListener('load', () => {
//     window.location.href = "index.html#start";
// })

function playClip() {
    const clips = document.querySelectorAll('.clips')

    clips.forEach((clip) => {
        // when you hover over a clip it will start playing
        clip.addEventListener('mouseenter', () => {
            clip.play();
        });

        //  when you hover over a clip it will stop playing and reset the video
        clip.addEventListener('mouseout', () => {
            clip.pause();
            clip.currentTime = 0;
        });
        clip.muted = true;
    })
}



playClip();