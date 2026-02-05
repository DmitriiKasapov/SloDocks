

<?php
    // Navigation items configuration
    $navItems = [
        [
            'label' => 'Главная',
            'route' => 'home',
            'active' => request()->routeIs('home'),
        ],
        [
            'label' => 'Помощь',
            'url' => '#help',
            'active' => false,
        ],
        [
            'label' => 'Контакты',
            'url' => '#contact',
            'active' => false,
        ],
    ];
?>

<nav x-data="{ mobileMenuOpen: false }" class="flex items-center" role="navigation" aria-label="Основная навигация">
    
    <ul class="hidden md:flex items-center space-x-1 list-none m-0 p-0">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <li>
                <a
                    href="<?php echo e(isset($item['route']) ? route($item['route']) : ($item['url'] ?? '#')); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block px-4 py-2 text-sm font-medium transition-colors border-b-2',
                        'text-amber-600 border-amber-600' => $item['active'],
                        'text-gray-700 border-transparent hover:text-amber-600' => !$item['active'],
                    ]); ?>"
                    <?php if($item['active']): ?>
                        aria-current="page"
                    <?php endif; ?>
                >
                    <?php echo e($item['label']); ?>

                </a>
            </li>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </ul>

    
    <div class="md:hidden">
        <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-700 hover:text-amber-600 hover:bg-amber-50 transition-colors"
            :class="{ 'focus:outline-none focus:ring-2 focus:ring-amber-600 focus:ring-offset-2': mobileMenuOpen, 'focus:outline-none': !mobileMenuOpen }"
            :aria-expanded="mobileMenuOpen"
            aria-label="Открыть меню"
        >
            
            <svg
                x-show="!mobileMenuOpen"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            
            <svg
                x-show="mobileMenuOpen"
                x-cloak
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="mobileMenuOpen = false"
        x-cloak
        class="absolute top-16 right-4 left-4 md:hidden bg-white rounded-lg shadow-lg border border-gray-200 z-50"
    >
        <ul class="list-none m-0 p-5">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                <li>
                    <a
                        href="<?php echo e(isset($item['route']) ? route($item['route']) : ($item['url'] ?? '#')); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block px-5 py-3 text-sm font-medium transition-colors border-l-4',
                            'text-amber-600 border-amber-600 bg-amber-50' => $item['active'],
                            'text-gray-700 border-transparent hover:bg-amber-50 hover:text-amber-600' => !$item['active'],
                        ]); ?>"
                        <?php if($item['active']): ?>
                            aria-current="page"
                        <?php endif; ?>
                        @click="mobileMenuOpen = false"
                    >
                        <?php echo e($item['label']); ?>

                    </a>
                </li>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
    </div>
</nav>


<style>
    [x-cloak] {
        display: none !important;
    }
</style>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/header/navigation.blade.php ENDPATH**/ ?>