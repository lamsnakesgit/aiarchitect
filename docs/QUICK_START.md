# 🚀 БЫСТРЫЙ СТАРТ: Пошаговая инструкция

**Дата:** 2026-01-24  
**Цель:** Запустить полную упаковку экспертности за 7 дней

---

## 📅 ДЕНЬ 1: ЗНАКОМСТВО С ПРОЕКТОМ

### ✅ Задачи на сегодня

1. **Просмотреть лендинг**
   ```bash
   # Откройте файл в браузере
   open index.html
   ```
   - Посмотрите все секции
   - Оцените дизайн
   - Запишите, что нужно изменить под себя

2. **Прочитать документацию**
   - 📋 `docs/EXPERTISE_PACKAGING_PLAN.md` - ваш главный план
   - 📖 `README.md` - обзор проекта
   - 📝 `docs/DEVELOPMENT_LOG.md` - что уже сделано

3. **Заполнить первичную информацию**
   Откройте `docs/EXPERTISE_PACKAGING_PLAN.md` и заполните секцию **1. РАСПАКОВКА СМЫСЛОВ**:
   - Кто вы? (ваша экспертность)
   - Целевая аудитория
   - 5 ключевых тезисов

---

## 📅 ДЕНЬ 2: НАСТРОЙКА ИНСТРУМЕНТОВ

### ✅ Задачи на сегодня

#### 1. Установить n8n

```bash
# Глобальная установка
npm install -g n8n

# Запуск n8n
n8n start

# Откроется: http://localhost:5678
```

**Что делать в n8n:**
- Создайте аккаунт
- Изучите интерфейс (5 минут)
- Создайте первый простой workflow:
  - **Trigger:** Manual
  - **Node:** HTTP Request (GET https://api.github.com)
  - **Node:** Set (вывести данные)
  - Нажмите "Execute Workflow"

#### 2. Установить Remotion (опционально, если планируете видео)

```bash
# Перейдите в директорию проекта
cd "/Users/higherpower/Desktop/1_Active_Projects/Telegram_Bots/2 website landing 101 personal online blog presence"

# Создайте проект для видео
npx create-video@latest video-project

# Выберите: "Hello World" (для примера)

# Запустите редактор
cd video-project
npm start

# Откроется: http://localhost:3000
```

#### 3. Изучить гайды

- 🎬 `docs/REMOTION_GUIDE.md` - как создавать видео
- 🔌 `docs/MCP_N8N_SETUP.md` - автоматизация

---

## 📅 ДЕНЬ 3: КАСТОМИЗАЦИЯ ЛЕНДИНГА

### ✅ Задачи на сегодня

#### 1. Изменить личную информацию

Откройте `index.html` и замените:

**Строка 12-13:** Мета-теги
```html
<meta name="description" content="ВАШ ТЕКСТ ОПИСАНИЯ">
<meta name="keywords" content="ваши, ключевые, слова">
<title>ВАШЕ ИМЯ | ВАША НИША</title>
```

**Строка 23-24:** Логотип и имя
```html
<span class="logo-text">Ваше Имя</span>
```

**Строка 44-49:** Заголовок Hero
```html
<h1 class="hero-title">
    ВАША УНИКАЛЬНАЯ ЦЕННОСТЬ<br>
    и начните <span class="highlight-alt">РЕЗУЛЬТАТ</span>
</h1>
<p class="hero-subtitle">
    ВАШЕ ОПИСАНИЕ - кому помогаете и что делаете
</p>
```

#### 2. Изменить статистику

**Строка 54-66:** Цифры достижений
```html
<div class="stat-item">
    <span class="stat-number">ВАША ЦИФРА</span>
    <span class="stat-label">ВАШЕ ОПИСАНИЕ</span>
</div>
```

#### 3. Настроить услуги и цены

**Строка 150-250:** Секция Services
- Измените названия услуг
- Обновите описания
- Установите ВАШИ цены

#### 4. Изменить контакты

**Строка 400+:** Секция Contact
```html
<a href="mailto:ВАШ_EMAIL@example.com">
<a href="tel:+7ВАШНОМЕР">
<a href="https://t.me/ВАШТЕЛЕГРАМ">
```

#### 5. Протестировать

```bash
# Откройте снова
open index.html
```

Проверьте:
- [ ] Все тексты заменены
- [ ] Контакты работают
- [ ] Мобильная версия (сузьте окно браузера)

---

## 📅 ДЕНЬ 4: ПЕРВЫЙ WORKFLOW В N8N

### ✅ Задачи на сегодня

#### Workflow 1: Захват лидов с сайта

1. **Запустите n8n**
   ```bash
   n8n start
   ```

2. **Создайте новый workflow**
   - Нажмите "+ New workflow"
   - Название: "Landing Form Capture"

3. **Добавьте узлы:**

   **Node 1: Webhook**
   - Тип: `Webhook`
   - HTTP Method: `POST`
   - Path: `form-submission`
   - Скопируйте URL (например: `http://localhost:5678/webhook/form-submission`)

   **Node 2: Set**
   - Добавьте поля:
     - `name` → `{{ $json.body.name }}`
     - `email` → `{{ $json.body.email }}`
     - `phone` → `{{ $json.body.phone }}`
     - `service` → `{{ $json.body.service }}`
     - `message` → `{{ $json.body.message }}`

   **Node 3: Google Sheets** (или другая CRM)
   - Operation: `Append`
   - Document: СОЗДАЙТЕ новую таблицу "Leads"
   - Sheet: "Sheet1"
   - Columns: Name, Email, Phone, Service, Message, Date

   **Node 4: Gmail** (Email автоответ клиенту)
   - To: `={{ $json.email }}`
   - Subject: `Спасибо за заявку!`
   - Message: `Здравствуйте, {{ $json.name }}! Мы получили вашу заявку...`

   **Node 5: Telegram** (Уведомление вам)
   - Chat ID: ВАШ_CHAT_ID
   - Message: `🔔 Новый лид!\nИмя: {{ $json.name }}\nEmail: {{ $json.email }}`

4. **Активируйте workflow**
   - Нажмите "Active" в правом верхнем углу

5. **Подключите к лендингу**
   
   Откройте `script.js` и замените (строка ~90):
   ```javascript
   const response = await fetch('http://localhost:5678/webhook/form-submission', {
       method: 'POST',
       headers: {'Content-Type': 'application/json'},
       body: JSON.stringify(data)
   });
   ```

6. **Протестируйте**
   - Откройте лендинг: `open index.html`
   - Заполните форму
   - Нажмите "Отправить"
   - Проверьте:
     - [ ] Данные в Google Sheets
     - [ ] Email получен
     - [ ] Telegram уведомление пришло

---

## 📅 ДЕНЬ 5: СОЗДАНИЕ ПРОМО-РОЛИКА

### ✅ Задачи на сегодня

#### 1. Подготовить контент

Создайте файл `video-project/content.json`:
```json
{
  "title": "Ваше Имя",
  "subtitle": "Эксперт в [вашей нише]",
  "stats": [
    {"number": "50+", "label": "Успешных проектов"},
    {"number": "300%", "label": "Рост продаж"},
    {"number": "98%", "label": "Удовлетворенность"}
  ],
  "cta": {
    "text": "Записывайтесь сейчас!",
    "phone": "+7 (XXX) XXX-XX-XX",
    "website": "www.ваш-сайт.ru"
  }
}
```

#### 2. Создать компонент видео

Скопируйте код из `docs/REMOTION_GUIDE.md` (раздел "Пример кода: Простое промо-видео")

Или используйте шаблон:

```bash
cd video-project

# Скопируйте готовый шаблон (если есть)
# или создайте файл src/PromoVideo.tsx вручную
```

#### 3. Отрендерить видео

```bash
# Рендер в MP4
npx remotion render src/index.ts PromoVideo out/promo.mp4

# Ждите 2-5 минут (зависит от длительности и мощности компьютера)
```

#### 4. Добавить на сайт

После рендера добавьте видео в лендинг:

Откройте `index.html` и вставьте в Hero Section:
```html
<video autoplay muted loop playsinline>
    <source src="video-project/out/promo.mp4" type="video/mp4">
</video>
```

---

## 📅 ДЕНЬ 6: НАСТРОЙКА РАССЫЛОК

### ✅ Задачи на сегодня

#### Workflow 2: Email-последовательность после мероприятия

**План рассылки:**
- День 1: Благодарность + презентация
- День 3: Полезный контент
- День 7: Оффер

**Создание workflow в n8n:**

1. **Node 1: Schedule Trigger**
   - Интервал: Every day at 10:00 AM

2. **Node 2: Google Sheets (Read)**
   - Читать таблицу "Event Participants"
   - Столбцы: Name, Email, EventDate, EmailDay1Sent, EmailDay3Sent, EmailDay7Sent

3. **Node 3: Filter (День 1)**
   - Условие: `EventDate` = вчера И `EmailDay1Sent` = false

4. **Node 4: Gmail (День 1)**
   - Subject: "Спасибо за участие!"
   - Body: Шаблон письма

5. **Node 5: Google Sheets (Update)**
   - Обновить `EmailDay1Sent` = true

Повторить для Day 3 и Day 7.

#### Создать шаблоны писем

Создайте файл `email-templates/day1.html`:
```html
<h1>Здравствуйте, {{name}}!</h1>
<p>Спасибо за участие в мероприятии...</p>
```

---

## 📅 ДЕНЬ 7: ФИНАЛЬНАЯ ПРОВЕРКА И ЗАПУСК

### ✅ Задачи на сегодня

#### 1. Чек-лист готовности

**Лендинг:**
- [ ] Все тексты заменены на ваши
- [ ] Контакты рабочие
- [ ] Форма отправляет данные в n8n
- [ ] Мобильная версия выглядит хорошо
- [ ] Добавлено промо-видео (опционально)

**Автоматизация:**
- [ ] n8n работает
- [ ] Workflow "Landing Form Capture" активен
- [ ] Тестовая заявка обработалась корректно
- [ ] Email-рассылки настроены (опционально)

**Контент:**
- [ ] План упаковки заполнен (docs/EXPERTISE_PACKAGING_PLAN.md)
- [ ] Сценарий выступления готов
- [ ] Презентация создана (PowerPoint/Keynote)

#### 2. Развернуть лендинг онлайн

**Варианты хостинга:**

**А. GitHub Pages (бесплатно)**
```bash
# Создайте репозиторий на GitHub
# Загрузите файлы: index.html, styles.css, script.js

# Включите GitHub Pages:
# Settings → Pages → Source: main branch
# URL: https://ваш-username.github.io/repo-name
```

**Б. Netlify (бесплатно)**
```bash
# Установите Netlify CLI
npm install -g netlify-cli

# Разверните
cd "/Users/higherpower/Desktop/1_Active_Projects/Telegram_Bots/2 website landing 101 personal online blog presence"
netlify deploy --prod
```

**В. Vercel (бесплатно)**
```bash
npm install -g vercel
vercel
```

#### 3. Настроить n8n на VPS (для production)

Если хотите, чтобы n8n работал 24/7:

1. Арендуйте VPS (например, DigitalOcean, Hetzner)
2. Установите n8n:
   ```bash
   npm install -g n8n
   pm2 start n8n
   ```
3. Обновите URL webhook в `script.js`

#### 4. Подключить домен (опционально)

- Купите домен (Namecheap, GoDaddy, REG.RU)
- Настройте DNS на хостинг
- Обновите контакты в лендинге

#### 5. Анонсировать

**Соцсети:**
```
Я запустил(а) новый сайт для [ваша ниша]!

🌐 www.ваш-домен.ru

Здесь вы найдете:
✅ [Услуга 1]
✅ [Услуга 2]
✅ [Услуга 3]

Заходите! Первым 10 клиентам - скидка 20%!
```

**Email рассылка:**
Отправьте письмо вашей базе с анонсом сайта

**Telegram/WhatsApp:**
Личные сообщения близким контактам

---

## 🎯 ДАЛЬНЕЙШИЕ ШАГИ

### Неделя 2-4: Подготовка к мероприятию

Следуйте плану из `docs/EXPERTISE_PACKAGING_PLAN.md`:
- [ ] Написать сценарий выступления
- [ ] Создать слайды
- [ ] Отрепетировать
- [ ] Анонсировать мероприятие

### Месяц 2-3: Масштабирование

- [ ] Запустить платную рекламу (Яндекс.Директ, Google Ads)
- [ ] Создать дополнительные воронки в n8n
- [ ] Собрать отзывы и кейсы
- [ ] Обновить лендинг с реальными результатами

---

## 💡 СОВЕТЫ

### Если застряли:
1. Вернитесь к `README.md` - там есть ссылки на документацию
2. Проверьте `docs/DEVELOPMENT_LOG.md` - что уже сделано
3. Изучите примеры в `docs/REMOTION_GUIDE.md` и `docs/MCP_N8N_SETUP.md`

### Приоритеты:
1. **КРИТИЧНО:** Лендинг + форма захвата лидов (n8n)
2. **ВАЖНО:** План упаковки + сценарий выступления
3. **ОПЦИОНАЛЬНО:** Промо-видео, email-рассылки

### Частые ошибки:
- ❌ Перфекционизм - лучше запустить "хорошо", чем ждать "идеально"
- ❌ Не тестировать форму - ВСЕГДА проверяйте отправку
- ❌ Забывать про мобильную версию - 60% трафика с телефонов

---

## ✅ ЧЕКЛИСТ: Готовность к запуску

- [ ] День 1: Изучил проект и заполнил план
- [ ] День 2: Установил n8n и Remotion
- [ ] День 3: Кастомизировал лендинг
- [ ] День 4: Настроил первый workflow
- [ ] День 5: Создал промо-ролик
- [ ] День 6: Настроил рассылки
- [ ] День 7: Развернул онлайн и анонсировал

---

**Дедлайн:** 7 дней с момента начала  
**Статус:** В процессе

🚀 **Поехали!**
