
<script setup>
import { ref } from 'vue';
const stats = ref([
    { title: 'Active Students', value: '1,200', icon: '👨‍🎓', trend: '+5%', color: 'bg-blue-500' },
    { title: 'Upcoming Exams', value: '15', icon: '📅', trend: '+2', color: 'bg-green-500' },
    { title: 'Success Rate', value: '85%', icon: '📈', trend: '+3.2%', color: 'bg-purple-500' },
    { title: 'Average Score', value: '78%', icon: '🎯', trend: '+1.5%', color: 'bg-orange-500' },
]);
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div v-for="stat in stats"
         :key="stat.title"
         class="bg-white dark:bg-gray-800 rounded-md shadow-md p-6 border border-emerald-100 dark:border-emerald-800 transition-all duration-300 hover:shadow-xl">
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

</template>
