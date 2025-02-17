<script setup>
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
  <div class="p-6 bg-white rounded-lg shadow-lg mt-5 mb-3">
    <!-- First Section -->
   <div class="mb-8 mt-5">
    <h3 class="text-xl text-blue-600 font-semibold mb-4">আবেদনকৃত মাদরাসায় পরীক্ষা দিতে ইচ্ছুক মাদরাসার তালিকা ও তথ্য</h3>
    <div class="flex flex-col gap-4">
      <div
        v-for="(row, index) in rows"
        :key="index"
        class="flex flex-wrap gap-4 items-end border p-4 rounded-md shadow-md"
      >
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">ফযীলত</label>
          <input
            type="number"
            v-model="row.fazilat"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">সানাবিয়া ‍উলইয়া</label>
          <input
            type="number"
            v-model="row.sanabiya_ulya"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">সানাবিয়া</label>
          <input
            type="number"
            v-model="row.sanabiya"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">মুতাওয়াসসিতা</label>
          <input
            type="number"
            v-model="row.mutawassita"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">ইবতেদাইয়্যাহ</label>
          <input
            type="number"
            v-model="row.ibtedaiyyah"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">হিফজুল কোরান</label>
          <input
            type="number"
            v-model="row.hifzul_quran"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
            placeholder="ছাত্র সংখ্যা লিখুন"
          />
        </div>
        <div class="flex-1 min-w-[150px]">
          <label class="block text-xl font-medium text-gray-700">মাদরাসা নির্বাচন করুন</label>
          <select
            v-model="row.madrasa"
            class="w-full px-3 py-2 border border-gray-300 rounded-md"
          >
            <option value="">মাদরাসা সিলেক্ট করুন</option>
            <option value="mad1">Madarsa 1</option>
            <option value="mad2">Madarsa 2</option>
          </select>
        </div>

        <!-- Remove Button -->
        <div>
          <button
            v-if="rows.length > 1"
            @click="removeRow(index)"
            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
          >
            -
          </button>
        </div>
      </div>

      <!-- Add Row Button -->
      <button
        @click="addRow"
        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
      >
        +
      </button>
    </div>
  </div>

    <!-- Second Section -->
    <div class="mb-8">
      <div class="mt-4">
        <label class="block text-xl text-blue-600 font-semibold  mb-2">মারকায প্রাপ্তির প্রয়োজনীয়তা</label>
        <textarea 
          v-model="form.requirements"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
          rows="4"
        ></textarea>
      </div>
    </div>

    <!-- Third Section -->
 <div class="mb-8">
    <h3 class="text-xl text-blue-600 font-semibold mb-4">সংযুক্তি</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="space-y-2">
         <label class="block text-lg font-medium text-gray-700 mb-2">ফাইল নির্বাচন করুন</label>
  <div class="relative flex items-center border border-gray-300 rounded-md overflow-hidden bg-white">
    <input 
      type="file"
      @change="handleFileSelect"
      class="absolute inset-0 opacity-0 w-full h-full cursor-pointer"
      accept="image/*,.pdf,.doc,.docx"
    >
    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-l-md hover:bg-blue-600">
      ফাইল আপলোড
    </button>
    <span class="px-4 py-2 flex-1 text-gray-700 truncate bg-gray-100">{{ selectedFileName || "কোনো ফাইল নির্বাচিত হয়নি" }}</span>
  </div>
</div>
        
        <!-- Preview Modal -->
        <div v-if="showPreview" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
          <div class="bg-white p-4 rounded-lg max-w-4xl w-full mx-4">
            <div class="flex justify-end mb-2">
              <button 
                @click="closePreview"
                class="bg-gray-200 p-2 rounded-full hover:bg-gray-300"
              >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            
            <!-- Image Preview -->
            <img 
              v-if="fileType === 'image'"
              :src="fileUrl"
              class="max-h-[80vh] mx-auto"
              alt="Preview"
            >
            
            <!-- Document Preview -->
            <iframe
              v-else
              :src="fileUrl"
              class="w-full h-[80vh]"
              frameborder="0"
            ></iframe>
          </div>
        </div>

        <!-- File Name Display -->
        <div v-if="selectedFile" class="mt-2 text-sm text-gray-600">
          Selected: {{ selectedFile.name }}
        </div>
      </div>
    </div>
  </div>

    <div class="mt-8">
      <button 
        @click="submitForm"
        class="px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
      >
        সেভ করুন
      </button>
    </div>

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