<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Chart } from 'chart.js/auto';

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

// Performance metrics
const performanceData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
        label: 'Average Scores',
        data: [65, 72, 78, 75, 82, 85],
        borderColor: '#6366f1',
        tension: 0.4
    }]
};

onMounted(() => {
    const ctx = document.getElementById('performanceChart');
    new Chart(ctx, {
        type: 'line',
        data: performanceData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>

<template>
    <Head title="Exam Management Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center ">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    Exam Management Dashboard
                </h2>
                <div class="flex space-x-4">
                    <button class="btn-primary">Create Exam</button>
                    <button class="btn-secondary">Generate Reports</button>
                </div>
            </div>
        </template>

        <div class="py-6">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div v-for="stat in stats"
                         :key="stat.title"
                         class="bg-white dark:bg-gray-800 rounded-md shadow-sm p-6 transition-all duration-300 hover:shadow-lg">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ stat.title }}</p>
                                <p class="text-2xl font-bold mt-2 text-gray-900 dark:text-gray-100">{{ stat.value }}</p>
                                <span class="inline-flex items-center text-sm text-green-500 mt-2">
                                    {{ stat.trend }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                                    </svg>
                                </span>
                            </div>
                            <div :class="`${stat.color} text-white p-3 rounded-lg`">
                                <span class="text-2xl">{{ stat.icon }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Performance Chart -->
                    <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Performance Overview</h3>
                        <canvas id="performanceChart"></canvas>
                    </div>

                    <!-- Upcoming Exams -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Upcoming Exams</h3>
                        <div class="space-y-4">
                            <div v-for="exam in upcomingExams"
                                 :key="exam.id"
                                 class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900 dark:text-gray-100">{{ exam.subject }}</h4>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ exam.date }} at {{ exam.time }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Duration: {{ exam.duration }}</p>
                                    </div>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                        {{ exam.status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Recent Activities</h3>
                    <div class="flow-root">
                        <ul class="-mb-8">
                            <li v-for="activity in activities" :key="activity.id" class="relative pb-8">
                                <div class="relative flex items-start space-x-3">
                                    <div class="relative px-1">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                            {{ activity.icon }}
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm text-gray-900 dark:text-gray-100">{{ activity.description }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ activity.time }}</p>
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
