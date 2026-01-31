# 🔌 MCP SUPERPOWER И N8N: Настройка и интеграция

**Дата:** 2026-01-24  
**Цель:** Настроить MCP Superpower и n8n-mcp для автоматизации

---

## 📋 ЧТО ТАКОЕ MCP?

**MCP (Model Context Protocol)** — это протокол для подключения AI-агентов к внешним инструментам и сервисам.

### Основные MCP серверы для вашего проекта:

1. **Superpower MCP** — универсальные возможности (файлы, команды, интернет)
2. **n8n-mcp** — управление workflow'ами n8n из AI

---

## 🚀 УСТАНОВКА SUPERPOWER MCP

### Шаг 1: Установка через NPM

```bash
# Глобальная установка
npm install -g @polterguy/mcp-superpower

# Или локально в проект
cd "/Users/higherpower/Desktop/1_Active_Projects/Telegram_Bots/2 website landing 101 personal online blog presence"
npm install @polterguy/mcp-superpower
```

### Шаг 2: Проверка установки

```bash
# Проверить, что установлено
which mcp-server-superpower
# или
npx @polterguy/mcp-superpower --version
```

### Шаг 3: Настройка в Gemini

Если вы используете Gemini Desktop / Claude Desktop, добавьте в конфигурацию:

**MacOS:** `~/Library/Application Support/Claude/claude_desktop_config.json`

```json
{
  "mcpServers": {
    "superpower": {
      "command": "npx",
      "args": ["-y", "@polterguy/mcp-superpower"]
    }
  }
}
```

После перезапустите приложение.

---

## 🔧 N8N-MCP: Установка

### Что такое n8n-mcp?

**n8n-mcp** позволяет AI агентам:
- Создавать новые workflow
- Изменять существующие
- Запускать автоматизации
- Получать данные из n8n

### Установка

```bash
npm install -g @n8n-mcp/server
```

### Настройка

#### 1. Создайте API ключ в n8n

1. Откройте n8n (обычно `http://localhost:5678`)
2. Перейдите в **Settings → API**
3. Создайте новый API ключ
4. Скопируйте ключ

#### 2. Добавьте в конфигурацию MCP

```json
{
  "mcpServers": {
    "n8n": {
      "command": "npx",
      "args": ["-y", "@n8n-mcp/server"],
      "env": {
        "N8N_API_KEY": "ваш-api-ключ",
        "N8N_BASE_URL": "http://localhost:5678"
      }
    }
  }
}
```

---

## 🎯 ИСПОЛЬЗОВАНИЕ В ПРОЕКТЕ

### Сценарии автоматизации через n8n

#### 1. Автоматическая рассылка после мероприятия

**Workflow: "Post-Event Email Sequence"**

**Триггер:** Schedule (каждый день в 10:00)

**Шаги:**
1. **Google Sheets:** Получить список участников
2. **Filter:** Фильтр по дате участия (7 дней назад)
3. **Email (Gmail/SMTP):** Отправить email с благодарностью
4. **Google Sheets:** Пометить как "Email sent"

**Создание через n8n-mcp (AI команда):**
```
Создай workflow в n8n:
- Название: Post-Event Email Sequence
- Триггер: Schedule (ежедневно в 10:00)
- Шаг 1: Google Sheets - читать "Participants"
- Шаг 2: Filter - участники 7 дней назад
- Шаг 3: Gmail - отправить письмо (шаблон внутри)
- Шаг 4: Google Sheets - обновить статус
```

---

#### 2. Генерация персонализированных видео для клиентов

**Workflow: "Video Generator for Clients"**

**Триггер:** Webhook (новый клиент добавлен в CRM)

**Шаги:**
1. **Webhook:** Получить данные клиента (имя, результаты)
2. **Function Node:** Подготовить JSON
3. **Execute Command:** Запуск Remotion CLI
   ```bash
   npx remotion render src/index.ts PersonalizedVideo out/{{$json.clientName}}.mp4 \
     --props='{{$json.toJsonString()}}'
   ```
4. **Google Drive:** Загрузить видео
5. **Gmail:** Отправить клиенту ссылку на видео

---

#### 3. Сбор лидов с сайта → CRM

**Workflow: "Landing Page Leads to CRM"**

**Триггер:** Webhook (форма на сайте)

**Шаги:**
1. **Webhook:** Получить данные формы
2. **Bitrix24 / Airtable / Google Sheets:** Добавить лид
3. **Telegram Bot:** Уведомить вас о новом лиде
4. **Email (автоответ):** Отправить клиенту приветственное письмо

---

## 📊 DASHBOARD: Метрики и аналитика

### Workflow: "Daily Report"

**Триггер:** Schedule (ежедневно в 18:00)

**Что собирает:**
- Количество новых лидов (из Google Sheets)
- Количество продаж (из CRM)
- Открываемость email (из email provider API)
- Активность в соцсетях (из API Instagram/Facebook)

**Вывод:** Telegram-сообщение или Email-отчет

---

## 🔗 ИНТЕГРАЦИЯ MCP С ПРОЕКТОМ

### Использование Superpower MCP

#### Пример 1: Автоматическое обновление сайта

**Команда AI:**
```
Обнови на сайте блок "Ближайшие мероприятия":
- Файл: index.html
- Секция: #upcoming-events
- Добавь: "27 января - Мастер-класс по продажам"
```

**Что делает Superpower MCP:**
1. Читает `index.html`
2. Находит секцию `#upcoming-events`
3. Добавляет новое мероприятие
4. Сохраняет файл

---

#### Пример 2: Создание контента для соцсетей

**Команда AI:**
```
Создай 5 постов для Instagram на основе моего плана упаковки экспертности.
Формат: JSON файл с текстами и хэштегами.
```

**Что делает Superpower MCP:**
1. Читает `docs/EXPERTISE_PACKAGING_PLAN.md`
2. Генерирует контент
3. Сохраняет в `content/instagram-posts.json`

---

## 🛠️ ПРАКТИЧЕСКИЙ ПРИМЕР

### Создание полной автоматизации для мероприятия

#### Задача:
После мероприятия автоматически:
1. Собрать контакты участников
2. Создать персонализированные видео
3. Отправить email с видео
4. Добавить в CRM для дальнейшей работы

#### Решение:

**Файл: `n8n-workflows/post-event-automation.json`**

```json
{
  "name": "Post-Event Automation",
  "nodes": [
    {
      "type": "n8n-nodes-base.trigger",
      "name": "Manual Trigger",
      "position": [250, 300]
    },
    {
      "type": "n8n-nodes-base.googleSheets",
      "name": "Get Participants",
      "parameters": {
        "operation": "read",
        "sheetId": "YOUR_SHEET_ID",
        "range": "Participants!A:E"
      },
      "position": [450, 300]
    },
    {
      "type": "n8n-nodes-base.function",
      "name": "Prepare Video Data",
      "parameters": {
        "functionCode": "return items.map(item => ({\n  clientName: item.json.Name,\n  email: item.json.Email,\n  results: [\n    'Участвовал в мероприятии',\n    'Получил доступ к материалам'\n  ]\n}));"
      },
      "position": [650, 300]
    },
    {
      "type": "n8n-nodes-base.executeCommand",
      "name": "Generate Video",
      "parameters": {
        "command": "npx remotion render src/index.ts PersonalizedVideo out/{{$json.clientName}}.mp4 --props='{{$json.toJsonString()}}'"
      },
      "position": [850, 300]
    },
    {
      "type": "n8n-nodes-base.gmail",
      "name": "Send Email",
      "parameters": {
        "to": "={{$json.email}}",
        "subject": "Спасибо за участие!",
        "message": "Привет, {{$json.clientName}}!\n\nСпасибо за участие. Для вас мы подготовили персональное видео."
      },
      "position": [1050, 300]
    }
  ]
}
```

---

## ✅ ЧЕКЛИСТ: Настройка MCP

### Superpower MCP
- [ ] Установить через NPM
- [ ] Добавить в конфигурацию (claude_desktop_config.json)
- [ ] Перезапустить приложение
- [ ] Проверить доступность (команда AI)

### n8n-mcp
- [ ] Установить через NPM
- [ ] Создать API ключ в n8n
- [ ] Добавить в конфигурацию MCP
- [ ] Протестировать создание workflow через AI

### n8n (если еще не установлен)
- [ ] Установить n8n: `npm install -g n8n`
- [ ] Запустить: `n8n start`
- [ ] Открыть: `http://localhost:5678`
- [ ] Создать аккаунт

---

## 📚 ПОЛЕЗНЫЕ ССЫЛКИ

- [MCP Superpower GitHub](https://github.com/polterguy/mcp-superpower)
- [n8n-mcp Documentation](https://github.com/n8n-io/mcp-server)
- [n8n Documentation](https://docs.n8n.io/)
- [MCP Protocol Spec](https://modelcontextprotocol.io/)

---

## 🎓 ОБУЧЕНИЕ

### Где научиться n8n?
- [n8n Academy](https://academy.n8n.io/)
- [YouTube: n8n workflows](https://www.youtube.com/@n8n-io)
- [Community Forum](https://community.n8n.io/)

### Примеры workflow'ов
- [n8n Workflow Templates](https://n8n.io/workflows)
- Поиск по ключевым словам: "email automation", "lead generation", "crm integration"

---

*Создано: 2026-01-24 02:42 UTC+5*
