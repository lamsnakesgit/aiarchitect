# 🔌 MCP СЕРВЕРЫ: Remotion + Notion + n8n

**Дата:** 2026-01-24  
**Статус:** ✅ Установлены

---

## ✅ УСТАНОВЛЕННЫЕ MCP

### 1. @remotion/mcp (Видео генерация)

**Расположение:** `/opt/homebrew/bin/remotion-mcp`  
**Версия:** 4.0.409  
**Стоимость:** 🆓 БЕСПЛАТНО (MIT лицензия)

**Что умеет:**
- Создавать видео-проекты
- Генерировать код для Remotion
- Рендерить видео
- Управлять композициями

**Документация:** https://www.remotion.dev/docs/ai/mcp

### 2. @notionhq/notion-mcp-server (CRM)

**Расположение:** `/opt/homebrew/bin/notion-mcp-server`  
**Версия:** 2.0.0  
**Стоимость:** 🆓 БЕСПЛАТНО

**Что умеет:**
- Создавать страницы в Notion
- Работать с базами данных (CRM)
- Обновлять записи
- Искать информацию

**Требуется:** Notion API ключ

---

## ⚙️ НАСТРОЙКА

### Шаг 1: Получить Notion API ключ

1. Зайдите на https://www.notion.so/my-integrations
2. Нажмите "New integration"
3. Название: "My CRM Bot"
4. Workspace: выберите ваш
5. Capabilities: Read + Write + Update
6. Скопируйте "Internal Integration Token"

### Шаг 2: Создать базу данных в Notion

1. Создайте новую страницу в Notion
2. Добавьте базу данных "Leads" с полями:
   - Имя (Title)
   - Email (Email)
   - Телефон (Phone)
   - Статус (Select: New, Contact, Offer, Sale, Lost)
   - Источник (Select: Landing, Instagram, Telegram, Other)
   - Дата (Date)

3. Подключите интеграцию:
   - В меню базы (⋯) → Connections → выберите вашу интеграцию

### Шаг 3: Конфигурация MCP

Файл `mcp-config.json` уже создан!

**Для Claude Desktop / Cursor:**
1. Откройте настройки → MCP
2. Добавьте содержимое `mcp-config.json`
3. Замените `YOUR_NOTION_API_KEY_HERE` на ваш ключ

**Для ручного запуска:**
```bash
# Notion MCP
NOTION_API_KEY=secret_xxx notion-mcp-server

# Remotion MCP
remotion-mcp
```

---

## 🎬 ИСПОЛЬЗОВАНИЕ REMOTION MCP

### Пример команды для AI:

```
Создай Remotion проект для промо-видео 60 секунд:
- Логотип и имя эксперта
- 3 результата клиентов (числа)
- Призыв к действию
- Размер: 1080x1920 (Instagram Stories)
- FPS: 30
```

### Что Remotion MCP сделает:
1. Создаст структуру проекта
2. Сгенерирует React-компоненты
3. Настроит композиции
4. Подготовит к рендерингу

---

## 📊 ИСПОЛЬЗОВАНИЕ NOTION MCP

### Пример команды для AI:

```
Добавь нового лида в базу Leads:
- Имя: Иван Петров
- Email: ivan@example.com
- Телефон: +79991234567
- Статус: New
- Источник: Landing
```

### Что Notion MCP сделает:
1. Подключится к вашему Notion
2. Найдет базу "Leads"
3. Создаст новую запись
4. Заполнит все поля

---

## 🔄 ИНТЕГРАЦИЯ С N8N

### Workflow: Форма → Notion (через MCP)

```
1. Webhook (форма с сайта)
   ↓
2. HTTP Request (к Notion API)
   - URL: https://api.notion.com/v1/pages
   - Headers: Authorization: Bearer secret_xxx
   - Body: JSON с данными формы
   ↓
3. Telegram (уведомление)
```

### Или через Notion MCP напрямую:

```
1. Webhook (форма)
   ↓
2. AI Agent (с Notion MCP)
   - "Добавь лида: {{$json.name}}, {{$json.email}}"
   ↓
3. Telegram уведомление
```

---

## 💰 СТОИМОСТЬ

| Сервис | Стоимость |
|--------|-----------|
| @remotion/mcp | 🆓 Бесплатно |
| @notionhq/notion-mcp-server | 🆓 Бесплатно |
| Notion (базовая версия) | 🆓 Бесплатно |
| Remotion (рендеринг локально) | 🆓 Бесплатно |
| Remotion Lambda (облако) | $0.0005 / видео |

**Итого для старта: БЕСПЛАТНО** ✅

---

## 🛠️ КОМАНДЫ

### Проверить установку:
```bash
which remotion-mcp notion-mcp-server
# Должно вернуть пути
```

### Запустить Remotion MCP:
```bash
remotion-mcp
# Запустится MCP сервер
```

### Запустить Notion MCP:
```bash
NOTION_API_KEY=secret_xxx notion-mcp-server
# Или с env файлом
```

---

## 📚 ДОКУМЕНТАЦИЯ

- **Remotion MCP:** https://www.remotion.dev/docs/ai/mcp
- **Notion API:** https://developers.notion.com/
- **Notion MCP:** https://github.com/makenotion/notion-mcp-server

---

## ✅ ЧТО ДАЛЬШЕ

1. [x] MCP серверы установлены
2. [ ] Получить Notion API ключ
3. [ ] Создать базы данных в Notion (Leads, Сделки, Продукты)
4. [ ] Обновить `mcp-config.json` с реальным ключом
5. [ ] Настроить n8n workflow: форма → Notion
6. [ ] Протестировать Remotion MCP для создания видео

---

*Создано: 2026-01-24*
