<script setup>
defineEmits(['close']);
</script>

<template>
  <div class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50">
    <!-- Your existing notification modal content -->
     <div v-if="showNotifications"
    style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
    class="fixed top-16 right-4 w-96 bg-white rounded-lg shadow-2xl border border-gray-200 z-50 transform transition-all duration-300 ease-in-out">
    <div class="p-4 border-b border-gray-200 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .417-.152.816-.405 1.123L4 17h5m6 0a3 3 0 11-6 0m6 0H9" />
                </svg>
                নোটিফিকেশন
            </h3>
            <button @click="showNotifications = false" class="text-white hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div class="max-h-[calc(100vh-200px)] overflow-y-auto">
        <div class="p-4 hover:bg-blue-50 border-b cursor-pointer transition-colors duration-200">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-blue-600 rounded-full ring-4 ring-blue-100"></div>
                <div>
                    <p class="text-sm font-medium text-gray-800">নতুন সনদ আবেদন #২৩৪৫</p>
                    <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ২ মিনিট আগে
                    </p>
                </div>
            </div>
        </div>
        <!-- Repeat for other notifications with similar styling -->
    </div>
</div>
  </div>
</template>
