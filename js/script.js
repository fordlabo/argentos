// ==========================================
//   ДАТА ОКОНЧАНИЯ ТАЙМЕРА — меняйте здесь
//   Формат: new Date(год, месяц (0=янв, 11=дек), день, час, минута)
// ==========================================

const TIMER_END = new Date(2026, 5, 15, 0, 0);

const items = document.querySelectorAll('.middle__item .middle__count');

function pad(n) {
    return String(n).padStart(2, '0');
}

function flipTo(el, newValue) {
    const current = el.querySelector('.middle__slot:not(.flip-out)');
    if (current && current.textContent === newValue) return;

    el.querySelectorAll('.middle__slot.flip-out').forEach(s => s.remove());

    const next = document.createElement('span');
    next.className = 'middle__slot flip-in';
    next.textContent = newValue;
    el.appendChild(next);

    if (current) current.classList.add('flip-out');

    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            next.classList.remove('flip-in');
        });
    });

    if (current) setTimeout(() => current.remove(), 380);
}

items.forEach(el => {
    el.innerHTML = '';
    const slot = document.createElement('span');
    slot.className = 'middle__slot';
    slot.textContent = '00';
    el.appendChild(slot);
});

function updateTimer() {
    const now  = new Date();
    const diff = TIMER_END - now;

    if (diff <= 0) {
        items.forEach(el => flipTo(el, '00'));
        return;
    }

    const days    = Math.floor(diff / 1000 / 60 / 60 / 24);
    const hours   = Math.floor(diff / 1000 / 60 / 60) % 24;
    const minutes = Math.floor(diff / 1000 / 60) % 60;
    const seconds = Math.floor(diff / 1000) % 60;

    flipTo(items[0], pad(days));
    flipTo(items[1], pad(hours));
    flipTo(items[2], pad(minutes));
    flipTo(items[3], pad(seconds));
}

updateTimer();
setInterval(updateTimer, 1000);

const video = document.querySelector('.middle__video');
const playBtn = document.querySelector('.middle__play');

playBtn.addEventListener('click', function () {
  video.muted = false;
  video.loop = false;
  video.currentTime = 0;

  if (video.requestFullscreen) {
    video.requestFullscreen();
  } else if (video.webkitRequestFullscreen) {
    video.webkitRequestFullscreen();
  }

  video.play();
  playBtn.style.display = 'none';
});

document.addEventListener('fullscreenchange', handleFullscreenChange);
document.addEventListener('webkitfullscreenchange', handleFullscreenChange);

function handleFullscreenChange() {
  const isFullscreen = !!(document.fullscreenElement || document.webkitFullscreenElement);

  if (!isFullscreen) {
    video.muted = true;
    video.loop = true;
    video.play();
    playBtn.style.display = '';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.footer__form');
  form.addEventListener('submit', formSend);

  async function formSend(e) {
    e.preventDefault();
    let formData = new FormData(form);
    let responce = await fetch('sendmail.php', { method: 'POST', body: formData });
    if (responce.ok) {
      let result = await responce.json();
      console.log('Форма отправлена', result);
    } else {
      alert("Ошибка");
    }
  }
});
