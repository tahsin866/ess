<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'

const desserts = [
  {
    dessert: 'Frozen Yogurt',
    calories: 159,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
]

const search = ref('')
const items = []
</script>

<template>
 <AuthenticatedLayout>
     <div class="mb-8 mx-5 mt-5">
    <div class="bg-white rounded-md shadow-md">
      <!-- Header Section -->
      <header class="bg-[#243b55] p-3 rounded-t-md">
        <div class="flex justify-between items-center">
          <h2 class="text-white text-xl font-medium">
            ৪৮তম কেন্দ্রীয় পরীক্ষা: মুতাওয়াসসিতা
          </h2>

          <div class="flex gap-4">
<Link
  :href="route('students_registration.new_stu_reg_Form')"
  class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors duration-200 flex items-center gap-2"
>
  <!-- Plus Icon -->
  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
  </svg>

  <span>নতুন ছাত্র নিবন্ধন</span>
</Link>


            <button class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
              নিবন্ধন তালিকা
              <i class="ml-2 ri-list-unordered"></i>
            </button>
          </div>
        </div>
      </header>

      <!-- Search Section -->
      <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
          <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="" disabled selected>মারহালা নির্বাচন করুন</option>
          </select>

          <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="" disabled selected>পাশের সন নির্বাচন করুন</option>
          </select>

          <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="" disabled selected>বিগত পরীক্ষার বোর্ড নির্বাচন করুন</option>
          </select>

          <div class="relative">
            <input
              v-model="search"
              type="text"
              placeholder="রেজিস্ট্রেশন নম্বর"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <i class="ri-search-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
          <div class="relative">
            <input
              v-model="search"
              type="text"
              placeholder="রোল নম্বর"
              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            <i class="ri-search-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
          </div>

          <div class="md:col-start-4 flex gap-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
              সার্চ করুন
            </button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
              রেসেট
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
 </AuthenticatedLayout>
</template>
