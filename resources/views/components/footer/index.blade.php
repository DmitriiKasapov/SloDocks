{{--
  footer__index

  Footer Component

  Main footer with brand info, navigation, legal links, and contact information.
  Uses container-grid for layout consistency.

  Usage:
  <x-footer />
--}}

<footer class="footer__index gradient-bg-gray-dark text-gray-300 mt-20" role="contentinfo" aria-label="Основная информация сайта">
    <div class="container-grid py-12">
        <div class="content">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                {{-- Brand --}}
                <div class="md:col-span-1">
                    <a
                        href="{{ route('home') }}"
                        class="flex items-center space-x-2 mb-4 w-fit "
                        aria-label="SloDocs - Главная страница"
                    >
                        <div class="w-8 h-8 gradient-brand-icon rounded-lg flex items-center justify-center" aria-hidden="true">
                            <span class="text-white font-bold text-sm">SD</span>
                        </div>
                        <span class="text-xl font-bold text-white">SloDocs</span>
                    </a>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Информационный портал для иностранцев в Словении
                    </p>
                </div>

                {{-- Quick Links --}}
                <nav aria-label="Навигация в подвале">
                    <h3 class="text-sm font-semibold text-white mb-4">Навигация</h3>
                    <ul class="space-y-2 text-sm list-none m-0 p-0">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >
                                Главная
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('test') }}"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >
                                Test
                            </a>
                        </li>
                        <li>
                            <a
                                href="#contact"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >
                                Контакты
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- Legal --}}
                <nav aria-label="Юридические документы">
                    <h3 class="text-sm font-semibold text-white mb-4">Документы</h3>
                    <ul class="space-y-2 text-sm list-none m-0 p-0">
                        <li>
                            <a
                                href="{{ route('legal.terms') }}"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >
                                Условия использования
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('legal.privacy') }}"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >
                                Политика конфиденциальности
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- Contact --}}
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4">Контакты</h3>
                    <ul class="space-y-2 text-sm text-gray-400 list-none m-0 p-0">
                        <li>
                            Email: <a
                                href="mailto:info@slodocs.si"
                                class="text-gray-400 hover:text-amber-400 transition-colors  inline-block"
                            >info@slodocs.si</a>
                        </li>
                        <li>Словения, Любляна</li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="pt-8 border-t border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-sm text-gray-400">
                        &copy; {{ date('Y') }} SloDocs. Все права защищены.
                    </p>
                    <p class="text-xs text-gray-500 max-w-md text-center md:text-right">
                        ⚠️ Материалы носят информационный характер и не являются юридическими услугами
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
