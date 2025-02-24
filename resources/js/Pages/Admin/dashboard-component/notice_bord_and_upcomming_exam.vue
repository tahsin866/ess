<script setup>
import { ref } from 'vue';

const upcomingExams = ref([
    {
        id: 1,
        subject: 'Advanced Mathematics',
        date: '2023-10-25',
        time: '09:00 AM',
        duration: '3 hours',
        students: 45,
        status: 'Upcoming'
    },
    // Add more exams...
]);
</script>

<template>
       <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Performance Chart -->
                    <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-md shadow-md p-6 border border-emerald-100">
                        <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-200 mb-4 flex items-center gap-2">
                            <i class="fas fa-chart-line"></i>
                            পারফরম্যান্স ওভারভিউ
                        </h3>
                        <!-- Chart Component Here -->
                    </div>

                    <!-- Upcoming Exams -->
                    <div class="bg-white dark:bg-gray-800 rounded-md shadow-md p-6 border border-emerald-100">
                        <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-200 mb-4 flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            আসন্ন পরীক্ষাসমূহ
                        </h3>
                        <div class="space-y-4">
                            <div v-for="exam in upcomingExams"
                                 :key="exam.id"
                                 class="p-4 bg-emerald-50 dark:bg-emerald-900/30 rounded-md hover:bg-emerald-100 dark:hover:bg-emerald-900/50 transition-all duration-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-emerald-800 dark:text-emerald-200">{{ exam.subject }}</h4>
                                        <p class="text-sm text-emerald-600 dark:text-emerald-400">{{ exam.date }} at {{ exam.time }}</p>
                                        <p class="text-sm text-emerald-600 dark:text-emerald-400">সময়কাল: {{ exam.duration }}</p>
                                    </div>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-800">
                                        {{ exam.status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</template>
