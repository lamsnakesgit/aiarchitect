# 🌐 ПЛАТФОРМЫ: WordPress, Tilda и Админка

**Дата:** 2026-01-24  
**Цель:** Разместить лендинг на CMS для SEO, рекламы и редактирования

---

## 📋 СРАВНЕНИЕ ВАРИАНТОВ

| Критерий | WordPress | Tilda | Текущий (HTML) |
|----------|-----------|-------|----------------|
| **Админка** | ✅ Полная | ✅ Удобная | ❌ Нет |
| **SEO** | ✅ Отличное | ✅ Хорошее | ⚠️ Ручное |
| **Контекст. реклама** | ✅ Легко | ✅ Легко | ✅ Легко |
| **Редактирование другими** | ✅ Да | ✅ Да | ❌ Нужен доступ к коду |
| **Скорость загрузки** | ⚠️ Средняя | ✅ Быстрая | ✅ Быстрая |
| **Стоимость** | Хостинг 200-500₽/мес | 750-1500₽/мес | Бесплатно (GitHub Pages) |
| **Сложность** | Средняя | Низкая | Нужен код |

---

## 🎯 ВАРИАНТ 1: TILDA (Рекомендуется для быстрого старта)

### Преимущества:
- ✅ Визуальный редактор (no code)
- ✅ Готовые блоки для лендингов
- ✅ Встроенные формы + CRM
- ✅ Хорошее SEO из коробки
- ✅ Быстрая загрузка
- ✅ Легко давать доступ другим

### Как перенести текущий лендинг:

#### Шаг 1: Регистрация
1. Зайдите на [tilda.cc](https://tilda.cc)
2. Создайте аккаунт
3. Создайте новый проект

#### Шаг 2: Воссоздание дизайна
Просто перетащите блоки:

**Hero Section:**
- Блок: **ME301** (Заголовок с изображением)
- Или: **ME704** (Заголовок + статистика)

**About:**  
- Блок: **AB201** (О нас с фото)
- Или: **TE105** (Команда)

**Services:**
- Блок: **PR01** (Тарифы/Цены)
- Или: **PR20** (Карточки услуг)

**Results/Testimonials:**
- Блок: **RE201** (Отзывы карусель)
- Или: **ST05** (Статистика)

**Events:**
- Блок: **EV01** (События)

**Contact:**
- Блок: **BF101** (Форма обратной связи)
- Или: **CL01** (Контакты)

#### Шаг 3: Настройка форм
1. В настройках блока с формой выберите "Получать заявки"
2. Подключите email / CRM / webhook

**Интеграция с n8n:**
1. В Tilda: Настройки сайта → Формы → Webhook
2. Вставьте URL вашего n8n webhook
3. Теперь заявки идут в n8n → Notion

#### Шаг 4: SEO настройки
1. Настройки проекта → SEO
2. Заполните:
   - Title (до 60 символов)
   - Description (до 160 символов)
   - Keywords
   - Open Graph (для соцсетей)

#### Шаг 5: Подключение домена
1. Купите домен (REG.RU, Namecheap)
2. В Tilda: Настройки проекта → Домен
3. Добавьте DNS записи

### Стоимость Tilda:
- **Business:** 750 ₽/мес (1 сайт, все фичи)
- **Business+:** 1500 ₽/мес (5 сайтов, API)

---

## 🎯 ВАРИАНТ 2: WORDPRESS (Для максимального контроля)

### Преимущества:
- ✅ Полный контроль над сайтом
- ✅ Тысячи плагинов
- ✅ Лучшее SEO (с плагинами)
- ✅ Свой хостинг
- ✅ Полная кастомизация

### Как перенести:

#### Шаг 1: Хостинг
Варианты (Россия):
- Beget: от 200 ₽/мес
- TimeWeb: от 150 ₽/мес
- Reg.ru: от 250 ₽/мес

Варианты (мир):
- DigitalOcean: $5/мес
- Hetzner: €4/мес

#### Шаг 2: Установка WordPress
```bash
# Через SSH на сервере
wget https://wordpress.org/latest.tar.gz
tar -xvzf latest.tar.gz
# Настроить базу данных и wp-config.php
```

Или используйте авто-установку хостинга (есть у Beget, Timeweb).

#### Шаг 3: Конвертация HTML → WordPress тема

**Вариант A: Использовать готовую тему**
1. Установите тему **Elementor** или **Divi**
2. Воссоздайте дизайн визуально

**Вариант B: Создать кастомную тему**
1. Создайте папку `wp-content/themes/expertise-landing/`
2. Скопируйте файлы:

```
expertise-landing/
├── style.css           # Стили (ваш styles.css + заголовок темы)
├── index.php           # Главная страница
├── header.php          # Шапка
├── footer.php          # Подвал
├── functions.php       # Функции темы
├── screenshot.png      # Превью темы
└── js/
    └── script.js       # Ваш JavaScript
```

**Файл style.css (начало):**
```css
/*
Theme Name: Expertise Landing
Theme URI: https://yoursite.com
Author: Your Name
Description: Custom landing page theme for expertise packaging
Version: 1.0
*/

/* Ваш CSS из styles.css ниже */
```

**Файл index.php:**
```php
<?php get_header(); ?>

<!-- Ваш HTML контент (адаптированный) -->
<section class="hero">
    <div class="container hero-content">
        <h1><?php echo get_theme_mod('hero_title', 'Заголовок'); ?></h1>
        <!-- ... -->
    </div>
</section>

<?php get_footer(); ?>
```

**Файл functions.php:**
```php
<?php
// Подключение стилей и скриптов
function expertise_scripts() {
    wp_enqueue_style('expertise-style', get_stylesheet_uri());
    wp_enqueue_script('expertise-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'expertise_scripts');

// Меню
register_nav_menus(array(
    'primary' => 'Главное меню'
));

// Кастомайзер (для редактирования из админки)
function expertise_customize($wp_customize) {
    $wp_customize->add_section('hero_section', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Упакуйте свою экспертность',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Заголовок Hero',
        'section' => 'hero_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'expertise_customize');
?>
```

#### Шаг 4: Плагины для SEO и форм

**SEO:**
- **Yoast SEO** или **Rank Math** - бесплатно
- Настройте sitemap, мета-теги, Open Graph

**Формы:**
- **Contact Form 7** - бесплатно
- **WPForms** - freemium
- **Gravity Forms** - платно, но мощно

**Интеграция форм с n8n:**
```
Contact Form 7 → Webhook плагин → n8n → Notion
```

Плагин: **CF7 to Webhook**
1. Установите плагин
2. В настройках формы добавьте webhook URL
3. Заявки идут в n8n

#### Шаг 5: Аналитика
- **Google Site Kit** - Google Analytics + Search Console
- **Яндекс.Метрика** - через код в header.php

---

## 🎯 ВАРИАНТ 3: HEADLESS CMS + ТЕКУЩИЙ HTML

### Преимущества:
- ✅ Быстрая загрузка
- ✅ Админка через CMS (например, Strapi, Contentful)
- ✅ Редактирование контента без кода
- ✅ SEO полностью под контролем

### Как работает:
```
Strapi (CMS) → API → index.html (JavaScript fetch)
```

**Минус:** Требуется разработка.

---

## 📝 АДМИНКА ДЛЯ РЕДАКТИРОВАНИЯ

### Простой вариант: DecapCMS (бывший Netlify CMS)

**Что это:** Легковесная CMS для статических сайтов. Работает с GitHub.

**Установка:**

1. Создайте `admin/index.html`:
```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Админка</title>
  <script src="https://unpkg.com/decap-cms@^3.0.0/dist/decap-cms.js"></script>
</head>
<body>
</body>
</html>
```

2. Создайте `admin/config.yml`:
```yaml
backend:
  name: github
  repo: username/repo-name
  branch: main

media_folder: "images"
public_folder: "/images"

collections:
  - name: "settings"
    label: "Настройки сайта"
    files:
      - label: "Hero Section"
        name: "hero"
        file: "content/hero.json"
        fields:
          - {label: "Заголовок", name: "title", widget: "string"}
          - {label: "Подзаголовок", name: "subtitle", widget: "text"}
          - {label: "CTA текст", name: "cta", widget: "string"}
          
      - label: "Услуги"
        name: "services"
        file: "content/services.json"
        fields:
          - label: "Услуги"
            name: "items"
            widget: "list"
            fields:
              - {label: "Название", name: "title", widget: "string"}
              - {label: "Цена", name: "price", widget: "number"}
              - {label: "Описание", name: "description", widget: "text"}
```

3. В `index.html` добавьте загрузку данных:
```javascript
// Загрузка контента из JSON
fetch('/content/hero.json')
  .then(r => r.json())
  .then(data => {
    document.querySelector('.hero-title').innerHTML = data.title;
    document.querySelector('.hero-subtitle').innerText = data.subtitle;
  });
```

4. Теперь на `/admin` будет админка!

---

## 📢 КОНТЕКСТНАЯ РЕКЛАМА

### Яндекс.Директ

**Подготовка:**
1. Создайте аккаунт в Яндекс.Директ
2. Установите Яндекс.Метрику на сайт
3. Настройте цели (форма отправлена, кнопка нажата)

**Типы кампаний:**
- **Поисковая** - для горячего спроса ("консультация эксперта")
- **РСЯ** - для охвата (баннеры на сайтах)
- **Ретаргетинг** - для тех, кто был на сайте

**Код Метрики:**
```html
<!-- В <head> -->
<script>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   ...
</script>
```

### Google Ads

**Подготовка:**
1. Google Ads аккаунт
2. Google Analytics 4 на сайте
3. Связать Ads и Analytics
4. Настроить конверсии

**Код GA4:**
```html
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

---

## 🔌 ИНТЕГРАЦИЯ ФОРМ

### Вариант 1: n8n Webhook (текущий)

Уже настроено! Форма → n8n → Notion/CRM

### Вариант 2: FormSubmit (без сервера)

```html
<form action="https://formsubmit.co/your@email.com" method="POST">
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <button type="submit">Отправить</button>
</form>
```

### Вариант 3: Tilda Forms (если на Tilda)

Встроено. Настраивается визуально.

### Вариант 4: TypeForm (премиум формы)

Красивые интерактивные формы. Embed на сайт.
- Бесплатно: 10 ответов/мес
- Платно: от $25/мес

---

## 🎯 РЕКОМЕНДАЦИЯ

### Для быстрого старта:
**Tilda Business** (750 ₽/мес)
- Визуальный редактор
- Формы из коробки
- SEO настроено
- Дать доступ другим легко

### Для полного контроля:
**WordPress + Elementor** + хостинг (от 500 ₽/мес)
- Максимальная гибкость
- Плагины для всего
- SEO через Yoast/Rank Math
- Нужны базовые знания

### Для минимальных затрат:
**Текущий HTML + DecapCMS + GitHub Pages** (бесплатно)
- Бесплатный хостинг
- Админка для контента
- Требуется настройка

---

## ✅ ЧЕКЛИСТ: Выбор платформы

### Если выбрали Tilda:
- [ ] Зарегистрироваться на tilda.cc
- [ ] Создать проект
- [ ] Воссоздать дизайн из блоков
- [ ] Настроить формы → webhook → n8n
- [ ] Настроить SEO
- [ ] Подключить домен

### Если выбрали WordPress:
- [ ] Купить хостинг и домен
- [ ] Установить WordPress
- [ ] Установить Elementor или создать тему
- [ ] Установить Yoast SEO
- [ ] Настроить Contact Form 7 + webhook
- [ ] Подключить аналитику

### Если остаетесь на HTML:
- [ ] Настроить DecapCMS для админки
- [ ] Добавить Google Analytics
- [ ] Добавить Яндекс.Метрику
- [ ] Развернуть на GitHub Pages / Netlify
- [ ] Подключить домен

---

*Создано: 2026-01-24*
