{{-- resources/views/partials/_alerts.blade.php --}} 
@if (session('success')) 
    <div x-data="{ open: true }" 
         x-show="open" 
         x-init="setTimeout(() => open = false, 5000)" 
         x-transition.opacity.duration.500ms 
         class="mb-4 flex items-start gap-3 rounded-md border border-green-300 
                bg-green-50 p-4 text-green-800"> 
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 shrink-0" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M5 13l4 4L19 7"/> 
        </svg> 
        <div class="flex-1 text-sm font-medium">{{ session('success') }}</div> 
        <button type="button" @click="open = false" 
                class="text-green-600 hover:text-green-900" aria-label="Cerrar"> 
            ✕ 
             </button> 
    </div> 
@endif 
  
@if (session('error')) 
    <div x-data="{ open: true }" 
         x-show="open" 
         x-init="setTimeout(() => open = false, 7000)" 
         x-transition.opacity.duration.500ms 
         class="mb-4 flex items-start gap-3 rounded-md border border-red-300 
                bg-red-50 p-4 text-red-800"> 
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 shrink-0" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M6 18L18 6M6 6l12 12"/> 
        </svg> 
        <div class="flex-1 text-sm font-medium">{{ session('error') }}</div> 
        <button type="button" @click="open = false" 
                class="text-red-600 hover:text-red-900" aria-label="Cerrar"> 
            ✕ 
        </button> 
    </div> 
@endif 