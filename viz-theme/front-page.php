<?php get_header(); ?>

<!-- Hero -->
<section class="viz-hero">
    <div class="container">
        <div class="section-header centered">
            <h1 class="hero-title" style="color: white;">Продавайте <span class="highlight">будущее</span> сегодня
            </h1>
            <p class="section-description">AI-визуализация недвижимости: из скетча в фотореалистичный 4K рендер и
                видео-облет за 48 часов.</p>
            <div class="hero-cta" style="justify-content: center; margin-top: 40px;">
                <a href="#contact" class="btn btn-primary">Попробовать бесплатно</a>
                <a href="#projects" class="btn btn-secondary" style="background: transparent; color: white;">Наши
                    работы</a>
            </div>
        </div>
    </div>
</section>

<!-- Slider Section -->
<section id="projects" class="ai-viz">
    <div class="container">
        <div class="ai-viz-content">
            <div class="ba-slider-container">
                <div class="ba-slider" id="aiSlider">
                    <div class="ba-image ba-before"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sketch_real.png');">
                        <span class="ba-label label-before">Проект / Техплан</span>
                    </div>
                    <div class="ba-image ba-after" id="afterImage"
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/render_real.png');">
                        <span class="ba-label label-after">AI Визуализация (48ч)</span>
                    </div>
                    <div class="ba-handle" id="sliderHandle"></div>
                </div>
            </div>
            <div class="ai-viz-text">
                <h3>В 5 раз быстрее и дешевле студий</h3>
                <p class="section-description">Мы не рисуем кубики — мы обучаем AI видеть ваш проект и воплощать его
                    в реальность.</p>
                <div class="ai-viz-features">
                    <div class="ai-feature">⚡ <strong>48ч</strong><span>Срок сдачи</span></div>
                    <div class="ai-feature">💎 <strong>4K</strong><span>Разрешение</span></div>
                    <div class="ai-feature">🎥 <strong>Reels</strong><span>Видео в подарок</span></div>
                    <div class="ai-feature">🔄 <strong>1ч</strong><span>Правки</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ROI Section -->
<section class="roi-section">
    <div class="container">
        <div class="section-header centered">
            <span class="section-tag">ROI & Результаты</span>
            <h2 class="section-title">Инвестиция, которая окупается до старта продаж</h2>
            <p class="section-description">Мы не просто делаем картинки — мы даем вам преимущество во времени. Пока
                конкуренты ждут рендеры неделями, вы уже принимаете звонки от покупателей.</p>
        </div>

        <div class="roi-grid">
            <div class="ai-feature">
                <strong>+43 Дня</strong>
                <span>Дополнительных продаж за счет скорости</span>
            </div>
            <div class="ai-feature">
                <strong>80% Экономии</strong>
                <span>Бюджета на визуальный контент</span>
            </div>
            <div class="ai-feature">
                <strong>100% ROI</strong>
                <span>Затраты окупаются первым же бронированием</span>
            </div>
        </div>
    </div>
</section>

<!-- Comparison Block -->
<section class="comparison-section">
    <div class="container">
        <div class="section-header centered">
            <h2 class="section-title">Традиции vs Будущее</h2>
            <p class="section-description">Наглядное сравнение нашего AI-пайплайна с классическими 3D-студиями.</p>
        </div>
        <table class="comparison-table">
            <thead>
                <tr>
                    <th>Критерий</th>
                    <th>3D Студия (Традиция)</th>
                    <th>Наш AI Пайплайн</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Срок готовности</td>
                    <td>4-6 недель</td>
                    <td class="highlight-cell">2-3 дня</td>
                </tr>
                <tr>
                    <td>Стоимость проекта</td>
                    <td>от 1,500,000 ₸</td>
                    <td class="highlight-cell">от 150,000 ₸</td>
                </tr>
                <tr>
                    <td>Круг правок</td>
                    <td>3-5 дней</td>
                    <td class="highlight-cell">30-60 минут</td>
                </tr>
                <tr>
                    <td>Видео-контент</td>
                    <td>Доп. опция (дорого)</td>
                    <td class="highlight-cell">Входит в пакет</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- Video Showcase -->
<section class="video-showcase-section">
    <div class="container">
        <div class="section-header centered">
            <span class="section-tag">Портфолио</span>
            <h2 class="section-title">Видео-презентация объектов</h2>
            <p class="section-description">Динамичные облеты и интерьерные туры, адаптированные под Reels и
                рекламные форматы.</p>
        </div>
        <div class="video-grid">
            <div class="video-card">
                <div class="video-placeholder">
                    <span class="icon">🎥</span>
                    <strong>Внешний облет ЖК</strong>
                    <p class="description">Кинематографичная проходка камеры</p>
                </div>
            </div>
            <div class="video-card">
                <div class="video-placeholder">
                    <span class="icon">🏠</span>
                    <strong>Интерьерный тур</strong>
                    <p class="description">Создание эффекта присутствия</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section id="pricing" class="services">
    <div class="container">
        <div class="section-header centered">
            <h2 class="section-title">Индивидуальные условия</h2>
            <p class="section-description">Мы подбираем пакет услуг под конкретные задачи вашего маркетинга: от
                точечных рендеров до полного рекламного сопровождения ЖК.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <h3>Пакет "Concept"</h3>
                <p>Для быстрой проверки гипотез и первых тестов рекламы.</p>
                <a href="#contact" class="btn btn-outline">Запросить условия</a>
            </div>
            <div class="service-card featured">
                <h3>Пакет "Marketing"</h3>
                <p>Полный набор контента для запуска продаж и соцсетей.</p>
                <a href="#contact" class="btn btn-primary">Получить КП</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-header centered">
            <h2>Готовы увидеть свой проект?</h2>
            <p>Пришлите скетч— мы бесплатно сделаем концепт за 24 часа.</p>
        </div>
        <form class="contact-form" id="contactForm" action="#" method="POST"
            style="max-width: 600px; margin: 0 auto; background: #111827; padding: 30px; border-radius: 12px; border: 1px solid #1f2937;">
            <div class="form-group" style="margin-bottom: 20px;">
                <input type="text" name="name" placeholder="Ваше имя"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid #374151; color: white; border-radius: 6px;"
                    required>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <input type="text" name="contact" placeholder="Email / Телефон / Telegram"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid #374151; color: white; border-radius: 6px;"
                    required>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <textarea name="message" placeholder="Опишите ваш проект или задайте вопрос" rows="4"
                    style="width: 100%; padding: 12px; background: #1f2937; border: 1px solid #374151; color: white; border-radius: 6px;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-full" style="width: 100%;">Отправить запрос</button>
            <p style="font-size: 12px; color: #6b7280; margin-top: 15px; text-align: center;">Мы ответим вам в
                течение 1 часа в рабочее время.</p>
        </form>
    </div>
</section>

<?php get_footer(); ?>