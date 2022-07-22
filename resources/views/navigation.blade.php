<div class="flex items-stretch">
    <div class="flex flex-col justify-center gap-2 px-5 py-3 border-r border-b border-gray-500 border-solid w-[300px]">
        @include('mailbook::logo')
    </div>
    <div class="flex flex-1 items-stretch justify-between border-l border-b border-gray-500 border-solid">
        <div class="flex flex-col px-5 py-3">
            <div class="text-xs font-bold uppercase tracking-wider">
                Subject
            </div>
            <div class="text-xl">
                {{ $subject }}
            </div>
        </div>
        <div class="flex">
            <a href="{{ request()->fullUrlWithQuery(['display' => 'phone']) }}"
               class="flex items-center justify-center p-5 hover:bg-gray-700 transition-colors duration-100"
               aria-label="Phone" title="Phone">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['display' => 'tablet']) }}"
               class="flex items-center justify-center p-5 hover:bg-gray-700 transition-colors duration-100"
               aria-label="Tablet" title="Tablet">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </a>
            <a href="{{ request()->fullUrlWithQuery(['display' => 'desktop']) }}"
               class="flex items-center justify-center p-5 hover:bg-gray-700 transition-colors duration-100"
               aria-label="Desktop" title="Desktop">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </>
            <a href="{{ request()->fullUrl() }}"
               class="flex items-center justify-center hover:bg-gray-700 p-5 transition-colors duration-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </a>
        </div>
    </div>
</div>
