<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';

defineProps({
  markazDetails: {
    type: Object,
    required: true
  }
});
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
                      <div class="text-md font-semibold text-gray-900">{{ markazDetails.user_name }}</div>
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
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">শ্রেণি</th>
                    <th class="px-6 py-3 text-left text-xl font-medium text-gray-500 uppercase tracking-wider">ছাত্র সংখ্যা</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">ফাযীলাত</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.fazilat }}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">সানাবিয়া উলইয়া</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.sanabiya_ulya }}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">সানাবিয়া</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.sanabiya }}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">মুতাওয়াসসিতা</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.mutawassita }}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">ইবতেদাইয়্যাহু</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ markazDetails.ibtedaiyyah }}</div>
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-xl text-gray-900">তাহফিজুল কোরআন</div>
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
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
