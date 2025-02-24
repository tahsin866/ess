<script setup>
import { ref } from 'vue';

const stats = ref([
    {
        title: 'মোট শিক্ষার্থী',
        value: '১,২০০',
        icon: 'user-graduate',
        trend: '+৫%',
        color: 'bg-[#0B4D2F]'
    },
    {
        title: 'আগামী পরীক্ষা',
        value: '১৫',
        icon: 'moon',
        trend: '+২',
        color: 'bg-[#116D45]'
    },
    {
        title: 'সাফল্যের হার',
        value: '৮৫%',
        icon: 'star-and-crescent',
        trend: '+৩.২%',
        color: 'bg-[#0B4D2F]'
    },
    {
        title: 'গড় নম্বর',
        value: '৭৮%',
        icon: 'mosque',
        trend: '+১.৫%',
        color: 'bg-[#116D45]'
    }
]);
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div v-for="stat in stats"
             :key="stat.title"
             class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-2 border-[#116D45]/20 transition-all duration-300 hover:shadow-xl hover:border-[#116D45]/40 relative overflow-hidden">

            <!-- Islamic Pattern Background -->
            <div class="absolute inset-0 opacity-5">
                <div class=" w-full h-full"></div>
            </div>

            <div class="flex justify-between items-start relative">
                <div>
                    <p class="text-sm font-medium text-[#116D45] dark:text-[#4CAF50]">{{ stat.title }}</p>
                    <p class="text-2xl font-bold mt-2 text-[#0B4D2F] dark:text-[#81C784]">{{ stat.value }}</p>
                    <span class="inline-flex items-center text-sm text-[#116D45] mt-2">
                        {{ stat.trend }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </span>
                </div>

                <div :class="`${stat.color} text-white p-3 rounded-full`">
                    <i :class="`fas fa-${stat.icon} text-2xl`"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.islamic-pattern {
    background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 20.5V18H0v-2h20v-2H0v-2h20v-2H0V8h20V6H0V4h20V2H0V0h22v20h2V0h2v20h2V0h2v20h2V0h2v20h2V0h2v20h2v2H20v-1.5zM0 20h2v20H0V20zm4 0h2v20H4V20zm4 0h2v20H8V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20zm4 0h2v20h-2V20z' fill='%23116D45' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
}
</style>
