// ==========================================
//   ДАТА ОКОНЧАНИЯ ТАЙМЕРА — меняйте здесь
//   Формат: new Date(год, месяц (0=янв, 11=дек), день, час, минута)
// ==========================================
const TIMER_END = new Date(2026, 5, 15, 0, 0); // 15 июня 2025, 00:00

// — дальше не трогать —

const items = document.querySelectorAll('.middle__item .middle__count');

function pad(n) {
    return String(n).padStart(2, '0');
}

function initDigits(el, value) {
    el.innerHTML = '';
    value.split('').forEach(char => {
        const digitEl = document.createElement('div');
        digitEl.className = 'middle__digit';
        const span = document.createElement('span');
        span.textContent = char;
        digitEl.appendChild(span);
        el.appendChild(digitEl);
    });
}

items.forEach((el, i) => {
    const values = ['00', '00', '00', '00'];
    initDigits(el, values[i]);
});

function flipDigit(digitEl, newChar) {
    const current = digitEl.querySelector('span');
    if (current.textContent === newChar) return;

    const next = document.createElement('span');
    next.textContent = newChar;
    next.classList.add('flip-in');
    digitEl.appendChild(next);

    current.classList.add('flip-out');

    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            next.classList.remove('flip-in');
        });
    });

    setTimeout(() => current.remove(), 380);
}

function flipTo(el, newValue) {
    const digits = el.querySelectorAll('.middle__digit');
    newValue.split('').forEach((char, i) => {
        if (digits[i]) flipDigit(digits[i], char);
    });
}

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

document.querySelector('.middle__play').addEventListener('click', function() {
    const video = document.querySelector('.middle__video');
    this.remove();
    video.setAttribute('controls', '');
    video.play();
});

document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.footer__form');
  form.addEventListener('submit', formSend);

  async function formSend(e) {
    e.preventDefault();

    let formData = new FormData(form);
    let responce = await fetch('sendmail.php', {
      method: 'POST',
      body: formData
    });
    if (responce.ok) {
      let result = await responce.json();
      console.log('Форма отправлена', result);
    } else {
      alert("Ошибка");
    }
  }
})
