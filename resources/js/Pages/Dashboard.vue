<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Mock data for the cards
const cards = ref([
    { title: 'Total Students', value: '1,200', icon: '👨‍🎓', trend: '+5%' },
    { title: 'Upcoming Exams', value: '15', icon: '📅', trend: '+2' },
    { title: 'Pending Assignments', value: '45', icon: '📚', trend: '-3' },
    { title: 'Average Score', value: '78%', icon: '📊', trend: '+1.5%' },
]);

// Mock data for the notice board
const notices = ref([
    { id: 1, title: 'Midterm Exam Schedule', date: '2023-10-15', content: 'The midterm exam schedule has been updated. Please check the new timetable.' },
    { id: 2, title: 'Assignment Submission Deadline', date: '2023-10-20', content: 'The deadline for assignment submission is approaching. Ensure you submit on time.' },
    { id: 3, title: 'Library Closure', date: '2023-10-22', content: 'The library will be closed for maintenance on 22nd October.' },
]);

// Mock data for the chat box
const messages = ref([
    { id: 1, sender: 'John Doe', message: 'Hey, did you finish the assignment?', time: '10:00 AM' },
    { id: 2, sender: 'Jane Smith', message: 'Not yet, I’m still working on it.', time: '10:05 AM' },
]);

// Enrollment timer
const enrollmentEndDate = new Date('2023-11-01T00:00:00');
const now = ref(new Date());
const timeLeft = ref(calculateTimeLeft());

setInterval(() => {
    now.value = new Date();
    timeLeft.value = calculateTimeLeft();
}, 1000);

function calculateTimeLeft() {
    const difference = enrollmentEndDate - now.value;
    if (difference > 0) {
        return {
            days: Math.floor(difference / (1000 * 60 * 60 * 24)),
            hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
            minutes: Math.floor((difference / 1000 / 60) % 60),
            seconds: Math.floor((difference / 1000) % 60),
        };
    } else {
        return { days: 0, hours: 0, minutes: 0, seconds: 0 };
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class=" sm:px-6 lg:px-8">
                <!-- Cards Section -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div v-for="card in cards" :key="card.title" class="p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ card.title }}</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ card.value }}</p>
                            </div>
                            <span class="text-3xl">{{ card.icon }}</span>
                        </div>
                        <p class="mt-2 text-sm text-green-500">{{ card.trend }} from last month</p>
                    </div>
                </div>

                <!-- Enrollment Timer -->
                <div class="mt-8 p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Enrollment Ends In</h3>
                    <div class="mt-4 flex space-x-4">
                        <div class="text-center">
                            <span class="text-2xl font-bold">{{ timeLeft.days }}</span>
                            <span class="block text-sm text-gray-500">Days</span>
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold">{{ timeLeft.hours }}</span>
                            <span class="block text-sm text-gray-500">Hours</span>
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold">{{ timeLeft.minutes }}</span>
                            <span class="block text-sm text-gray-500">Minutes</span>
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold">{{ timeLeft.seconds }}</span>
                            <span class="block text-sm text-gray-500">Seconds</span>
                        </div>
                    </div>
                </div>

                <!-- Notice Board Section -->
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
    <!-- Notice Board Section -->
    <div class="p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Notice Board</h3>
        <div class="mt-4 space-y-4">
            <div v-for="notice in notices" :key="notice.id" class="p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ notice.date }}</p>
                <p class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ notice.title }}</p>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ notice.content }}</p>
            </div>
        </div>
    </div>

    <!-- Chat Box Section -->
    <div class="p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Chat Box</h3>
        <div class="mt-4 space-y-4">
            <div v-for="message in messages" :key="message.id" class="p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ message.sender }} - {{ message.time }}</p>
                <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ message.message }}</p>
            </div>
        </div>
        <div class="mt-4">
            <input
                type="text"
                class="w-full p-2 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100"
                placeholder="Type a message..."
            />
        </div>
    </div>
</div>

                <!-- Chat Box Section -->

            </div>
        </div>
    </AuthenticatedLayout>
</template>
