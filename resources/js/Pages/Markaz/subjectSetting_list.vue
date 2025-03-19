<template>
    <AuthenticatedLayout>
      <div class="p-6  min-h-screen">
        <div class=" mx-auto bg-white p-6 shadow-md rounded-lg ">
          <div class="border-b-2 border-emerald-700 pb-4 mb-6">
            <h2 class="text-xl font-noto font-bold text-emerald-800 flex items-center">
              <span class="inline-block mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </span>
              মাদ্রাসার পরীক্ষার বিষয়ভিত্তিক নির্বাচন

            </h2>

          </div>

          <div v-if="loading" class="flex justify-center items-center py-10">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-emerald-700"></div>
          </div>

          <div v-else>
            <!-- আবশ্যিক বিষয় -->
            <div class="mb-8" v-if="mandatorySubjects.length > 0">
              <div class="flex items-center mb-3">
                <div class="w-8 h-8 rounded-full bg-emerald-700 flex items-center justify-center text-white mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-emerald-800">আবশ্যিক বিষয়সমূহ</h3>
              </div>

              <div class="bg-white rounded-lg border border-emerald-200 overflow-hidden">
                <div class="bg-emerald-700 text-white py-2 px-4 text-xl  text-center font-medium">
                  সকল আবশ্যিক বিষয় পরীক্ষায় অন্তর্ভুক্ত থাকবে
                </div>
                <div class="overflow-x-auto">
                  <table class="w-full border-collapse">
                    <thead>
                      <tr class="bg-emerald-50">
                        <th class="border-b border-emerald-200 p-3 text-left text-xl font-medium text-emerald-800 w-12">#</th>
                        <th class="border-b border-emerald-200 p-3 text-left text-xl font-medium text-emerald-800 w-32">কোড</th>
                        <th class="border-b border-emerald-200 p-3 text-left text-xl font-medium text-emerald-800">বিষয়</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(subject, index) in mandatorySubjects" :key="index" class="hover:bg-emerald-50 transition-colors">
                        <td class="border-b border-emerald-100 p-3 text-xl text-gray-700">{{ index + 1 }}</td>
                        <td class="border-b border-emerald-100 p-3 text-xl font-medium text-emerald-700">{{ subject.code }}</td>
                        <td class="border-b border-emerald-100 p-3 text-xl text-gray-700">{{ subject.name }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- ঐচ্ছিক বিষয় -->
            <div class="mb-8" v-if="optionalSubjects.length > 0">
              <div class="flex items-center mb-3">
                <div class="w-8 h-8 rounded-full bg-amber-600 flex items-center justify-center text-white mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-amber-800">ঐচ্ছিক বিষয়সমূহ</h3>
              </div>

              <div class="bg-white rounded-lg border border-amber-200 overflow-hidden">
                <div class="bg-amber-600 text-white py-2 px-4 font-medium flex items-center justify-between">

                  <span class="bg-white text-amber-700 px-3 py-1 rounded-full text-sm font-bold">
                 যে কোন একটি ১ টি নির্বাচন করুন
                  </span>
                </div>
                <div class="overflow-x-auto">
                  <table class="w-full border-collapse">
                    <thead>
                      <tr class="bg-amber-50">
                        <th class="border-b border-amber-200 p-3 text-left text-sm font-medium text-amber-800 w-16">নির্বাচন</th>
                        <th class="border-b border-amber-200 p-3 text-left text-sm font-medium text-amber-800 w-32">কোড</th>
                        <th class="border-b border-amber-200 p-3 text-left text-sm font-medium text-amber-800">বিষয়</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(subject, index) in optionalSubjects" :key="index" class="hover:bg-amber-50 transition-colors">
                        <td class="border-b border-amber-100 p-3 text-center">
                          <div class="flex justify-center">
                            <label class="inline-flex items-center">
                              <input type="checkbox" v-model="selectedSubjects" :value="subject.code" class="form-checkbox h-5 w-5 text-amber-600 rounded border-amber-300 focus:ring-amber-500">
                            </label>
                          </div>
                        </td>
                        <td class="border-b border-amber-100 p-3 text-sm font-medium text-amber-700">{{ subject.code }}</td>
                        <td class="border-b border-amber-100 p-3 text-sm text-gray-700">{{ subject.name }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- সাবমিট বাটন -->
            <div class="flex justify-end mt-8" v-if="optionalSubjects.length > 0">
              <button
                @click="submitSelection"
                class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 rounded-md shadow-sm transition-colors duration-200 flex items-center"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                সাবমিট করুন
              </button>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";
import axios from "axios";

// Get marhalaId from URL query parameters
const getMarhalaId = () => {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('marhala') || window.location.pathname.split('/').pop();
};

const marhalaId = getMarhalaId();

const mandatorySubjects = ref([]);
const optionalSubjects = ref([]);
const selectedSubjects = ref([]);
const loading = ref(true);

onMounted(() => {
  fetchSubjects();
});

const fetchSubjects = async () => {
  try {
    loading.value = true;
    const response = await axios.get(`/api/subjects/${marhalaId}`);

    // Map the response data to include empty code if needed
    mandatorySubjects.value = response.data.mandatorySubjects.map(subject => ({
      id: subject.id,
      name: subject.name,
      code: subject.code || '', // Use empty string if code is not provided
      syllabus_type: subject.syllabus_type
    }));

    optionalSubjects.value = response.data.optionalSubjects.map(subject => ({
      id: subject.id,
      name: subject.name,
      code: subject.code || '', // Use empty string if code is not provided
      syllabus_type: subject.syllabus_type
    }));
  } catch (error) {
    console.error("Error fetching subjects:", error);
  } finally {
    loading.value = false;
  }
};

const submitSelection = () => {
  if (selectedSubjects.value.length === 0) {
    alert("দয়া করে কমপক্ষে একটি ঐচ্ছিক বিষয় নির্বাচন করুন।");
    return;
  }

  if (selectedSubjects.value.length > 1) {
    alert("দয়া করে শুধুমাত্র একটি ঐচ্ছিক বিষয় নির্বাচন করুন।");
    return;
  }

  alert("আপনি নির্বাচিত বিষয়সমূহ: " + selectedSubjects.value.join(", "));

  // Here you can send data to the server
  // axios.post('/api/save-subject-selection', {
  //   marhalaId: marhalaId,
  //   selectedSubjects: selectedSubjects.value
  // })
  // .then(response => {
  //   // Handle success
  // })
  // .catch(error => {
  //   // Handle error
  // });
};
</script>
<style>
/* Add this to your CSS to import Noto Sans Bengali font */

</style>

