<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const desserts = ref([
  {
    dessert: "দরসিয়াত",
    calories: "জামিয়া আরাবিয়া ইমদাদুল উলুম ফরিদাবাদ ঢাকা ১২৩৬- (W10130)",
  },
]);

const items = ref(["Madarsa 1", "Madarsa 2", "Madarsa 3"]);
const selectedMadrasa = ref("");
</script>


<template>

<AuthenticatedLayout>

    <div class="bg-white shadow-lg rounded-md overflow-hidden mt-5 mx-5">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white px-6 py-4 flex items-center">
      <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
      </svg>
      <h2 class="text-xl font-bold">মারকায পরিবর্তনের ফর্ম</h2>
    </div>


    <div class="bg-white p-4  shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
        <label class="text-blue-700 font-semibold block mb-2">মারকাযের স্তর নির্বাচন করুন</label>
        <select
          v-model="selectedMadrasa"
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-no-repeat bg-right"
        >
          <option value="">মাদরাসা সিলেক্ট করুন</option>
          <option v-for="item in items" :key="item" :value="item">
            {{ item }}
          </option>
        </select>
      </div>





    <!-- Content Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-gray-50">
      <!-- মারকাযের ধরন -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
        <label class="text-blue-700 font-semibold block mb-2">মারকাযের ধরন</label>
        <div class="mt-1 text-gray-800 font-medium">{{ desserts[0].dessert }}</div>
      </div>

      <!-- বর্তমান মারকায -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
        <label class="text-blue-700 font-semibold block mb-2">বর্তমান মারকায</label>
        <div class="mt-1 text-gray-800 font-medium">{{ desserts[0].calories }}</div>
      </div>

      <!-- কাঙ্খিত মারকায -->
      <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
        <label class="text-blue-700 font-semibold block mb-2">কাঙ্খিত মারকায</label>
        <select
          v-model="selectedMadrasa"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 appearance-none bg-no-repeat bg-right"
        >
          <option value="">মাদরাসা সিলেক্ট করুন</option>
          <option v-for="item in items" :key="item" :value="item">
            {{ item }}
          </option>
        </select>
      </div>
    </div>

    <!-- File Uploads -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 border-t border-gray-100">
      <!-- অনাপত্তি পত্র -->
      <div class="space-y-2">
        <label class="text-blue-700 font-semibold block">বর্তমান মারকায অনাপত্তিপত্র</label>
        <div class="relative">
          <input
            type="file"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            @change="handleFileChange"
          />
          <div class="flex items-center justify-center w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition-colors duration-200">
            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
            </svg>
            <span class="text-gray-600">ফাইল আপলোড করুন</span>
          </div>
        </div>
      </div>

      <!-- সম্মতিপত্র পত্র -->
      <div class="space-y-2">
        <label class="text-blue-700 font-semibold block">কাঙ্খিত মারকায সম্মতিপত্র</label>
        <div class="relative">
          <input
            type="file"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            @change="handleFileChange"
          />
          <div class="flex items-center justify-center w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition-colors duration-200">
            <svg class="w-6 h-6 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
            </svg>
            <span class="text-gray-600">ফাইল আপলোড করুন</span>
          </div>
        </div>
      </div>
    </div>
  </div>


</AuthenticatedLayout>
</template>
