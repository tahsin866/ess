<script setup>
defineEmits(['close']);
</script>

<template>
  <div class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50">
    <!-- Your existing message modal content -->
     <div v-if="showMessages"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-green-600 to-green-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                বার্তা
            </h3>
            <button @click="showMessages = false" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <!-- Repeat for other messages with similar styling -->
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <div class="p-4 hover:bg-green-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    আ
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">আব্দুল্লাহ</p>
                    <p class="text-xs text-gray-500">সনদ সংক্রান্ত জিজ্ঞাসা...</p>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ৫ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
</template>
