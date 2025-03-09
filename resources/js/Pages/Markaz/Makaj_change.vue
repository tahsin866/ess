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
      <div class="bg-white shadow-xl rounded-md overflow-hidden mt-8 mx-5">
        <!-- Header with Islamic Pattern -->
        <div class="bg-gradient-to-r from-emerald-900 to-emerald-800 text-white px-6 py-4 flex items-center relative">
          <div class="absolute inset-0 opacity-10 pattern-islamic"></div>

          <h2 class="text-2xl font-bold">মারকায পরিবর্তনের ফর্ম</h2>
        </div>

        <!-- Madrasa Selection -->
        <div class="p-6 border-b ">
          <div class="bg-white p-4 rounded-md shadow-md">
            <label class="text-emerald-800 font-semibold block mb-2">মারকাযের স্তর নির্বাচন করুন</label>
            <select
              v-model="selectedMadrasa"
              class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200"
            >
              <option value="">মাদরাসা সিলেক্ট করুন</option>
              <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>
        </div>

        <!-- Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 ">
          <!-- মারকাযের ধরন -->
          <div class="bg-white p-5 rounded-md shadow-md border  hover:shadow-lg transition-shadow duration-300">
            <label class="text-emerald-800 font-semibold block mb-3">
              <i class="fas fa-mosque mr-2"></i>মারকাযের ধরন
            </label>
            <div class="mt-1 text-gray-800 font-medium">{{ desserts[0].dessert }}</div>
          </div>

          <!-- বর্তমান মারকায -->
          <div class="bg-white p-5 rounded-md shadow-md border  hover:shadow-lg transition-shadow duration-300">
            <label class="text-emerald-800 font-semibold block mb-3">
              <i class="fas fa-map-marker-alt mr-2"></i>বর্তমান মারকায
            </label>
            <div class="mt-1 text-gray-800 font-medium">{{ desserts[0].calories }}</div>
          </div>

          <!-- কাঙ্খিত মারকায -->
          <div class="bg-white p-5 rounded-md shadow-md border  hover:shadow-lg transition-shadow duration-300">
            <label class="text-emerald-800 font-semibold block mb-3">
              <i class="fas fa-star-and-crescent mr-2"></i>কাঙ্খিত মারকায
            </label>
            <select
              v-model="selectedMadrasa"
              class="w-full px-4 py-3 border border-emerald-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200"
            >
              <option value="">মাদরাসা সিলেক্ট করুন</option>
              <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
            </select>
          </div>
        </div>

        <!-- File Uploads -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 ">
          <!-- অনাপত্তি পত্র -->
          <div class="space-y-3">
            <label class="text-emerald-800 font-semibold block">
              <i class="fas fa-file-alt mr-2"></i>বর্তমান মারকায অনাপত্তিপত্র
            </label>
            <div class="relative">
              <input
                type="file"
                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                @change="handleFileChange"
              />
              <div class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-dashed border-emerald-300 rounded-md hover:border-emerald-500 transition-colors duration-200">
                <i class="fas fa-cloud-upload-alt text-emerald-400 text-xl mr-2"></i>
                <span class="text-gray-600">ফাইল আপলোড করুন</span>
              </div>
            </div>
          </div>

          <!-- সম্মতিপত্র -->
          <div class="space-y-3">
            <label class="text-emerald-800 font-semibold block">
              <i class="fas fa-file-signature mr-2"></i>কাঙ্খিত মারকায সম্মতিপত্র
            </label>
            <div class="relative">
              <input
                type="file"
                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                @change="handleFileChange"
              />
              <div class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-dashed border-emerald-300 rounded-md hover:border-emerald-500 transition-colors duration-200">
                <i class="fas fa-cloud-upload-alt text-emerald-400 text-xl mr-2"></i>
                <span class="text-gray-600">ফাইল আপলোড করুন</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

  <style>
  .pattern-islamic {
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 30-15 30-15-30z' fill='%23ffffff' fill-opacity='0.1'/%3E%3C/svg%3E");
    background-repeat: repeat;
  }
  </style>

