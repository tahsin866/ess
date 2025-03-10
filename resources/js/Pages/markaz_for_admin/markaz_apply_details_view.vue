<script setup>
import { ref,computed } from "vue";
import AuthenticatedLayout from "@/Layouts/admin/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

const props = defineProps({
  markazDetails: {
    type: Object,
    required: true
  },
  application: {
    type: Object,
    required: true
  }
});






const statusText = ref("পেন্ডিং");
const isRejectModalOpen = ref(false);
const rejectReason = ref("");
const returnImage = ref(null);
const rejectImage = ref(null);


const openRejectModal = () => {
  isRejectModalOpen.value = true;
};

const closeRejectModal = () => {
  isRejectModalOpen.value = false;
  rejectReason.value = "";
  rejectImage.value = null;
};

const handleReturnImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      returnImage.value = reader.result;
    };
    reader.readAsDataURL(file);
  }
};

const handleRejectImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      rejectImage.value = reader.result;
    };
    reader.readAsDataURL(file);
  }
};

const removeReturnImage = () => {
  returnImage.value = null;
};

const removeRejectImage = () => {
  rejectImage.value = null;
};



const submitRejectReason = () => {
  console.log("রিজেক্ট কারণ:", rejectReason.value);
  closeRejectModal();
};




// const isReturnModalOpen = ref(false);

const isReturnModalOpen = ref(false);
const returnReason = ref('');
const imagePreview = ref(null);
const selectedImage = ref(null);

// মডাল ওপেন করার ফাংশন
const openReturnModal = () => {
  isReturnModalOpen.value = true;
};

// মডাল ক্লোজ করার ফাংশন
const closeReturnModal = () => {
  isReturnModalOpen.value = false;
  returnReason.value = '';
  selectedImage.value = null;
  imagePreview.value = null;
};

// ইমেজ আপলোড হ্যান্ডলার
const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    selectedImage.value = file;
    const reader = new FileReader();
    reader.onload = () => {
      imagePreview.value = reader.result;
    };
    reader.readAsDataURL(file);
  }
};

// ইমেজ রিমুভ করার ফাংশন
const removeImage = () => {
  selectedImage.value = null;
  imagePreview.value = null;
};

// ফেরতের কারণ সাবমিট করার ফাংশন
const submitReturnReason = () => {
    if (!returnReason.value.trim()) {
        alert('অনুগ্রহ করে কারণ লিখুন!');
        return;
    }

    const formData = new FormData();
    // Sending the admin feedback message
    formData.append('message', returnReason.value.trim());

    // Sending image if selected
    if (selectedImage.value) {
        formData.append('image', selectedImage.value);
    }

    // Get the ID from props or route params
    const id = props.application?.id || route().params.id;

    router.post(route('markaz.reject', id), formData, {
        onSuccess: () => {
            closeReturnModal();
            alert('আবেদন সফলভাবে ফেরত পাঠানো হয়েছে!');
            // Optionally refresh the page to show updated data
            window.location.reload();
        },
        onError: (errors) => {
            alert(errors.message || 'কিছু সমস্যা হয়েছে!');
        }
    });
};









</script>

<template>
  <Head title="মারকায মাদরাসার বিস্তারিত" />

  <AuthenticatedLayout>
    <div class="py-12">
      <div class=" mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-sm">
          <!-- Header -->
          <div class="bg-gradient-to-r from-emerald-900 to-emerald-800 p-6">
            <h2 class="text-2xl font-bold text-white text-center">
              মারকায মাদরাসার বিস্তারিত তথ্য
            </h2>
          </div>

          <!-- Main Content -->
          <div class="p-6">
            <!-- Basic Info -->
            <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">
                মূল মাদরাসার তথ্য
              </h3>
              <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50 w-1/4">
                      <div class="text-xl font-medium text-gray-900">মাদরাসার নাম</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-md font-semibold text-gray-900">{{ markazDetails.madrasha_Name}}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                      <div class="text-xl font-medium text-gray-900">আবেদনের তারিখ</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.created_at }}</div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Student Statistics -->
            <div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">
                মূল মাদরাসার শ্রেণিভিত্তিক ছাত্র সংখ্যা
              </h3>
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">ফাযীলাত</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">সানাবিয়া উলইয়া</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">সানাবিয়া</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">মুতাওয়াসসিতা</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">ইবতেদাইয়্যাহু</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">তাহফিজুল কোরআন</th>


                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.fazilat }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.sanabiya_ulya }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.sanabiya }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.mutawassita }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.ibtedaiyyah }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.hifzul_quran }}</div>
                    </td>
                  </tr>



                  <tr>
    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
        <div class="text-xl font-medium text-gray-900">মারকায টাইপ</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-md font-semibold text-gray-900">{{ markazDetails.markaz_type }}</div>
    </td>
</tr>
<tr>
    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
        <div class="text-xl font-medium text-gray-900">পরীক্ষার নাম</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-md font-semibold text-gray-900">{{ markazDetails.exam_name }}</div>
    </td>
</tr>


                </tbody>
              </table>
            </div>

            <div class="mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">
        প্রয়োজনীয় তথ্য
    </h3>
    <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
        <div class="text-xl font-medium text-gray-900">প্রয়োজনীয়তা</div>
    </td>
    <td class="px-6 py-4">
        <div class="max-h-32 overflow-y-auto text-md text-gray-900 pr-4">
            {{ markazDetails.requirements }}
        </div>
    </td>
</tr>
            <tr>
    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
        <div class="text-xl font-medium text-gray-900">মহতামিমের সম্মতি</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <a :href="'/storage/' + markazDetails.muhtamim_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>

        <a :href="'/storage/' + markazDetails.noc_file"
                         target="_blank"
                         class="inline-flex items-center mx-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
    </td>
</tr>

<tr>
    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
        <div class="text-xl font-medium text-gray-900">সভাপতির সম্মতি</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <a :href="'/storage/' + markazDetails.president_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>
        <a :href="'/storage/' + markazDetails.noc_file"
                         target="_blank"
                         class="inline-flex items-center mx-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
    </td>
</tr>
        </tbody>
    </table>
</div>


<div class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">
                সংযুক্ত ডকুমেন্টস
              </h3>
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ডকুমেন্টের নাম</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">অ্যাকশন</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-if="markazDetails.noc_file">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                        <span class="text-sm text-gray-900">NOC ফাইল</span>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">

                        <a :href="'/storage/' + markazDetails.president_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 mx-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>
                      <a :href="'/storage/' + markazDetails.noc_file"
                         target="_blank"
                         class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
                    </td>
                  </tr>
                  <tr v-if="markazDetails.resolution_file">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                        <span class="text-sm text-gray-900">রেজুলেশন ফাইল</span>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">

                        <a :href="'/storage/' + markazDetails.president_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 mx-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>


                      <a :href="'/storage/' + markazDetails.resolution_file"
                         target="_blank"
                         class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>


            <!-- Associated Madrasas -->
            <div v-if="markazDetails.associated_madrasas && markazDetails.associated_madrasas.length" class="mb-8">
              <h3 class="text-lg font-semibold text-gray-900 mb-4">
                সংযুক্ত মাদরাসা সমূহ
              </h3>
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">মাদরাসার নাম</th>
                    <th class="px-6 py-3 text-left text-md font-semibold  text-gray-500 uppercase tracking-wider">ফাযীলাত</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">সানাবিয়া উলইয়া</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">সানাবিয়া</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">মুতাওয়াসসিতাহ</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">ইবতেদায়ীয়াহ</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">হিফযুল কুরআন</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">মোট</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">সম্মতিপত্র</th>
                    <th class="px-6 py-3 text-left text-md font-semibold text-gray-500 uppercase tracking-wider">অনাপত্তিপত্র</th>

                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="madrasa in markazDetails.associated_madrasas" :key="madrasa.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.madrasa_Name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.fazilat }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.sanabiya_ulya }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.sanabiya }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.mutawassita }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.ibtedaiyyah }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ madrasa.hifzul_quran }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">
                        {{ madrasa.fazilat + madrasa.sanabiya_ulya + madrasa.sanabiya +
                           madrasa.mutawassita + madrasa.ibtedaiyyah + madrasa.hifzul_quran }}
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
        <a :href="'/storage/' + markazDetails.president_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>
        <a :href="'/storage/' + markazDetails.noc_file"
                         target="_blank"
                         class="inline-flex items-center mx-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <a :href="'/storage/' + markazDetails.president_consent"
           target="_blank"
           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700">
            <i class="fas fa-eye mr-2"></i>
            ভিউ ফাইল
        </a>
        <a :href="'/storage/' + markazDetails.noc_file"
                         target="_blank"
                         class="inline-flex items-center mx-2 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-download mr-2"></i>
                        ডাউনলোড
                      </a>
    </td>

                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Attachments -->

            <div class="p-4 bg-white shadow-md rounded-md w-full">
    <h2 class="text-lg font-semibold text-gray-800 mb-3">আবেদনের অবস্থা পরিবর্তন করুন</h2>

    <div class="flex gap-2">
      <!-- অনুমোদন বাটন -->
      <button class="px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md">
        অনুমোদন
      </button>

      <!-- ফেরত বাটন -->
      <button @click="openReturnModal"
            class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-md">
      ফেরত
    </button>


      <!-- রিজেক্ট বাটন -->
      <button @click="openRejectModal"
              class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-md">
        রিজেক্ট
      </button>
    </div>

    <p class="mt-3 text-sm font-medium text-gray-700">
      বর্তমান অবস্থা: {{ statusText }}
    </p>

    <!-- ফেরতের জন্য মডাল -->
    <div v-if="isReturnModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
      <div class="bg-white p-6 rounded-md shadow-md w-96">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">ফেরতের কারণ</h3>

        <!-- কারণ লেখার জায়গা -->
        <textarea v-model="returnReason" placeholder="ফেরতের কারণ লিখুন..."
                  class="w-full h-32 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>

        <!-- ফাইল আপলোড -->
        <div class="mt-4">
          <label class="block text-sm font-medium text-gray-700">ছবি সংযুক্ত করুন</label>
          <div class="mt-1 flex items-center">
            <input type="file" @change="handleImageUpload"
                   class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
        </div>

        <!-- প্রিভিউ দেখানোর জায়গা -->
        <div v-if="imagePreview" class="mt-4 relative">
          <img :src="imagePreview" class="w-full h-40 object-cover rounded-md border border-gray-300">
          <button @click="removeImage"
                  class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
            ❌
          </button>
        </div>

        <!-- বাটন সেকশন -->
        <div class="flex justify-end mt-4 gap-2">
          <button @click="closeReturnModal" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-md">
            বাতিল
          </button>
          <button @click="submitReturnReason" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
            সাবমিট
          </button>
        </div>
      </div>
    </div>


    <!-- রিজেক্টের জন্য মডাল -->
    <div v-if="isRejectModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
      <div class="bg-white p-6 rounded-md shadow-md w-96">
        <h3 class="text-lg font-semibold text-gray-800 mb-3">রিজেক্টের কারণ লিখুন</h3>

        <textarea v-model="rejectReason" placeholder="রিজেক্টের কারণ লিখুন..."
                  class="w-full h-32 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>

        <div class="mt-4">
          <label class="block text-sm font-medium text-gray-700">ছবি সংযুক্ত করুন</label>
          <input type="file" @change="handleRejectImageUpload"
                 class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div v-if="rejectImage" class="mt-4 relative">
          <img :src="rejectImage" class="w-full h-40 object-cover rounded-md border border-gray-300">
          <button @click="removeRejectImage"
                  class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
            ❌
          </button>
        </div>

        <div class="flex justify-end mt-4 gap-2">
          <button @click="closeRejectModal" class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-md">
            বাতিল
          </button>
          <button @click="submitRejectReason" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
            সাবমিট
          </button>
        </div>
      </div>
    </div>

  </div>




          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
