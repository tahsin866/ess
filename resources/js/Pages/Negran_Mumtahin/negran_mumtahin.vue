<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

// Define your data
const search = ref('');
const desserts = [
  {
    dessert: 'Frozen Yogurt',
    calories: 159,
    fat: 6,
    carbs: 24,
    protein: 4,
  },
];
</script>

<template>
<AuthenticatedLayout>
    <div class="container-fluid mx-auto p-5">
    <!-- Header Section -->
    <div class="bg-gradient-to-r mb-5 rounded-sm from-emerald-800 to-emerald-600 p-4   shadow-md">
      <div class="flex justify-between items-center">
        <div>

          <h4 class="text-xl text-yellow-400">মোট নেগরান মুমতাহিন আবেদন সংখ্যা</h4>
        </div>

        <div class="flex gap-4">
          <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors duration-200 shadow-md">
            পুরাতন
            <i class="ri-history-line ml-2"></i>
          </button>
          <Link :href="route('Negran_Mumtahin.negran_mumtahin_appy')"
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors duration-200 shadow-md">
            নতুন
            <i class="ri-add-circle-line ml-2"></i>
          </Link>
        </div>
      </div>
    </div>

    <!-- Search Panel -->
    <div class="bg-white p-3 rounded-sm shadow-lg border-t-4 border-emerald-600 mb-5">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="relative">
          <input v-model="search"
                 type="text"
                 placeholder="কোড"
                 class="w-full p-2 border-2 border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
        </div>

        <div class="relative">
          <input v-model="search"
                 type="text"
                 placeholder="মোবাইল নম্বর"
                 class="w-full p-2 border-2 border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent" />
        </div>
        <div class="flex justify-end gap-4">
  <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-sm transition-colors duration-200 shadow-md flex items-center">
    <i class="fas fa-search mr-2"></i>
    সার্চ করুন
  </button>
  <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-sm transition-colors duration-200 shadow-md flex items-center">
    <i class="fas fa-redo-alt mr-2"></i>
    রেসেট
  </button>
</div>


      </div>
    </div>

    <!-- Action Panel -->
    <div class="flex justify-between items-center mb-5">
      <h4 class="text-xl text-emerald-700 ">মোট নিবন্ধিত ছাত্র সংখ্যা:</h4>
      <div class="flex gap-4">
        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors duration-200 shadow-md">
          PDF ডাউনলোড
          <i class="ri-file-pdf-line ml-2"></i>
        </button>
        <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md text-sm flex items-center transition-colors duration-200 shadow-md">
          বোর্ড দাখিল
          <i class="ri-send-plane-line ml-2"></i>
        </button>
      </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-lg overflow-hidden">
      <table class="w-full border-collapse">
        <thead class="bg-emerald-50">
          <tr>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">ক্রমিক নং</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">ছবি</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">পিতার নাম</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">মাদরাসার নাম</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">জন্ম-তারিখ</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">আবেদনের ধরন</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">পেমেন্ট স্ট্যাটাস</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">আবেদন অবস্থা</th>
            <th class="px-4 py-3 text-left border-b-2 border-emerald-100">করণীয়</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in desserts" :key="item.dessert" class="hover:bg-emerald-50 transition-colors duration-150">
            <td class="px-4 py-3 border-b border-emerald-100">{{ item.id }}</td>
            <!-- Other table cells with same classes -->
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</AuthenticatedLayout>
</template>

<style scoped>
/* Custom styles for Islamic vibes */
.header-background {
  background-color: #243b55;
  border-radius: 10px;
}
</style>
