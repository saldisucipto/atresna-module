<x-module-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="sm:rounded-lg">
        {{-- <x-jet-welcome /> --}}
        @if (Session::has('menyapa'))
            <x-greeting></x-greeting>
        @endif
    </div>
</x-module-layout>
