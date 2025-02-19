<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'


const search = ref('')
const searchMobile = ref('')

const students = ref([
  {
    id: 12568,
    date: '05/09/2023',
    institute: 'জামিয়া আরাবিয়া ইমদাদুল উলুম ফরিদবাদ ঢাকা',
    level: 'মুতাওয়াসিসতা',
    category: 'ফযীলত',
    totalStudents: '৩০০',
    paymentStatus: 'unpaid',
    applicationStatus: 'approved',
    image: '/path-to-image.jpg',
    fatherName: 'আব্দুল করিম',
    birthDate: '1995-05-15'
  }
])

const handleSearch = () => {
  // Implement search logic
}

const resetSearch = () => {
  search.value = ''
  searchMobile.value = ''
}
</script>

<template>
<AuthenticatedLayout>
    <div class=" mx-auto p-4 mt-5">


        <div  style="font-family: 'Merriweather','SolaimanLipi',sans-serif;"
         class=" mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Total Students Card -->
        <div class="bg-gradient-to-br from-purple-50 to-white rounded-md p-6 border border-purple-100 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="space-y-4">
                    <div class="flex items-baseline space-x-2">
                        <!-- <h4 class="text-4xl font-bold text-purple-900">{{ props.studentCount }}</h4> -->
                        <span class="text-purple-600 text-sm font-semibold">মোট</span>
                    </div>
                    <p class="text-purple-900 font-medium">মোট নিবন্ধিত শিক্ষার্থী সংখ্যা</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-50 to-white rounded-md p-6 border border-blue-100 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="space-y-4">
                    <div class="flex items-baseline space-x-2">
                        <!-- <h4 class="text-4xl font-bold text-blue-900">{{ props.maleCount }}</h4> -->
                        <span class="text-blue-600 text-sm font-semibold">জন</span>
                    </div>
                    <p class="text-blue-900 font-medium">বোর্ড ফেরত শিক্ষার্থী সংখ্যা</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-blue-100">

            </div>
        </div>
            <!-- Female Students Card -->
            <div class="bg-gradient-to-br from-pink-50 to-white rounded-md p-6 border border-pink-100 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="space-y-4">
                    <div class="flex items-baseline space-x-2">
                        <!-- <h4 class="text-4xl font-bold text-pink-900">{{ props.femaleCount }}</h4> -->
                        <span class="text-pink-600 text-sm font-semibold">জন</span>
                    </div>
                    <p class="text-pink-900 font-medium">ছাত্রী সংখ্যা</p>
                </div>
                <div class="bg-pink-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-pink-100">

            </div>
        </div>


        <div class="bg-gradient-to-br from-emerald-50 to-white rounded-md p-6 border border-emerald-100 hover:shadow-lg transition-all duration-300">
            <div class="flex justify-between items-start">
                <div class="space-y-4">
                    <div class="flex items-baseline space-x-2">
                        <!-- <h4 class="text-4xl font-bold text-emerald-900">{{ yearCount }}</h4> -->
                        <span class="text-emerald-600 text-sm font-semibold">জন</span>
                    </div>
                    <p class="text-emerald-900 font-medium">{{ selectedYear }} সালের মোট</p>
                </div>
                <div class="bg-emerald-100 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-emerald-100">

            </div>
        </div>
        <!-- Similar cards for Male, Female, and Year Total -->
        <!-- ... other cards remain the same ... -->
    </div>














    <!-- Search Card -->
    <div class="bg-white rounded-md shadow-lg mb-6">
  <div class="bg-[#243b55] p-3 rounded-t-md">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
      <h3 class="text-yellow-400 font-bold text-lg">সার্চ উইযার্ড</h3>
      <h3 class="text-white text-lg text-center">৪৮তম কেন্দ্রীয় পরীক্ষা: নেগরান মুমতাহিন</h3>

    </div>
  </div>

  <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">
      <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">মারহালা সিলেক্ট করুন</option>
        <option value="mutawassita">মুতাওয়াসসিতা</option>
        <option value="sanabia">সানাবিয়া</option>
        <option value="fazilat">ফযীলত</option>
      </select>

      <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">অবস্থা সিলেক্ট করুন</option>
        <option value="active">সক্রিয়</option>
        <option value="inactive">নিষ্ক্রিয়</option>
      </select>

      <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">আবেদনের ধরন</option>
        <option value="regular">নিয়মিত</option>
        <option value="irregular">অনিয়মিত</option>
      </select>

      <input
        type="text"
        v-model="search"
        placeholder="কোড সার্চ করুন..."
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      >

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">



      <input
        type="text"
        v-model="searchMobile"
        placeholder="মোবাইল নম্বর সার্চ করুন..."
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      >

      <div class="flex gap-3">
        <button
          @click="handleSearch"
          class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
        >
          সার্চ করুন
        </button>
        <button
          @click="resetSearch"
          class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
        >
          রিসেট
        </button>
      </div>
    </div>
  </div>
</div>

    <!-- Data Table -->
    <div class="bg-white rounded-md shadow-lg">
      <div class="bg-[#243b55] p-3 rounded-t-md">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
          <h3 class="text-yellow-400 font-bold text-lg">নিবন্ধিত ছাত্র তালিকা</h3>
          <h3 class="text-yellow-400 text-lg text-center">৪৮তম কেন্দ্রীয় পরীক্ষা: মুতাওয়াসসিতা</h3>
          <div class="flex justify-end gap-3">
  <!-- PDF Download Button -->
  <button class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-sm shadow-md hover:bg-yellow-600 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
    </svg>
    PDF ডাউনলোড
  </button>

  <!-- Excel Download Button -->
  <button class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-sm shadow-md hover:bg-green-600 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
    </svg>
    এক্সেল ডাউনলোড
  </button>
</div>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ক্রমিক নং</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ছবি</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">পিতার নাম</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">মাদরাসার নাম</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">জন্ম-তারিখ</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">আবেদনের ধরন</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">পেমেন্ট স্ট্যাটাস</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">আবেদন অবস্থা</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">করনীয়</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="student in students" :key="student.id">
              <td class="px-6 py-4 whitespace-nowrap">{{ student.id }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <img :src="student.image" class="h-10 w-10 rounded-full" />
              </td>
              <td class="px-6 py-4 whitespace-nowrap">{{ student.fatherName }}</td>
              <td class="px-6 py-4">{{ student.institute }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ student.birthDate }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ student.level }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 py-1 text-xs rounded-full" :class="student.paymentStatus === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                  {{ student.paymentStatus === 'paid' ? 'পেমেন্ট সম্পন্ন' : 'পেমেন্ট হয়নি' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">
                  আবেদন মন্জুর হয়েছে
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex gap-2">
                  <button class="p-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200">
                    <i class="ri-send-plane-fill"></i>
                  </button>
                  <button class="p-1 bg-yellow-100 text-yellow-600 rounded hover:bg-yellow-200">
                    <i class="ri-arrow-down-line"></i>
                  </button>
                  <button class="p-1 bg-red-100 text-red-600 rounded hover:bg-red-200">
                    <i class="ri-delete-bin-line"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</AuthenticatedLayout>
</template>
