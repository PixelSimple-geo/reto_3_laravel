<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estadísticas') }}
        </h2>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-600">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>

    {!! $chart->script() !!}
</x-app-layout>
