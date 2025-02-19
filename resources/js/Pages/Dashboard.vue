<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
// import { Chart } from 'chart.js/auto';

// Enhanced statistics data
const stats = ref([
    { title: 'Active Students', value: '1,200', icon: '👨‍🎓', trend: '+5%', color: 'bg-blue-500' },
    { title: 'Upcoming Exams', value: '15', icon: '📅', trend: '+2', color: 'bg-green-500' },
    { title: 'Success Rate', value: '85%', icon: '📈', trend: '+3.2%', color: 'bg-purple-500' },
    { title: 'Average Score', value: '78%', icon: '🎯', trend: '+1.5%', color: 'bg-orange-500' },
]);

// Enhanced exam schedule
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

// Recent activities
const activities = ref([
    {
        id: 1,
        type: 'exam_created',
        description: 'New exam schedule published for Computer Science',
        time: '2 hours ago',
        icon: '🆕'
    },
    // Add more activities...
]);


</script>

<template>
    <Head title="Islamic Education Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-emerald-800 dark:text-emerald-200 flex items-center gap-3">
                    <i class="fas fa-mosque"></i>
                    মাদরাসা ব্যবস্থাপনা ড্যাশবোর্ড
                </h2>
                <div class="flex space-x-4">
                    <button class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg shadow-md transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-plus-circle"></i>
                        পরীক্ষা তৈরি করুন
                    </button>
                    <button class="px-4 py-2 bg-emerald-100 text-emerald-700 hover:bg-emerald-200 rounded-lg shadow-md transition-all duration-200 flex items-center gap-2">
                        <i class="fas fa-file-alt"></i>
                        রিপোর্ট জেনারেট করুন
                    </button>
                </div>
            </div>
        </template>

        <div class="py-6">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div v-for="stat in stats"
                         :key="stat.title"
                         class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-emerald-100 dark:border-emerald-800 transition-all duration-300 hover:shadow-xl">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-emerald-600 dark:text-emerald-400">{{ stat.title }}</p>
                                <p class="text-2xl font-bold mt-2 text-emerald-800 dark:text-emerald-200">{{ stat.value }}</p>
                                <span class="inline-flex items-center text-sm text-emerald-500 mt-2">
                                    {{ stat.trend }}
                                    <i class="fas fa-arrow-up ml-1"></i>
                                </span>
                            </div>
                            <div :class="`${stat.color} text-white p-3 rounded-xl`">
                                <i :class="`fas fa-${stat.icon} text-2xl`"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Performance Chart -->
                    <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-emerald-100">
                        <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-200 mb-4 flex items-center gap-2">
                            <i class="fas fa-chart-line"></i>
                            পারফরম্যান্স ওভারভিউ
                        </h3>
                        <!-- Chart Component Here -->
                    </div>

                    <!-- Upcoming Exams -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-emerald-100">
                        <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-200 mb-4 flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            আসন্ন পরীক্ষাসমূহ
                        </h3>
                        <div class="space-y-4">
                            <div v-for="exam in upcomingExams"
                                 :key="exam.id"
                                 class="p-4 bg-emerald-50 dark:bg-emerald-900/30 rounded-lg hover:bg-emerald-100 dark:hover:bg-emerald-900/50 transition-all duration-200">
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

                <!-- Recent Activities -->
                <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-emerald-100">
                    <h3 class="text-lg font-bold text-emerald-800 dark:text-emerald-200 mb-4 flex items-center gap-2">
                        <i class="fas fa-history"></i>
                        সাম্প্রতিক কার্যক্রম
                    </h3>
                    <div class="flow-root">
                        <ul class="-mb-8">
                            <li v-for="activity in activities" :key="activity.id" class="relative pb-8">
                                <div class="relative flex items-start space-x-3">
                                    <div class="relative px-1">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600">
                                            <i :class="`fas fa-${activity.icon}`"></i>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm text-emerald-800 dark:text-emerald-200">{{ activity.description }}</p>
                                        <p class="text-sm text-emerald-600 dark:text-emerald-400">{{ activity.time }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<style scoped>
.btn-primary {
    @apply px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200;
}

.btn-secondary {
    @apply px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200;
}
</style>
