<?php
session_start();

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Подключение к базе данных
// $mysqli = new mysqli("localhost", "a1007470_bd", "7xYde8!NzNaBLJ", "a1007470_bd");
$mysqli = new mysqli("MySQL-8.2", "root", "", "cli_ar");

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Получение данных пользователя
$user_id = $_SESSION['user_id'];
$sql = "SELECT username, userphone FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    die("Ошибка подготовки запроса: " . $mysqli->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($firstname, $lastname);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/tailwind_style.css ">
  <link rel="stylesheet" href="./css/style_video.css">
  <!-- <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" /> -->
  <title>Document</title>
</head>

<body class="bg-[#bebebe]">
  <header class="">

    <div class="bg-white rounded-xl m-2 p-1 container mx-auto w-full flex flex-col items-center sm:flex-row justify-between sm:items-start">
      <div class="video_list w-full  flex ">
        <!-- style_video -->
        <details class="details w-full pt-2">
          <summary class="details__title w-full flex items-center gap-6">
            <div href="" class="active flex items-center justify-center bg-[#e06b1c] h-10  w-10 p-2  rounded-lg ">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"></path>
              </svg>
            </div>
            <span id="detalText" class="w-3/5">текуший урок: 1</span>
          </summary>
          <!-- содержимое списка -->
          <div class="details__content">
            <button onclick="loadVideo(0)" class="hover:underline details__element flex items-center mb-2 gap-6">
              <div href="" class="flex items-center justify-center bg-[#e06b1c] w-10 h-10 p-2  rounded-lg border-1 border-[#0e30f0]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
                  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"></path>
                </svg>
              </div>
              <span>урок 1</span>
            </button>
            
            
            <button onclick="loadVideo(1)" class="hover:underline details__element flex items-center mb-2 gap-6">
              <div href="" class="flex items-center justify-center bg-[#e06b1c] w-10 h-10 p-2  rounded-lg border-1 border-[#0e30f0]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
                  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"></path>
                </svg>
              </div>
              <span>урок 2</span>
            </button>

            <button onclick="loadVideo(2)" class="hover:underline details__element flex items-center mb-2 gap-6">
              <div href="" class="flex items-center justify-center bg-[#e06b1c] w-10 h-10 p-2  rounded-lg border-1 border-[#0e30f0]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
                  <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"></path>
                </svg>
              </div>
              <span>урок 3</span>
            </button>
          </div>
        </details>

      </div>
      <div class="btn_exsit h-4/5 flex p-2 w-full sm:w-[18%] justify-center items-center gap-2">
        <a class="bg-[#f39c12] p-2 rounded-lg text-center w-full" href="../about.php">Выход</a>
      </div>
    </div>
  </header>
  <header class="">


  </header>

  <section class="text-gray-800 body-font py-8">
    <div class="container mx-auto px-2 lg:px-8">
      <div class="flex flex-col md:flex-row gap-6">

        <!-- Левая часть: Видео -->
        <div class="md:w-2/3 w-full bg-white rounded-2xl overflow-hidden shadow-md">
          <div class="w-full aspect-video">
            <iframe 
            id="nexUp"
            src="https://player.vimeo.com/video/1078077266?autoplay=1&loop=1&title=0&byline=0&portrait=0&color=ffffff"
            class="w-full h-full"
            frameborder="0"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen>
            </iframe>
          </div>
          <div class="flex flex-col sm:flex-row justify-between items-center py-2  sm:p-3 md:p-4 bg-gray-100">
            <button onclick="prevVideo()"
              class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition disabled:opacity-50 mb-1 sm:mb-0 "
              id="prevBtn">
              ← Предыдущее
            </button>
            <button onclick="nextVideo()"
              class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition disabled:opacity-50"
              id="nextBtn">
              Следующее →
            </button>
          </div>
        </div>

        <!-- Правая часть: Отзыв -->
        <div class="md:w-1/3 w-full bg-white rounded-2xl p-2 shadow-md flex flex-col justify-between">
          <div>
            <h2 id="videoTitle" class="text-2xl font-semibold text-gray-800 mb-2">Название видео</h2>
            <p  id="videoDescription" class="text-gray-600 leading-relaxed mb-4">
              Здесь будет описание видео. Вы можете добавить любую информацию, которую хотите.
            </p>
            <!-- <div class="flex items-center justify-between">
              <span class="text-gray-500">Автор: Имя автора</span>
              <span class="text-gray-500">Дата: 01.01.2023</span>
            </div> -->
          </div>
        </div>
      </div>
  </section>

  <section>
    <!-- Кнопка открытия -->
    <button id="openMenu" class="fixed bottom-4 left-4 z-50 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 focus:outline-none">
      <!-- Иконка меню -->
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Затемнение фона -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

    <!-- Боковое меню -->
    <div id="sidebar" class="fixed top-0 left-0 w-64 bg-white shadow-lg z-50 transform  
  -translate-x-full transition-transform duration-300 ease-in-out sm:w-64">
      <div class="p-4  flex justify-between items-center">
        <h2 class="text-lg font-semibold">Меню</h2>
        <button id="closeMenu" class="text-gray-500 hover:text-black text-xl font-bold">×</button>
      </div>
      <div class="w-full flex flex-col items-center">
        <div href="" class="flex items-center justify-center bg-[#e06b1c] w-32 py-4  rounded-lg border-1 border-[#0e30f0] ">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
            <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"></path>
          </svg>
        </div>
        <h1 class="this-video-h1 mb-1">beginer</h1>

        <div class="video-container flex items-center justify-center bg-[#e06b1c] w-32  p-1 mb-1  rounded-lg border-1 border-[#0e30f0]">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
            <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
          </svg>
          <span class="video-label">Смотреть видео</span>
        </div>

        <div class="video-container flex items-center justify-center bg-[#e06b1c] w-32  p-1 mb-1 rounded-lg border-1 border-[#0e30f0]">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
            <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
          </svg>
          <span class="video-label">Смотреть видео</span>
        </div>

        <div class="video-container flex items-center justify-center bg-[#e06b1c] w-32  p-1 mb-1 rounded-lg border-1 border-[#0e30f0]">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#fff" class="bi-play-fill" viewBox="0 0 16 16">
            <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
          </svg>
          <span class="video-label">Смотреть видео</span>
        </div>

      </div>
    </div>




    <!-- JS -->
    <script src="./js/menu.js">
    </script>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/shaka-player@3.1.0/dist/shaka-player.compiled.js"></script>

  <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
  <script>
    var player = videojs('videoPlayer');
    navigator.mediaDevices.getDisplayMedia().then(() => {
     document.querySelector("video").style.filter = "blur(90px)";
     });
    
  </script>
  
  <!-- <script src="https://cdn.jsdelivr.net/npm/shaka-player@3.1.0/dist/shaka-player.compiled.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/video.js/dist/video.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-hls/dist/videojs-contrib-hls.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-vimeo/dist/videojs-vimeo.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-quality-levels/dist/videojs-contrib-quality-levels.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/videojs-hotkeys/dist/videojs.hotkeys.min.js"></script> -->

  <script src="./js/dinamik_next_prev.js">

  </script>
</body>

</html>