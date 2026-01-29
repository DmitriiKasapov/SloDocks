<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доступ активирован</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
            font-size: 24px;
        }
        .content {
            margin: 20px 0;
        }
        .service-info {
            background: #f8fafc;
            border-left: 4px solid #2563eb;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .service-info h2 {
            margin: 0 0 10px 0;
            font-size: 18px;
            color: #1e293b;
        }
        .service-info p {
            margin: 5px 0;
            color: #64748b;
        }
        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 6px;
            margin: 20px 0;
            font-weight: 600;
            text-align: center;
        }
        .button:hover {
            background: #1d4ed8;
        }
        .warning {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .warning p {
            margin: 5px 0;
            color: #92400e;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }
        .token-info {
            background: #f1f5f9;
            padding: 10px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 12px;
            word-break: break-all;
            margin: 10px 0;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✅ Оплата успешно получена!</h1>
            <p>Ваш доступ к материалам активирован</p>
        </div>

        <div class="content">
            <p>Здравствуйте!</p>

            <p>Спасибо за покупку! Ваш доступ к материалам успешно активирован.</p>

            <div class="service-info">
                <h2>{{ $service->title }}</h2>
                <p><strong>Срок доступа:</strong> до {{ $expiresAt }}</p>
                <p><strong>Ваш email:</strong> {{ $access->email }}</p>
            </div>

            <div style="text-align: center;">
                <a href="{{ $accessUrl }}" class="button">
                    Перейти к материалам
                </a>
            </div>

            <div class="warning">
                <p><strong>⚠️ Важно:</strong></p>
                <p>• Сохраните это письмо — в нём содержится ссылка для доступа к материалам</p>
                <p>• Ссылка действительна до {{ $expiresAt }}</p>
                <p>• Не передавайте ссылку третьим лицам</p>
            </div>

            <p>Если ссылка не работает, скопируйте и вставьте её в адресную строку браузера:</p>
            <div class="token-info">
                {{ $accessUrl }}
            </div>
        </div>

        <div class="footer">
            <p>Это письмо отправлено автоматически. Пожалуйста, не отвечайте на него.</p>
            <p>Если у вас возникли вопросы, свяжитесь с нами через сайт.</p>
            <p style="margin-top: 20px;">
                <a href="{{ route('terms') }}" style="color: #64748b; text-decoration: none;">Условия использования</a> •
                <a href="{{ route('privacy') }}" style="color: #64748b; text-decoration: none;">Политика конфиденциальности</a>
            </p>
        </div>
    </div>
</body>
</html>
