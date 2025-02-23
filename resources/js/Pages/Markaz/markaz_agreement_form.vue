<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, computed } from 'vue'

const form = ref({
  input1: 0,
  input2: 0,
  input3: 0,
  input4: 0,
  input5: 0,
  totalStudents: 0,
  requirements: ''
})


const rows = ref([
  {
    fazilat: "",
    sanabiya_ulya: "",
    sanabiya: "",
    mutawassita: "",
    ibtedaiyyah: "",
    hifzul_quran: "",
    madrasa: ""
  }
]);

const totalSum = computed(() => {
  return form.value.input1 + form.value.input2 + form.value.input3 +
         form.value.input4 + form.value.input5
})

const addRow = () => {
  rows.value.push({
    fazilat: "",
    sanabiya_ulya: "",
    sanabiya: "",
    mutawassita: "",
    ibtedaiyyah: "",
    hifzul_quran: "",
    madrasa: ""
  });
};

const removeRow = (index) => {
  if (rows.value.length > 1) {
    rows.value.splice(index, 1);
  }
};

const submitForm = () => {
  console.log('Form data:', {
    mainForm: form.value,
    madrasaList: rows.value
  })
}



const selectedFile = ref(null)
const showPreview = ref(false)
const fileUrl = ref('')
const fileType = ref('')

const handleFileSelect = (event) => {
  const file = event.target.files[0]
  if (file) {
    selectedFile.value = file
    fileUrl.value = URL.createObjectURL(file)
    fileType.value = file.type.split('/')[0] // 'image' or 'application'
    showPreview.value = true
  }
}

const closePreview = () => {
  showPreview.value = false
  fileUrl.value = ''
}













</script>

<template>
<AuthenticatedLayout>
    <div class="p-6 bg-gradient-to-r from-gray-50 to-gray-100 rounded-md shadow-lg mx-5 mt-5 mb-3">
    <!-- Category Selection -->
    <div class="flex-1 min-w-[150px] mb-6">
    <label class="block text-xl font-semibold text-emerald-800 mb-2">

      মারকাযের স্তর নির্বাচন করুন
    </label>
    <select v-model="selectedCategory" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm">
      <option value="">নির্বাচন করুন</option>
      <option value="darsiyat">দরসিয়াত</option>
      <option value="hifz">হিফজ</option>
      <option value="qirat">কিরাত</option>
    </select>
  </div>

  <!-- Madrasa Info Section -->
  <div class="p-6 bg-white rounded-md shadow-md border border-emerald-200">
    <h2 class="text-2xl font-bold text-emerald-700 mb-6">

      আবেদনকৃত মাদরাসার তথ্য
    </h2>

    <div class="flex flex-wrap gap-6">
      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          ফযীলত
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>

      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          সানাবিয়া ‍উলইয়া
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>

      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          সানাবিয়া
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>

      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          মুতাওয়াসসিতা
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>

      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          ইবতেদাইয়্যাহ
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>

      <div class="flex-1 min-w-[150px]">
        <label class="block text-lg font-medium text-emerald-700 mb-2">

          হিফজুল কোরান
        </label>
        <input type="number" class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm" placeholder="ছাত্র সংখ্যা লিখুন" />
      </div>
    </div>
  </div>

    <!-- Dynamic Rows Section -->
  <div class="mb-8 mt-6">
    <h3 class="text-xl text-emerald-800 font-bold mb-4 arabic-font">আবেদনকৃত মাদরাসায় পরীক্ষা দিতে ইচ্ছুক মাদরাসার তালিকা ও তথ্য</h3>

    <div class="flex flex-col gap-6">
      <div v-for="(row, index) in rows"
           :key="index"
           class="bg-white p-6 rounded-md shadow-md border border-emerald-200 hover:border-emerald-300 transition-all duration-300">

        <div class="flex flex-wrap gap-6 items-end">
          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">ফযীলত</label>
            <input type="number"
                   v-model="row.fazilat"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">সানাবিয়া ‍উলইয়া</label>
            <input type="number"
                   v-model="row.sanabiya_ulya"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">সানাবিয়া</label>
            <input type="number"
                   v-model="row.sanabiya"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">মুতাওয়াসসিতা</label>
            <input type="number"
                   v-model="row.mutawassita"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">ইবতেদাইয়্যাহ</label>
            <input type="number"
                   v-model="row.ibtedaiyyah"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">হিফজুল কোরান</label>
            <input type="number"
                   v-model="row.hifzul_quran"
                   class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
                   placeholder="ছাত্র সংখ্যা লিখুন" />
          </div>

          <div class="flex-1 min-w-[150px]">
            <label class="block text-lg font-medium text-emerald-700 mb-2 arabic-font">মাদরাসা নির্বাচন করুন</label>
            <select v-model="row.madrasa"
                    class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm">
              <option value="">মাদরাসা সিলেক্ট করুন</option>
              <option value="mad1">Madarsa 1</option>
              <option value="mad2">Madarsa 2</option>
            </select>
          </div>

          <button v-if="rows.length > 1"
                  @click="removeRow(index)"
                  class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow-md">
            সারি মুছুন
          </button>
        </div>
      </div>

      <button @click="addRow"
              class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition-colors duration-200 shadow-md w-fit">
        নতুন সারি যোগ করুন +
      </button>
    </div>
  </div>

    <!-- Requirements Section -->
      <div class="mb-8 bg-white p-6 rounded-md shadow-md border border-emerald-200">
    <label class="block text-xl text-emerald-800 font-bold mb-4 arabic-font">মারকায প্রাপ্তির প্রয়োজনীয়তা</label>
    <textarea
      v-model="form.requirements"
      class="w-full px-4 py-2 border border-emerald-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 bg-white shadow-sm"
      rows="4">
    </textarea>
  </div>

  <!-- File Upload Section -->
  <div class="bg-white rounded-md shadow-md border border-emerald-200 p-6">
    <h3 class="text-xl text-emerald-800 font-bold mb-6 arabic-font">সংযুক্তি</h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Muhtamim's Consent -->
      <div class="space-y-3">
        <label class="block text-lg font-medium text-emerald-700 arabic-font">মুহতামিমের সম্মতিপত্র</label>
        <div class="relative">
          <input
            type="file"
            @change="handleFileSelect"
            class="absolute inset-0 opacity-0 w-full h-full cursor-pointer"
            accept="image/*,.pdf,.doc,.docx"
          >
          <div class="flex items-center border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
            <span class="text-emerald-600 arabic-font">ফাইল আপলোড করুন</span>
          </div>
        </div>
      </div>

      <!-- District President's Consent -->
      <div class="space-y-3">
        <label class="block text-lg font-medium text-emerald-700 arabic-font">জেলা সভাপতির সম্মাতি</label>
        <div class="relative">
          <input
            type="file"
            @change="handleFileSelect"
            class="absolute inset-0 opacity-0 w-full h-full cursor-pointer"
            accept="image/*,.pdf,.doc,.docx"
          >
          <div class="flex items-center border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
            <span class="text-emerald-600 arabic-font">ফাইল আপলোড করুন</span>
          </div>
        </div>
      </div>

      <!-- Committee Resolution -->
      <div class="space-y-3">
        <label class="block text-lg font-medium text-emerald-700 arabic-font">কমিটি রেজুলেশন</label>
        <div class="relative">
          <input
            type="file"
            @change="handleFileSelect"
            class="absolute inset-0 opacity-0 w-full h-full cursor-pointer"
            accept="image/*,.pdf,.doc,.docx"
          >
          <div class="flex items-center border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
            <span class="text-emerald-600 arabic-font">ফাইল আপলোড করুন</span>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Preview Modal -->
    <div v-if="showPreview" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded-md max-w-4xl w-full mx-4">
        <div class="flex justify-end mb-4">
          <button @click="closePreview" class="p-2 hover:bg-gray-100 rounded-full transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <img v-if="fileType === 'image'" :src="fileUrl" class="max-h-[80vh] mx-auto" alt="Preview">
        <iframe v-else :src="fileUrl" class="w-full h-[80vh]" frameborder="0"></iframe>
      </div>
    </div>
  </div>

    <div class="mt-8 mx-5">
      <button
        @click="submitForm"
        class="px-6 py-2 mb-5 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
      >
        সেভ করুন
      </button>
    </div>
</AuthenticatedLayout>

</template>
<style scoped>
.modal-enter-active,
.modal-leave-active {
  transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}
</style>
