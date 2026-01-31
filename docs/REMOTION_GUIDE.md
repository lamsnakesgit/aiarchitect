# 🎬 REMOTION: Установка и использование

**Дата:** 2026-01-24  
**Цель:** Создание профессиональных видео с помощью React и Remotion

---

## 📋 Описание

**Remotion** — это фреймворк для создания видео с помощью React. Вы пишете код, как обычное React-приложение, а Remotion рендерит его в видео.

### Преимущества:
- ✅ Программируемые видео (полный контроль)
- ✅ Динамический контент (данные из API, JSON)
- ✅ Переиспользуемые компоненты
- ✅ Профессиональное качество
- ✅ Автоматизация через скрипты

---

## 🚀 УСТАНОВКА

### Шаг 1: Проверка Node.js

```bash
node --version
# Должна быть версия 16 или выше
# Если нет, установите: https://nodejs.org/
```

### Шаг 2: Создание нового проекта Remotion

```bash
# Переход в директорию проекта
cd "/Users/higherpower/Desktop/1_Active_Projects/Telegram_Bots/2 website landing 101 personal online blog presence"

# Создание папки для видео
npx create-video@latest video-project

# Выберите шаблон:
# - Blank - пустой проект
# - Hello World - пример с анимацией
# - TikTok/Instagram - социальные сети
```

### Шаг 3: Запуск проекта

```bash
cd video-project
npm start

# Откроется браузер с редактором Remotion
# URL: http://localhost:3000
```

---

## 📁 СТРУКТУРА ПРОЕКТА REMOTION

```
video-project/
├── src/
│   ├── Root.tsx           # Главный файл (настройка видео)
│   ├── HelloWorld/        # Пример компонента
│   │   ├── index.tsx      # Основной компонент
│   │   └── ...            # Стили и ресурсы
│   └── Video.tsx          # Композиция видео
├── public/
│   └── logo.png           # Статичные ресурсы (изображения, аудио)
├── package.json
└── remotion.config.ts     # Конфигурация Remotion
```

---

## 🎨 СОЗДАНИЕ ПРОМО-РОЛИКА ДЛЯ МЕРОПРИЯТИЯ

### Сценарий (60 секунд, 30 FPS = 1800 кадров)

**Структура:**
1. **[0-10 сек]** Логотип + имя эксперта (300 кадров)
2. **[10-30 сек]** Результаты клиентов (600 кадров)
3. **[30-50 сек]** Услуги и преимущества (600 кадров)
4. **[50-60 сек]** Призыв к действию (300 кадров)

---

### Пример кода: Простое промо-видео

**Файл: `src/PromoVideo.tsx`**

```tsx
import {AbsoluteFill, Audio, Img, interpolate, Sequence, useCurrentFrame, useVideoConfig} from 'remotion';

export const PromoVideo: React.FC = () => {
  const frame = useCurrentFrame();
  const {fps} = useVideoConfig();

  // Анимация появления
  const opacity = interpolate(frame, [0, 30], [0, 1], {
    extrapolateRight: 'clamp',
  });

  // Анимация масштаба
  const scale = interpolate(frame, [0, 30], [0.8, 1], {
    extrapolateRight: 'clamp',
  });

  return (
    <AbsoluteFill style={{backgroundColor: '#1a1a2e'}}>
      {/* Фоновая музыка */}
      <Audio src="https://example.com/background-music.mp3" />

      {/* Сцена 1: Логотип (0-300 кадров = 0-10 сек) */}
      <Sequence from={0} durationInFrames={300}>
        <AbsoluteFill style={{
          justifyContent: 'center',
          alignItems: 'center',
          opacity,
          transform: `scale(${scale})`,
        }}>
          <h1 style={{color: '#fff', fontSize: 80, fontWeight: 'bold'}}>
            Ваше Имя
          </h1>
          <p style={{color: '#aaa', fontSize: 30}}>Эксперт в [вашей нише]</p>
        </AbsoluteFill>
      </Sequence>

      {/* Сцена 2: Результаты (300-900 кадров = 10-30 сек) */}
      <Sequence from={300} durationInFrames={600}>
        <ResultsScene frame={frame - 300} />
      </Sequence>

      {/* Сцена 3: Услуги (900-1500 кадров = 30-50 сек) */}
      <Sequence from={900} durationInFrames={600}>
        <ServicesScene frame={frame - 900} />
      </Sequence>

      {/* Сцена 4: CTA (1500-1800 кадров = 50-60 сек) */}
      <Sequence from={1500} durationInFrames={300}>
        <CTAScene frame={frame - 1500} />
      </Sequence>
    </AbsoluteFill>
  );
};

// Компонент: Результаты клиентов
const ResultsScene: React.FC<{frame: number}> = ({frame}) => {
  const opacity = interpolate(frame, [0, 30], [0, 1], {extrapolateRight: 'clamp'});

  return (
    <AbsoluteFill style={{justifyContent: 'center', alignItems: 'center', opacity}}>
      <div style={{textAlign: 'center', color: '#fff'}}>
        <h2 style={{fontSize: 60, marginBottom: 40}}>Результаты клиентов:</h2>
        <div style={{fontSize: 40, lineHeight: 1.8}}>
          <p>✅ +300% роста продаж</p>
          <p>✅ 50+ успешных проектов</p>
          <p>✅ 98% удовлетворенных клиентов</p>
        </div>
      </div>
    </AbsoluteFill>
  );
};

// Компонент: Услуги
const ServicesScene: React.FC<{frame: number}> = ({frame}) => {
  const opacity = interpolate(frame, [0, 30], [0, 1], {extrapolateRight: 'clamp'});

  return (
    <AbsoluteFill style={{justifyContent: 'center', alignItems: 'center', opacity}}>
      <div style={{textAlign: 'center', color: '#fff'}}>
        <h2 style={{fontSize: 60, marginBottom: 40}}>Что вы получите:</h2>
        <div style={{fontSize: 35, lineHeight: 1.8}}>
          <p>🎯 Пошаговая стратегия</p>
          <p>📊 Готовые инструменты</p>
          <p>💼 Поддержка 24/7</p>
        </div>
      </div>
    </AbsoluteFill>
  );
};

// Компонент: Призыв к действию
const CTAScene: React.FC<{frame: number}> = ({frame}) => {
  const opacity = interpolate(frame, [0, 20], [0, 1], {extrapolateRight: 'clamp'});
  const scale = interpolate(frame, [0, 20, 280, 300], [0.8, 1, 1, 1.1], {extrapolateRight: 'clamp'});

  return (
    <AbsoluteFill style={{justifyContent: 'center', alignItems: 'center', opacity}}>
      <div style={{textAlign: 'center', color: '#fff', transform: `scale(${scale})`}}>
        <h2 style={{fontSize: 70, marginBottom: 30}}>Записывайтесь сейчас!</h2>
        <p style={{fontSize: 40, color: '#4CAF50'}}>📞 +7 (XXX) XXX-XX-XX</p>
        <p style={{fontSize: 40, color: '#4CAF50'}}>🌐 www.ваш-сайт.ru</p>
      </div>
    </AbsoluteFill>
  );
};
```

---

### Регистрация композиции

**Файл: `src/Root.tsx`**

```tsx
import {Composition} from 'remotion';
import {PromoVideo} from './PromoVideo';

export const RemotionRoot: React.FC = () => {
  return (
    <>
      <Composition
        id="PromoVideo"
        component={PromoVideo}
        durationInFrames={1800} // 60 секунд * 30 FPS
        fps={30}
        width={1920}
        height={1080}
      />
    </>
  );
};
```

---

## 🎬 РЕНДЕРИНГ ВИДЕО

### В интерфейсе Remotion

1. Откройте `http://localhost:3000`
2. Выберите композицию **PromoVideo**
3. Нажмите "Render" в правом верхнем углу
4. Выберите формат: MP4
5. Нажмите "Render video"

### Из командной строки

```bash
# Рендер в MP4
npx remotion render src/index.ts PromoVideo out/promo.mp4

# С высоким качеством
npx remotion render src/index.ts PromoVideo out/promo.mp4 --quality 90

# С кастомными настройками
npx remotion render src/index.ts PromoVideo out/promo.mp4 \
  --width 1920 \
  --height 1080 \
  --fps 30 \
  --codec h264
```

---

## 🔧 ИНТЕГРАЦИЯ С N8N

### Автоматизация создания видео через n8n

**Сценарий:** Создание персонализированных видео для клиентов

#### Шаг 1: Создание JSON с данными клиента

```json
{
  "clientName": "Иван Иванов",
  "results": [
    "Увеличил продажи на 250%",
    "Сэкономил 30 часов в месяц",
    "Автоматизировал 80% процессов"
  ],
  "contactEmail": "ivan@example.com"
}
```

#### Шаг 2: Передача данных в Remotion через props

**Файл: `src/PersonalizedVideo.tsx`**

```tsx
import {AbsoluteFill, useCurrentFrame, interpolate} from 'remotion';

interface Props {
  clientName: string;
  results: string[];
}

export const PersonalizedVideo: React.FC<Props> = ({clientName, results}) => {
  const frame = useCurrentFrame();
  const opacity = interpolate(frame, [0, 30], [0, 1], {extrapolateRight: 'clamp'});

  return (
    <AbsoluteFill style={{backgroundColor: '#1a1a2e', justifyContent: 'center', alignItems: 'center'}}>
      <div style={{opacity, textAlign: 'center', color: '#fff'}}>
        <h1 style={{fontSize: 70}}>Привет, {clientName}!</h1>
        <div style={{fontSize: 40, marginTop: 50}}>
          {results.map((result, i) => (
            <p key={i}>✅ {result}</p>
          ))}
        </div>
      </div>
    </AbsoluteFill>
  );
};
```

#### Шаг 3: Рендер через CLI с параметрами

```bash
# Создание видео с JSON-данными
npx remotion render src/index.ts PersonalizedVideo out/ivan.mp4 \
  --props='{"clientName":"Иван Иванов","results":["Результат 1","Результат 2"]}'
```

#### Шаг 4: Workflow в n8n

1. **Trigger:** Webhook (получение данных клиента)
2. **Function Node:** Формирование JSON
3. **Execute Command:** Запуск Remotion CLI
4. **Move File:** Перемещение видео в облако (Google Drive / S3)
5. **Send Email:** Отправка видео клиенту

---

## 📦 ГОТОВЫЕ ШАБЛОНЫ

### 1. Отзыв клиента (карточка)

```tsx
export const TestimonialCard: React.FC<{name: string; text: string; photo: string}> = ({name, text, photo}) => {
  const frame = useCurrentFrame();
  const opacity = interpolate(frame, [0, 30], [0, 1]);

  return (
    <AbsoluteFill style={{justifyContent: 'center', alignItems: 'center', backgroundColor: '#fff'}}>
      <div style={{opacity, textAlign: 'center', maxWidth: 800, padding: 50}}>
        <Img src={photo} style={{width: 150, height: 150, borderRadius: '50%', marginBottom: 30}} />
        <p style={{fontSize: 30, fontStyle: 'italic', color: '#333'}}>"{text}"</p>
        <p style={{fontSize: 25, fontWeight: 'bold', color: '#000', marginTop: 20}}>— {name}</p>
      </div>
    </AbsoluteFill>
  );
};
```

### 2. Статистика (числа)

```tsx
export const StatsCounter: React.FC<{label: string; target: number}> = ({label, target}) => {
  const frame = useCurrentFrame();
  const count = interpolate(frame, [0, 60], [0, target], {extrapolateRight: 'clamp'});

  return (
    <div style={{textAlign: 'center', color: '#fff'}}>
      <h1 style={{fontSize: 100, margin: 0}}>{Math.floor(count)}</h1>
      <p style={{fontSize: 40, color: '#aaa'}}>{label}</p>
    </div>
  );
};
```

---

## 🎭 СОВЕТЫ ПО ДИЗАЙНУ

### Цветовые схемы
- **Премиум:** #1a1a2e (темный) + #FFD700 (золотой)
- **Современный:** #0F2027 + #2C5364 (градиент)
- **Энергичный:** #FF416C + #FF4B2B (красно-оранжевый)

### Шрифты (Google Fonts)
```tsx
import '@fontsource/inter';
import '@fontsource/poppins';

const style = {fontFamily: 'Poppins, sans-serif'};
```

### Анимации
- **Плавное появление:** `interpolate(frame, [0, 30], [0, 1])`
- **Пружинка:** `spring({frame, fps, config: {damping: 200}})`
- **Скольжение:** `interpolate(frame, [0, 60], [-100, 0])`

---

## 🐛 РЕШЕНИЕ ПРОБЛЕМ

### Ошибка: "Cannot find module"
```bash
npm install
npm start
```

### Видео не рендерится
```bash
# Проверить версию Node.js
node --version  # Должна быть 16+

# Переустановить зависимости
rm -rf node_modules package-lock.json
npm install
```

### Нет звука в видео
- Убедитесь, что аудиофайл в формате MP3 или WAV
- Проверьте, что компонент `<Audio>` находится внутри `<AbsoluteFill>`

---

## 📚 РЕСУРСЫ

- [Официальная документация](https://www.remotion.dev/docs)
- [Примеры шаблонов](https://www.remotion.dev/showcase)
- [Discord сообщество](https://remotion.dev/discord)
- [YouTube канал](https://www.youtube.com/@remotion-dev)

---

## ✅ ЧЕКЛИСТ: Создание промо-ролика

- [ ] Установить Node.js 16+
- [ ] Создать проект Remotion
- [ ] Подготовить контент (текст, изображения, музыка)
- [ ] Создать компоненты видео
- [ ] Настроить композицию (длительность, FPS)
- [ ] Протестировать в браузере
- [ ] Отрендерить финальное видео
- [ ] Загрузить на платформу (YouTube, соцсети)

---

*Создано: 2026-01-24 02:42 UTC+5*
