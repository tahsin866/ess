<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue'

const student = ref({
  examName: "দাওরায়ে হাদীস",
  examType: "নিয়মিত",
  examYear: "১৪৪৬ হিজরী",
  prevExam: {
    name: "ফারীগাত",
    studentName: "মৌনিন ইসলাম ফারিন",
    gender: "ছাত্রী",
    fatherName: "মোঃ চেলাল উদ্দিন",
    rollNo: "১৪২২৩",
    passYear: "১৪৪৫ হিজরী",
    division: "মাকবুল",
    madrasa: "দারুল নাজাত মহিলা মাদ্রাসা, ২৯/২ মাসকান্দা, ময়মনসিংহ সদর",
    board: "বেফাকুল মাদারিসিল আরাবিয়া বাংলাদেশ"
  },
  applicantInfo: {
    regFormClick: "২১"
  }
})

const registrations = ref([
  {
    name: "মুফতি বেলাল হুসাইন",
    position: "মাদ্রাসা অ্যাডমিন",
    dateTime: "১১ ডিসেম্বর ২০২৪ - ২৩:২২:৩৭",
    status: "অন্তর্ভুক্তির পেমেন্ট সম্পন্ন হয়েছে",
    statusClass: "bg-emerald-100 text-emerald-600",
    icon: "fas fa-money-check-alt",
    note: "-",
  },
  {
    name: "মু. অহিদুর রহমান",
    position: "আল-হাইআতুল উলয়া সুপার অ্যাডমিন",
    dateTime: "১১ ডিসেম্বর ২০২৪ - ১৬:৪০:২৩",
    status: "হাইআতুল উলয়া কর্তৃক অনুমোদিত",
    statusClass: "bg-green-100 text-green-600",
    icon: "fas fa-check-circle",
    note: "-",
  },
  {
    name: "মোঃ নজরুল ইসলাম",
    position: "আল-হাইআতুল উলয়া অ্যাডমিন",
    dateTime: "১১ ডিসেম্বর ২০২৪ - ১৫:১৭:১২",
    status: "সংযোজন আপলোড করা হয়েছে",
    statusClass: "bg-amber-100 text-amber-600",
    icon: "fas fa-upload",
    note: "-",
  },
  {
    name: "মোঃ নজরুল ইসলাম",
    position: "আল-হাইআতুল উলয়া অ্যাডমিন",
    dateTime: "১১ ডিসেম্বর ২০২৪ - ১৫:১০:৪৪",
    status: "সংযোজন আপলোড করা হয়েছে",
    statusClass: "bg-amber-100 text-amber-600",
    icon: "fas fa-upload",
    note: "-",
  }
])
</script>

<template>
<AuthenticatedLayout>
    <div class="p-6">
    <!-- Exam Title -->
    <div class="bg-emerald-800 text-white p-4 rounded-md shadow-lg mb-6">
      <div class="flex items-center gap-3">
        <!-- <i class="fas fa-star-and-crescent text-2xl"></i> -->
        <h2 class="text-xl">
          {{ student.examName }} পরীক্ষার নিবন্ধন - {{ student.examYear }} / ২০২৫ ঈসাদ
        </h2>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Exam Details -->
      <div class="bg-white p-6 rounded-md shadow-md border-t-4 border-emerald-600">
        <h3 class="text-lg font-semibold text-emerald-800 border-b border-emerald-100 pb-3 mb-4 flex items-center gap-2">
          <i class="fas fa-file-alt text-emerald-600"></i>
          আবেদনের ধরন
        </h3>
        <div class="space-y-3">
          <p class="flex items-center gap-2">
            <i class="fas fa-book-open text-emerald-600"></i>
            <span class="font-medium">পরীক্ষার নাম:</span> {{ student.examName }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-user-graduate text-emerald-600"></i>
            <span class="font-medium">পরীক্ষার্থী ধরন:</span> {{ student.examType }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-calendar-alt text-emerald-600"></i>
            <span class="font-medium">পরীক্ষার সন:</span> {{ student.examYear }}
          </p>
        </div>
      </div>

      <!-- Previous Exam Details -->
      <div class="bg-white p-6 rounded-md shadow-md border-t-4 border-emerald-600">
        <h3 class="text-lg font-semibold text-emerald-800 border-b border-emerald-100 pb-3 mb-4 flex items-center gap-2">
          <i class="fas fa-history text-emerald-600"></i>
          বিগত পরীক্ষার তথ্য
        </h3>
        <div class="space-y-3">
          <p class="flex items-center gap-2">
            <i class="fas fa-scroll text-emerald-600"></i>
            <span class="font-medium">পরীক্ষার নাম:</span> {{ student.prevExam.name }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-user text-emerald-600"></i>
            <span class="font-medium">পরীক্ষার্থী নাম:</span> {{ student.prevExam.studentName }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-venus-mars text-emerald-600"></i>
            <span class="font-medium">লিঙ্গ:</span> {{ student.prevExam.gender }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-male text-emerald-600"></i>
            <span class="font-medium">পিতার নাম:</span> {{ student.prevExam.fatherName }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-id-card text-emerald-600"></i>
            <span class="font-medium">রোল নং:</span> {{ student.prevExam.rollNo }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-award text-emerald-600"></i>
            <span class="font-medium">প্রাপ্ত বিভাগ:</span> {{ student.prevExam.division }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-mosque text-emerald-600"></i>
            <span class="font-medium">মাদ্রাসা:</span> {{ student.prevExam.madrasa }}
          </p>
          <p class="flex items-center gap-2">
            <i class="fas fa-university text-emerald-600"></i>
            <span class="font-medium">বোর্ড:</span> {{ student.prevExam.board }}
          </p>
        </div>
      </div>

      <!-- Image Section -->
      <div class="bg-white p-6 rounded-md shadow-md border-t-4 border-emerald-600">
        <h3 class="text-lg font-semibold text-emerald-800 border-b border-emerald-100 pb-3 mb-4 flex items-center gap-2">
          <i class="fas fa-camera text-emerald-600"></i>
          ছবি ও স্বাক্ষর
        </h3>
        <div class="flex flex-col items-center space-y-4">
          <div class="w-40 h-40 bg-emerald-50 border-2 border-dashed border-emerald-200 flex items-center justify-center rounded-lg">
            <div class="text-center">
              <i class="fas fa-user-circle text-4xl text-emerald-300 mb-2"></i>
              <span class="text-emerald-600 block">কোনো ছবি নেই</span>
            </div>
          </div>
          <p class="text-red-600 text-sm flex items-center gap-2">
            <i class="fas fa-info-circle"></i>
            ছাত্রীদের ক্ষেত্রে ছবি প্রযোজ্য নয়
          </p>
          <div class="w-40 p-2 bg-emerald-50 rounded-lg">
            <div class="border-2 border-dashed border-emerald-200 rounded p-2 text-center">
              <i class="fas fa-signature text-emerald-400 text-2xl"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Applicant Info -->
    <div class="mt-6 bg-white p-6 rounded-md shadow-md border-t-4 border-emerald-600">
      <h3 class="text-lg font-semibold text-emerald-800 border-b border-emerald-100 pb-3 mb-4 flex items-center gap-2">
        <i class="fas fa-user-edit text-emerald-600"></i>
        আবেদনকারীর তথ্য
      </h3>
      <!-- <p class="flex items-center gap-2">
        <i class="fas fa-mouse-pointer text-emerald-600"></i>
        <span class="font-medium">রেজিস্ট্রেশন ফর্মের ক্লিক সংখ্যা:</span> {{ student.applicantInfo.regFormClick }}
      </p> -->

      <div class="p-6 bg-emerald-50 min-h-screen">
    <div class="bg-emerald-800 text-white p-4 rounded-md shadow-lg mb-6">
      <h2 class="text-lg flex items-center gap-2">
        <!-- <i class="fas fa-star-and-crescent"></i> -->
        নিবন্ধন অবস্থা পর্যবেক্ষণ
      </h2>
    </div>

    <div class="bg-white rounded-md shadow-md overflow-hidden border border-emerald-100">
      <table class="w-full text-left border-collapse">
        <!-- Table Header -->
        <thead class="bg-emerald-700 text-white">
          <tr>
            <th class="p-4 ">
              <div class="flex items-center gap-2">
                <i class="fas fa-user-circle"></i>
                সিদ্ধান্ত গ্রহণকারী
              </div>
            </th>
            <th class="p-4 ">
              <div class="flex items-center gap-2">
                <i class="fas fa-id-badge"></i>
                পদবি
              </div>
            </th>
            <th class="p-4 ">
              <div class="flex items-center gap-2">
                <i class="fas fa-calendar-alt"></i>
                তারিখ ও সময়
              </div>
            </th>
            <th class="p-4 ">
              <div class="flex items-center gap-2">
                <i class="fas fa-info-circle"></i>
                অবস্থা
              </div>
            </th>
            <th class="p-4">
              <div class="flex items-center gap-2">
                <i class="fas fa-comment-alt"></i>
                মন্তব্য
              </div>
            </th>
          </tr>
        </thead>

        <!-- Table Body -->
        <tbody>
          <tr
            v-for="(entry, index) in registrations"
            :key="index"
            :class="{ 'bg-emerald-50': index % 2 !== 0 }"
            class="hover:bg-emerald-100 transition-colors duration-150"
          >
            <td class="p-4 border-b border-emerald-100">
              <div class="flex items-center gap-2">
                <i class="fas fa-user text-emerald-600"></i>
                {{ entry.name }}
              </div>
            </td>
            <td class="p-4 border-b border-emerald-100">
              <div class="flex items-center gap-2">
                <i class="fas fa-mosque text-emerald-600"></i>
                {{ entry.position }}
              </div>
            </td>
            <td class="p-4 border-b border-emerald-100">
              <div class="flex items-center gap-2">
                <i class="fas fa-clock text-emerald-600"></i>
                {{ entry.dateTime }}
              </div>
            </td>
            <td class="p-4 border-b border-emerald-100">
              <span
                class="px-3 py-1 rounded-md font-medium flex items-center gap-2 w-fit"
                :class="entry.statusClass"
              >
                <i :class="entry.icon"></i>
                {{ entry.status }}
              </span>
            </td>
            <td class="p-4 border-b border-emerald-100">
              <div class="flex items-center gap-2">
                <i class="fas fa-pen text-emerald-600"></i>
                {{ entry.note }}
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    </div>
  </div>
</AuthenticatedLayout>
</template>

<style scoped>
.font-arabic {
  font-family: 'Noto Naskh Arabic', serif;
}
</style>
