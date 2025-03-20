<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';

const students = ref([]);
const loading = ref(true);
const error = ref(null);


onMounted(async () => {
  try {
    loading.value = true;
    const response = await axios.get('/api/students-registration');
    // Add showMenu property to each student
    students.value = response.data.map(student => ({
      ...student,
      showMenu: false
    }));
  } catch (err) {
    error.value = 'ডাটা লোড করতে সমস্যা হয়েছে। দয়া করে আবার চেষ্টা করুন।';
    console.error(err);
  } finally {
    loading.value = false;
  }

  // Add click outside listener
  document.addEventListener('click', closeDropdownOnClickOutside);
});

onUnmounted(() => {
  // Remove click outside listener
  document.removeEventListener('click', closeDropdownOnClickOutside);
});

const handleSearch = () => {
  // Implement search logic
}

const resetSearch = () => {
  search.value = ''
  searchMobile.value = ''
}

// Close all menus when clicking outside
function closeAllMenus(event) {
  if (!event.target.closest('.relative')) {
    students.value.forEach(student => {
      student.showMenu = false;
    });
  }
}

// Add event listener when component is mounted
onMounted(() => {
  document.addEventListener('click', closeAllMenus);
});

// Remove event listener when component is unmounted
onUnmounted(() => {
  document.removeEventListener('click', closeAllMenus);
});
</script>

<template>
<AuthenticatedLayout>
    <div class="p-4 mt-5 mx-auto">


      <div style="font-family: 'Merriweather','SolaimanLipi',sans-serif"
     class="grid grid-cols-1 gap-6 lg:grid-cols-4 mb-5 sm:grid-cols-2">

    <!-- Total Students Card -->
    <div class="bg-gradient-to-br border border-emerald-100 p-6 rounded-md duration-300 from-emerald-50 hover:shadow-lg islamic-pattern to-white transition-all">
        <div class="flex justify-between items-start">
            <div class="space-y-4">
                <div class="flex items-baseline space-x-2">
                    <span class="text-emerald-600 text-sm font-semibold">মোট</span>
                </div>
                <p class="text-emerald-900 font-medium">মোট নিবন্ধিত শিক্ষার্থী সংখ্যা</p>
            </div>
            <div class="bg-emerald-100 p-3 rounded-xl">
                <i class="text-2xl text-emerald-600 fa-users-class fas"></i>
            </div>
        </div>
    </div>

    <!-- Board Return Students Card -->
    <div class="bg-gradient-to-br border border-teal-100 p-6 rounded-md duration-300 from-teal-50 hover:shadow-lg islamic-pattern to-white transition-all">
        <div class="flex justify-between items-start">
            <div class="space-y-4">
                <div class="flex items-baseline space-x-2">
                    <span class="text-sm text-teal-600 font-semibold">জন</span>
                </div>
                <p class="text-teal-900 font-medium">বোর্ড ফেরত শিক্ষার্থী সংখ্যা</p>
            </div>
            <div class="bg-teal-100 p-3 rounded-xl">
                <i class="text-2xl text-teal-600 fa-graduation-cap fas"></i>
            </div>
        </div>
        <div class="border-t border-teal-100 mt-4 pt-4"></div>
    </div>

    <!-- Female Students Card -->
    <div class="bg-gradient-to-br border border-amber-100 p-6 rounded-md duration-300 from-amber-50 hover:shadow-lg islamic-pattern to-white transition-all">
        <div class="flex justify-between items-start">
            <div class="space-y-4">
                <div class="flex items-baseline space-x-2">
                    <span class="text-amber-600 text-sm font-semibold">জন</span>
                </div>
                <p class="text-amber-900 font-medium">ছাত্রী সংখ্যা</p>
            </div>
            <div class="bg-amber-100 p-3 rounded-xl">
                <i class="text-2xl text-amber-600 fa-female fas"></i>
            </div>
        </div>
        <div class="border-amber-100 border-t mt-4 pt-4"></div>
    </div>

    <!-- Year Total Card -->
    <div class="bg-gradient-to-br border border-emerald-100 p-6 rounded-md duration-300 from-emerald-50 hover:shadow-lg islamic-pattern to-white transition-all">
        <div class="flex justify-between items-start">
            <div class="space-y-4">
                <div class="flex items-baseline space-x-2">
                    <span class="text-emerald-600 text-sm font-semibold">জন</span>
                </div>
                <p class="text-emerald-900 font-medium">{{ selectedYear }} সালের মোট</p>
            </div>
            <div class="bg-emerald-100 p-3 rounded-xl">
                <i class="text-2xl text-emerald-600 fa-mosque fas"></i>
            </div>
        </div>
        <div class="border-emerald-100 border-t mt-4 pt-4"></div>
    </div>
</div>














    <!-- Search Card -->
 <div class="bg-white rounded-sm shadow-lg mb-6">
  <!-- Header with Islamic pattern -->
  <div class="bg-emerald-900 p-3 rounded-t-sm islamic-pattern">
    <div class="grid grid-cols-1 gap-4 items-center md:grid-cols-3">
      <h3 class="text-amber-400 text-lg font-bold">
        <i class="fa-search-plus fas ml-2"></i> সার্চ উইযার্ড
      </h3>

      <h3 class="text-center text-lg text-white">
         ৪৮তম কেন্দ্রীয় পরীক্ষা: নেগরান মুমতাহিন
      </h3>

      <div class="flex justify-end gap-3">
        <Link
          :href="route('students_registration.student_registration')"
          class="flex bg-emerald-600 rounded-sm text-white duration-200 gap-2 hover:bg-emerald-700 items-center px-4 py-2 transition-colors"
        >
          <i class="fa-user-plus fas"></i>
          <span>নিবন্ধন করুন</span>
        </Link>

        <button class="bg-teal-600 rounded-sm text-white hover:bg-teal-700 inline-flex items-center px-4 py-2">
          <i class="fa-file-import fas mr-2"></i>
          ইম্পোর্ট করুন
        </button>
      </div>
    </div>
  </div>

  <!-- Search Form Section -->
  <div class="bg-emerald-50 p-6">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 mb-4 md:grid-cols-3">
      <div class="relative">

        <select class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2">
          <option value="">মারহালা সিলেক্ট করুন</option>
          <option value="mutawassita">মুতাওয়াসসিতা</option>
          <option value="sanabia">সানাবিয়া</option>
          <option value="fazilat">ফযীলত</option>
        </select>
      </div>

      <div class="relative">

        <select class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2">
          <option value="">অবস্থা সিলেক্ট করুন</option>
          <option value="active">সক্রিয়</option>
          <option value="inactive">নিষ্ক্রিয়</option>
        </select>
      </div>

      <div class="relative">

        <select class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2">
          <option value="">আবেদনের ধরন</option>
          <option value="regular">নিয়মিত</option>
          <option value="irregular">অনিয়মিত</option>
        </select>
      </div>

      <div class="relative">

        <select class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2">
          <option value="">পেমেন্ট অবস্থা</option>
          <option value="paid">পরিশোধিত</option>
          <option value="unpaid">অপরিশোধিত</option>
        </select>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 mb-4 md:grid-cols-3">
      <div class="relative">

        <select class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2">
          <option value="">বোর্ড দাখিল অবস্থা</option>
          <option value="submitted">দাখিল করা হয়েছে</option>
          <option value="pending">দাখিল করা হয়নি</option>
        </select>
      </div>

      <div class="relative">

        <input
          type="text"
          v-model="search"
          placeholder="কোড সার্চ করুন..."
          class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2"
        >
      </div>

      <div class="relative">

        <input
          type="text"
          v-model="searchMobile"
          placeholder="মোবাইল নম্বর সার্চ করুন..."
          class="border-2 border-emerald-200 rounded-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-4 py-2"
        >
      </div>

      <div class="flex gap-3">
        <button
          @click="handleSearch"
          class="flex bg-emerald-600 rounded-sm text-white gap-2 hover:bg-emerald-700 items-center px-4 py-2"
        >
          <i class="fa-search fas"></i>
          সার্চ করুন
        </button>
        <button
          @click="resetSearch"
          class="flex bg-red-500 rounded-sm text-white gap-2 hover:bg-red-600 items-center px-4 py-2"
        >
          <i class="fa-undo fas"></i>
          রিসেট
        </button>
      </div>
    </div>
  </div>
</div>


    <!-- Data Table -->
   <div class="bg-white rounded-sm shadow-lg">
  <!-- Header with Islamic pattern -->
  <div class="bg-emerald-900 p-3 rounded-t-sm islamic-pattern">
    <div class="grid grid-cols-1 gap-4 items-center md:grid-cols-3">
      <h3 class="text-amber-300 text-lg font-bold">
        <i class="fa-users-class fas ml-2"></i> মোট নিবন্ধিত ছাত্র সংখ্যা
      </h3>

      <h3 class="text-amber-300 text-center text-lg">
    ৪৮তম কেন্দ্রীয় পরীক্ষা: মুতাওয়াসসিতা
      </h3>

      <div class="flex justify-end gap-3">
        <button class="bg-amber-500 rounded-sm text-white hover:bg-amber-600 inline-flex items-center px-4 py-1">
          <i class="fa-file-pdf fas mr-2"></i>
          PDF ডাউনলোড
        </button>
        <button class="bg-emerald-600 rounded-sm text-white hover:bg-emerald-700 inline-flex items-center px-4 py-2">
          <i class="fa-paper-plane fas mr-2"></i>
          বোর্ড দাখিল
        </button>
      </div>
    </div>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full">
  <thead class="bg-emerald-50">
    <tr>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">রেজিস্ট্রেশ নং</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">ছবি</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">নাম</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">পিতার নাম</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">মাদরাসার নাম</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">পরিক্ষার নাম</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">মারহালা</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">জন্ম-তারিখ</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">পরিক্ষার্থীর ধরন</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">পেমেন্ট স্ট্যাটাস</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">আবেদন অবস্থা</th>
      <th class="text-center text-emerald-800 text-md font-medium px-6 py-3 uppercase">করনীয়</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-emerald-100 divide-y">
    <tr v-for="student in students" :key="student.id">
      <td class="text-center px-6 py-4">{{ student.id }}</td>
      <td class="text-center px-6 py-4">
        <div class="flex justify-center">
          <img :src="student.student_image" class="border-2 border-emerald-200 h-10 rounded-full w-10" />
        </div>
      </td>
      <td class="text-center px-6 py-4">{{ student.name_bn }}</td>
      <td class="text-center px-6 py-4">{{ student.father_name_bn }}</td>
      <td class="text-center px-6 py-4">{{ student.current_madrasha }}</td>
      <td class="text-center px-6 py-4">{{ student.exam_name_Bn }}</td>
      <td class="text-center px-6 py-4"></td>

      <td class="text-center px-6 py-4">{{ student.Date_of_birth }}</td>

      <td class="text-center px-6 py-4">{{ student.student_type }}</td>
      <td class="text-center px-6 py-4"></td>

      <td class="text-center px-6 py-4">
        <div class="flex justify-center">
          <span class="bg-yellow-100 rounded-full text-xs text-yellow-800 px-2 py-1">
            <i class="fa-clock fas mr-1"></i>
            পেন্ডিং
          </span>
        </div>
      </td>
      <td class="text-center px-6 py-4">
  <div class="text-left inline-block relative">
    <div>
      <button
        @click="student.showMenu = !student.showMenu"
        type="button"
        class="bg-gray-100 p-1 rounded-full text-gray-600 focus:outline-none hover:bg-gray-200"
      >
        <i class="fa-ellipsis-v fas px-1"></i>
      </button>
    </div>

    <div
      v-if="student.showMenu"
      class="bg-white rounded-md shadow-lg w-48 absolute mt-2 origin-top-right right-0 ring-1 ring-black ring-opacity-5 z-10"
    >
      <div class="py-1" role="menu" aria-orientation="vertical">
        <button
          class="flex text-emerald-600 text-left text-sm w-full hover:bg-emerald-50 items-center px-4 py-2"
        >
          <i class="fa-paper-plane fas mr-2"></i> বোর্ড দাখিল
        </button>

        <Link
          :href="route('students_registration.stu_reg_view', student.id)"
          class="flex text-amber-600 text-left text-sm w-full hover:bg-amber-50 items-center px-4 py-2"
        >
          <i class="fa-pencil-alt fas mr-2"></i> এডিট
        </Link>

        <button
  class="flex text-left text-blue-600 text-sm w-full hover:bg-blue-50 items-center px-4 py-2"
>
  <i class="fas fa-info-circle mr-2"></i> বিস্তারিত দেখুন
</button>

        <button
          class="flex text-left text-red-600 text-sm w-full hover:bg-red-50 items-center px-4 py-2"
        >
          <i class="fa-trash-alt fas mr-2"></i> ডিলিট
        </button>
      </div>
    </div>
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
