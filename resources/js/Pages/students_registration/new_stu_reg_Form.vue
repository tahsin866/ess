<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue'


const selectedDate = ref('')
const items = ref([])

const formData = ref({
  nameBangla: '',
  nameEnglish: '',
  nameArabic: '',
  motherNameBangla: '',
  motherNameEnglish: '',
  motherNameArabic: '',
  fatherNameBangla: '',
  fatherNameEnglish: '',
  fatherNameArabic: '',
  birthRegNo: '',
  nidNo: '',
  guardianName: '',
  guardianMobile: '',
  postOffice: '',
  village: ''
})

const onSubmit = () => {
  console.log(formData.value)
}
</script>

<template>
  <AuthenticatedLayout>
    <div class="space-y-6 mx-5 mt-5">
    <!-- Personal Information Card -->
    <div class="bg-white rounded-sm shadow-md ">
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md flex items-center gap-3">
          <i class="fas fa-user-circle text-2xl text-white"></i>
          <h5 class="text-white text-xl font-arabic">ব্যক্তিগত তথ্য</h5>
        </div>

      <div class="p-6">
      <form class="space-y-6">
  <!-- Name Fields -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (বাংলা)</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

        </span>
        <input
          v-model="formData.nameBangla"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (ইংরেজি)</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

        </span>
        <input
          v-model="formData.nameEnglish"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (আরবি)</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

        </span>
        <input
          v-model="formData.nameArabic"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>
  </div>

  <!-- Mother's Name Fields -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (বাংলা)</label>
      <div>

        <input
          v-model="formData.motherNameBangla"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (ইংরেজি)</label>
      <div class="relative">

        <input
          v-model="formData.motherNameEnglish"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (আরবি)</label>
      <div class="relative">

        <input
          v-model="formData.motherNameArabic"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>
  </div>

  <!-- Date and Registration Fields -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">জন্ম-তারিখ</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-calendar-alt text-emerald-600"></i>
        </span>
        <input
          v-model="selectedDate"
          type="date"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">জন্ম-নিবন্ধন নম্বর</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-id-card text-emerald-600"></i>
        </span>
        <input
          v-model="formData.birthRegNo"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>

    <div class="relative">
      <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">জাতীয় পরিচয়পত্র নম্বর</label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fas fa-address-card text-emerald-600"></i>
        </span>
        <input
          v-model="formData.nidNo"
          type="text"
          class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
        >
      </div>
    </div>
  </div>
</form>

      </div>
    </div>

    <!-- Required Information Card -->
   <div class="bg-white rounded-lg shadow-md ">
  <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
    <div class="flex items-center gap-3 relative z-10">
      <i class="fas fa-book-open text-2xl text-white"></i>
      <h5 class="text-white text-xl font-arabic">প্রয়োজনীয় তথ্য</h5>
    </div>
  </div>

  <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="relative">
        <label class=" text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          নিয়মিত
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-users text-emerald-600"></i>
          </span>
          <input
            type="text"
            disabled
            class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800"
            placeholder="মোট ছাত্র সংখ্যা"
          >
        </div>
      </div>

      <div class="relative">
        <label class=" text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          বোর্ড
        </label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-university text-emerald-600"></i>
          </span>
          <input
            type="text"
            disabled
            class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800"
            placeholder="মোট ছাত্র সংখ্যা"
          >
        </div>
      </div>
    </div>

    <div class="mt-6">
      <h4 class="text-emerald-700 font-medium mb-4 flex items-center gap-2 font-arabic">
        <i class="fas fa-books text-emerald-600"></i>
        নির্বাচনি কিতাব সিলেক্ট করুন
      </h4>
      <div class="flex space-x-6">
        <label class="flex items-center space-x-2 group cursor-pointer">
          <div class="relative">
            <input type="checkbox" class="form-checkbox text-emerald-600 border-emerald-300 rounded-md focus:ring-emerald-500">
            <div class="absolute inset-0 bg-emerald-100 opacity-0 group-hover:opacity-20 rounded-md transition-opacity"></div>
          </div>
          <span class="text-emerald-800 group-hover:text-emerald-600 transition-colors font-arabic">হিদায়া ১ম খন্ড</span>
        </label>

        <label class="flex items-center space-x-2 group cursor-pointer">
          <div class="relative">
            <input type="checkbox" class="form-checkbox text-emerald-600 border-emerald-300 rounded-md focus:ring-emerald-500">
            <div class="absolute inset-0 bg-emerald-100 opacity-0 group-hover:opacity-20 rounded-md transition-opacity"></div>
          </div>
          <span class="text-emerald-800 group-hover:text-emerald-600 transition-colors font-arabic">হিদায়া ২য় খন্ড</span>
        </label>
      </div>
    </div>
  </div>
</div>


    <!-- Address Card -->
  <div class="bg-white rounded-md shadow-md ">
  <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
    <div class="flex items-center gap-3 relative z-10">
      <i class="fas fa-map-marked-alt text-2xl text-white"></i>
      <h5 class="text-white text-xl font-arabic">বর্তমান ঠিকানা</h5>
    </div>
  </div>

  <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="relative">
        <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
          বিভাগ
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>

      <div class="relative">
        <label class=" text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          জেলা
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>

        </div>
      </div>

      <div class="relative">
        <label class=" text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          থানা/উপজেলা
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="bg-white rounded-md shadow-md ">
  <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
    <div class="flex items-center gap-3 relative z-10">
      <i class="fas fa-map-marked-alt text-2xl text-white"></i>
      <h5 class="text-white text-xl font-arabic"> স্থায়ী ঠিকানা</h5>
    </div>
  </div>

  <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="relative">
        <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          বিভাগ
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>

      <div class="relative">
        <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          জেলা
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>

        </div>
      </div>

      <div class="relative">
        <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

          থানা/উপজেলা
        </label>
        <div class="relative">
          <select class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 appearance-none">
            <option v-for="item in items" :key="item" :value="item">{{ item }}</option>
          </select>

        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Attachment Card -->
    <div class="bg-white rounded-lg shadow">
      <div class="bg-[#243b55] px-6 py-4 rounded-t-lg">
        <h5 class="text-white text-lg font-medium">সংযক্তি</h5>
      </div>


    </div>
  </div>
  </AuthenticatedLayout>
</template>
