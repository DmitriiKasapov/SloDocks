@extends('layouts.app')

@section('title', 'Политика конфиденциальности')
@section('meta_description', 'Политика конфиденциальности информационного портала SloDocs')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Политика конфиденциальности</h1>

    <div class="prose prose-lg max-w-none">
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. Общие положения</h2>
            <p class="text-gray-700 mb-4">
                Настоящая Политика конфиденциальности описывает, как мы собираем, используем и защищаем вашу личную информацию.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Какие данные мы собираем</h2>
            <p class="text-gray-700 mb-4">
                При использовании сервиса мы собираем:
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                <li>Email-адрес (для предоставления доступа к материалам)</li>
                <li>Информацию об оплате (через платёжный провайдер Stripe)</li>
                <li>Техническую информацию (IP-адрес, браузер)</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Как мы используем данные</h2>
            <p class="text-gray-700 mb-4">
                Ваши данные используются для:
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                <li>Предоставления доступа к платным материалам</li>
                <li>Отправки уведомлений об оплате и окончании доступа</li>
                <li>Улучшения качества сервиса</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Безопасность данных</h2>
            <p class="text-gray-700 mb-4">
                Платёжные данные обрабатываются через защищённый платёжный провайдер <strong>Stripe</strong>.
            </p>
            <p class="text-gray-700 mb-4">
                Мы не храним данные банковских карт на наших серверах.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Передача данных третьим лицам</h2>
            <p class="text-gray-700 mb-4">
                Мы не передаём ваши личные данные третьим лицам, за исключением:
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                <li>Платёжного провайдера (Stripe) для обработки платежей</li>
                <li>Случаев, предусмотренных законодательством</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Cookies</h2>
            <p class="text-gray-700 mb-4">
                Мы используем cookies для обеспечения работы сайта и улучшения пользовательского опыта.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">7. Ваши права</h2>
            <p class="text-gray-700 mb-4">
                Вы имеете право:
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                <li>Запросить информацию о хранящихся данных</li>
                <li>Запросить удаление ваших данных</li>
                <li>Отозвать согласие на обработку данных</li>
            </ul>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">8. Изменения в политике</h2>
            <p class="text-gray-700 mb-4">
                Мы оставляем за собой право изменять настоящую Политику конфиденциальности.
            </p>
            <p class="text-gray-700 mb-4">
                Актуальная версия всегда доступна на этой странице.
            </p>
        </section>
    </div>
</div>
@endsection
