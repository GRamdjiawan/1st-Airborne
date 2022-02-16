function drawHomePage() {
    const homePage = document.querySelector('#home-page');
    const backgroundHomePage = homePage.style.backgroundImage = 'url(/htdocs/img/bg/home.png)';
}

function drawAboutPage() {
    const homePage = document.querySelector('#about-us');
    const backgroundHomePage = homePage.style.backgroundImage = 'url(/htdocs/img/bg/about-us.jpg)';
}


drawHomePage();
drawAboutPage();