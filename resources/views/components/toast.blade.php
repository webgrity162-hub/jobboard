@props(['type' => 'success', 'message'])

@php
    $baseClasses = "toast-notification flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-xl border-l-4 transform transition-all duration-300 translate-x-full opacity-0";
    $typeClasses = $type === 'success' 
        ? "border-green-500" 
        : "border-red-500";
    
    $iconClasses = $type === 'success'
        ? "text-green-500 bg-green-100"
        : "text-red-500 bg-red-100";
    
    $icon = $type === 'success' 
        ? "fa-circle-check" 
        : "fa-circle-exclamation";
@endphp

<div class="{{ $baseClasses }} {{ $typeClasses }}" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 {{ $iconClasses }} rounded-lg">
        <i class="fa-solid {{ $icon }}"></i>
    </div>
    <div class="ml-3 text-sm font-normal pr-4">{{ $message }}</div>
    <button type="button" onclick="closeToast(this)" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 transition-colors" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
