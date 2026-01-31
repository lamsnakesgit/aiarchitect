// ==========================================================================
// MOBILE MENU
// ==========================================================================

const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const navMenu = document.querySelector('.nav-menu');

if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        mobileMenuToggle.classList.toggle('active');
    });
}

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-menu a').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
    });
});

// ==========================================================================
// SMOOTH SCROLL
// ==========================================================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerOffset = 80;
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// ==========================================================================
// HEADER SCROLL EFFECT
// ==========================================================================

const header = document.querySelector('.header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 100) {
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
    } else {
        header.style.boxShadow = '0 1px 2px rgba(0, 0, 0, 0.05)';
    }

    lastScroll = currentScroll;
});

// ==========================================================================
// INTERSECTION OBSERVER (Анимации при скролле)
// ==========================================================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Анимация для карточек
document.querySelectorAll('.service-card, .result-card, .event-card').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
    observer.observe(card);
});

// ==========================================================================
// FORM SUBMISSION (n8n / Formspree / WP)
// ==========================================================================

const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
        const action = contactForm.getAttribute('action');

        // Если action не задан или равен '#', используем AJAX (для n8n)
        if (!action || action === '#') {
            e.preventDefault();

            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);

            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Отправка...';
            submitButton.disabled = true;

            try {
                // ВСТАВЬ ТУТ СВОЙ URL ПОСЛЕ НАСТРОЙКИ n8n
                const webhookUrl = 'https://n8n.example.com/webhook/your-id';

                if (webhookUrl.includes('example.com')) {
                    throw new Error('WEBHOOK_NOT_CONFIGURED');
                }

                const response = await fetch(webhookUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    showNotification('Спасибо! Данные успешно отправлены.', 'success');
                    contactForm.reset();
                } else {
                    throw new Error('Response not OK');
                }
            } catch (error) {
                if (error.message === 'WEBHOOK_NOT_CONFIGURED') {
                    console.log('Данные формы (Webhook не настроен):', data);
                    showNotification('Форма почти готова! Нужно прописать Webhook URL в script.js', 'info');
                } else {
                    console.error('Ошибка:', error);
                    showNotification('Произошла ошибка при отправке. Попробуйте позже.', 'error');
                }
            } finally {
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }
        }
        // Иначе (если есть реальный URL, например Formspree) — просто даем форме отправиться стандартно
    });
}

// ==========================================================================
// NOTIFICATION SYSTEM
// ==========================================================================

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;

    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        padding: 20px 30px;
        background: ${type === 'success' ? '#10B981' : type === 'error' ? '#EF4444' : '#6366F1'};
        color: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        animation: slideIn 0.3s ease-out;
        max-width: 400px;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Добавляем стили анимации
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(500px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(500px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ==========================================================================
// COUNTER ANIMATION (для статистики)
// ==========================================================================

function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = Math.floor(target);
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Запуск анимации счетчиков при появлении в viewport
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumber = entry.target;
            const targetValue = parseInt(statNumber.dataset.target);
            animateCounter(statNumber, targetValue);
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-number').forEach((stat, index) => {
    const values = [50, 300, 98]; // Соответствует статистике в HTML
    stat.dataset.target = values[index] || 0;
    stat.textContent = '0';
    statsObserver.observe(stat);
});

// ==========================================================================
// УТИЛИТЫ
// ==========================================================================

// Debounce функция (для оптимизации событий)
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Пример использования debounce для resize
window.addEventListener('resize', debounce(() => {
    console.log('Window resized');
}, 250));

// ==========================================================================
// CONSOLE MESSAGE
// ==========================================================================

console.log('%c🚀 Сайт разработан для упаковки экспертности', 'font-size: 16px; color: #6366F1; font-weight: bold;');
console.log('%cДля интеграции с n8n замените YOUR_N8N_WEBHOOK_URL на реальный URL', 'font-size: 12px; color: #64748B;');
// ==========================================================================
// BEFORE/AFTER SLIDER
// ==========================================================================

const baSlider = document.getElementById('aiSlider');
const sliderHandle = document.getElementById('sliderHandle');
const afterImage = document.getElementById('afterImage');

if (baSlider && sliderHandle && afterImage) {
    const moveSlider = (e) => {
        const rect = baSlider.getBoundingClientRect();
        let x = (e.pageX || e.touches[0].pageX) - rect.left;

        // Ограничиваем движение
        if (x < 0) x = 0;
        if (x > rect.width) x = rect.width;

        const percent = (x / rect.width) * 100;

        sliderHandle.style.left = `${percent}%`;
        afterImage.style.clipPath = `inset(0 0 0 ${percent}%)`;
    };

    baSlider.addEventListener('mousemove', moveSlider);
    baSlider.addEventListener('touchmove', moveSlider);
}
