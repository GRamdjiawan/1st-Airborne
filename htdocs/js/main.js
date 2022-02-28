function drawHomePage() {
    const homePage = document.querySelector('#home-page');
    const backgroundHomePage = homePage.style.backgroundImage = 'url(img/bg/home.png)';
}

function drawAboutPage() {
    const homePage = document.querySelector('#about-us');
    const backgroundHomePage = homePage.style.backgroundImage = 'url(img/bg/about-us.jpg)';
}

function drawClipPage() {
    const clipPage = document.querySelector('#clips');
    const backgroundClipPage = clipPage.style.backgroundImage = 'url(img/bg/clips.jpg)';
}

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

    })
}


drawHomePage();
drawAboutPage();
drawClipPage()
playClip();