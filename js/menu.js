const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const openBtn = document.getElementById('openMenu');
const closeBtn = document.getElementById('closeMenu');

openBtn.addEventListener('click', () => {
sidebar.classList.remove('-translate-x-full');
overlay.classList.remove('hidden');
});

closeBtn.addEventListener('click', () => {
sidebar.classList.add('-translate-x-full');
overlay.classList.add('hidden');
});

overlay.addEventListener('click', () => {
sidebar.classList.add('-translate-x-full');
overlay.classList.add('hidden');
});