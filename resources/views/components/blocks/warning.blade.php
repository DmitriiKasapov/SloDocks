{{--
  blocks__warning

  Warning Block Component

  Static disclaimer block for the site

  @param string $class - Additional CSS classes (optional)

  Example:
  <x-blocks.warning />
--}}

@props([
  'class' => '',
])

<section class="blocks__warning container-grid my-7.5 md:my-15 {{ $class }}" aria-label="Warning disclaimer">
    <div class="content">
        <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-sm">
            <!-- Icon and Title in one row -->
            <div class="flex items-center gap-4 mb-4">
                <div class="shrink-0">
                    <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-amber-900">
                    Важное уведомление
                </h3>
            </div>

            <!-- Text and list below -->
            <div class="text-amber-800 space-y-2">
                <p>
                    <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                </p>
                <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                    <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                    <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    <li>Мы не можем гарантировать результат применения информации в каждом конкретном случае</li>
                    <li>В сложных или нестандартных ситуациях рекомендуется обращаться к квалифицированным специалистам</li>
                    <li>Информация регулярно обновляется, однако законодательство может меняться</li>
                </ul>
                <p class="mt-4 text-sm">
                    Используя материалы сайта, вы подтверждаете, что понимаете их информационный характер.
                </p>
            </div>
        </div>
    </div>
</section>
