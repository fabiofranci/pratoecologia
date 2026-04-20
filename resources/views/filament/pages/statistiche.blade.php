<x-filament::page>
    <div class="space-y-6">

        <div>
            <h2 class="text-xl font-bold tracking-tight">Statistiche QR</h2>
            <p class="text-sm text-gray-600">
                Panoramica accessi e click delle landing QR.
            </p>
        </div>

        @livewire(\App\Livewire\StatsOverview::class)

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @livewire(\App\Livewire\DeviceChart::class)
            @livewire(\App\Livewire\OsChart::class)
        </div>

        @livewire(\App\Livewire\MonthlyClicksChart::class)

    </div>
</x-filament::page>