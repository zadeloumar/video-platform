const videos = [
{
    url: "https://player.vimeo.com/video/1074242303",
    title: "Урок 1: Введение в HTML",
    desc: "Это вводное видео по HTML. В нём мы разберём структуру страницы и основные теги."
},
{
    url: "https://player.vimeo.com/video/1078077266",
    title: "Урок 2: Основы CSS",
    desc: "Во втором уроке мы познакомимся с базовыми свойствами CSS и научимся стилизовать HTML-элементы."
},
{
    url: "https://player.vimeo.com/video/1074242303",
    title: "Урок 3: JavaScript переменные",
    desc: "Разберёмся с переменными, типами данных и базовой логикой на JavaScript."
}
// Добавь ещё видео по аналогии
];

let current = 0;

const videoPlayer = document.getElementById("nexUp");
const videoDescription = document.getElementById("videoDescription");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

function updateVideo() {
const vid = videos[current];
videoPlayer.src = vid.url;
document.querySelector("h2").textContent = vid.title;
videoDescription.textContent = vid.desc;

// Управление доступностью кнопок
prevBtn.disabled = current === 0;
nextBtn.disabled = current === videos.length - 1;
}

function nextVideo() {
if (current < videos.length - 1) {
    current++;
    updateVideo();
}
}

function prevVideo() {
if (current > 0) {
    current--;
    updateVideo();
}
}

// Инициализация
updateVideo();

