const videos = [
    {
    url: "https://player.vimeo.com/video/123456789",
    title: "Урок 1: Введение в HTML",
    desc: "Это вводное видео по HTML. В нём мы разберём структуру страницы и основные теги."
    },
    {
    url: "https://player.vimeo.com/video/1078077266",
    title: "Урок 2: Основы CSS",
    desc: "Во втором уроке мы познакомимся с базовыми свойствами CSS и научимся стилизовать HTML-элементы."
    },
    {
    url: "https://player.vimeo.com/video/555555555",
    title: "Урок 3: JavaScript переменные",
    desc: "Разберёмся с переменными, типами данных и базовой логикой на JavaScript."
    }
];

let currentIndex = 0;

function loadVideo(index) {
    const iframe = document.getElementById('nexUp');
    const description = document.getElementById('videoDescription');
    const title = document.getElementById('videoTitle');
    const hedTitle = document.getElementById('detalText');

    iframe.src = `${videos[index].url}?title=0&byline=0&portrait=0`;
    title.textContent = videos[index].title;
    description.textContent = videos[index].desc;
    hedTitle.textContent = `текуший урок: ${index + 1}`;

    currentIndex = index;
}

function nextVideo() {
    const nextIndex = (currentIndex + 1) % videos.length;
    loadVideo(nextIndex);
}

function prevVideo() {
    const prevIndex = (currentIndex - 1 + videos.length) % videos.length;
    loadVideo(prevIndex);
}

