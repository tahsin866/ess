<template>
    <AuthenticatedLayout>
        <div class=" mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
          <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
          <div class="flex items-center justify-between relative z-10">
            <div class="flex items-center gap-3">
              <i class="fas fa-user-edit text-2xl text-white"></i>
              <h5 class="text-white text-xl font-arabic">ছাত্র তথ্য সম্পাদনা</h5>
            </div>
            <div class="flex space-x-2">
              <button @click="saveChanges" class="bg-white text-emerald-700 px-4 py-2 rounded-md hover:bg-emerald-50 transition-colors font-arabic flex items-center gap-2">
                <i class="fas fa-save"></i> সংরক্ষণ করুন
              </button>
              <button @click="goBack" class="bg-transparent text-white border border-white px-4 py-2 rounded-md hover:bg-white/10 transition-colors font-arabic flex items-center gap-2">
                <i class="fas fa-arrow-left"></i> ফিরে যান
              </button>
            </div>
          </div>
        </div>

        <div class="p-6">
          <form @submit.prevent="submitForm" class="space-y-8">
            <!-- Personal Information Section -->
            <div class="bg-white rounded-sm shadow border border-emerald-100">
              <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md flex items-center gap-3">
                <i class="fas fa-user-circle text-2xl text-white"></i>
                <h5 class="text-white text-xl font-arabic">ব্যক্তিগত তথ্য</h5>
              </div>

              <div class="p-6">
                <!-- Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (বাংলা)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-emerald-600"></i>
                      </span>
                      <input
                       v-model="form.Name"
                        type="text"
                        disabled
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-gray-700 cursor-not-allowed"
                      >
                    </div>
                    <p class="text-xs text-gray-500 mt-1 italic">* এই ফিল্ডটি পরিবর্তন করা যাবে না</p>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (ইংরেজি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-emerald-600"></i>
                      </span>
                      <input

                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম (আরবি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-emerald-600"></i>
                      </span>
                      <input

                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        dir="rtl"
                      >
                    </div>
                  </div>
                </div>

                <!-- Father's Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার নাম (বাংলা)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-male text-emerald-600"></i>
                      </span>
                      <input
                           v-model="form.Father"
                        type="text"
                        disabled
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-gray-700 cursor-not-allowed"
                      >
                    </div>
                    <p class="text-xs text-gray-500 mt-1 italic">* এই ফিল্ডটি পরিবর্তন করা যাবে না</p>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার নাম (ইংরেজি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-male text-emerald-600"></i>
                      </span>
                      <input
                        v-model="studentData.fatherNameEnglish"
                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার নাম (আরবি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-male text-emerald-600"></i>
                      </span>
                      <input
                        v-model="studentData.fatherNameArabic"
                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        dir="rtl"
                      >
                    </div>
                  </div>
                </div>

                <!-- Mother's Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (বাংলা)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-female text-emerald-600"></i>
                      </span>
                      <input
                        v-model="studentData.motherNameBangla"
                        type="text"
                        disabled
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-gray-700 cursor-not-allowed"
                      >
                    </div>
                    <p class="text-xs text-gray-500 mt-1 italic">* এই ফিল্ডটি পরিবর্তন করা যাবে না</p>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (ইংরেজি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-female text-emerald-600"></i>
                      </span>
                      <input
                        v-model="studentData.motherNameEnglish"
                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার নাম (আরবি)</label>
                    <div class="relative">
                      <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-female text-emerald-600"></i>
                      </span>
                      <input
                        v-model="studentData.motherNameArabic"
                        type="text"
                        class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        dir="rtl"
                      >
                    </div>
                  </div>

                  <div class="relative">
                  <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                    <i class="fas fa-id-card text-emerald-600"></i>
                    জন্ম-নিবন্ধন নম্বর
                  </label>
                  <div class="relative">
                    <input
                      v-model="studentData.birthRegNo"
                      type="text"

                      class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md  text-emerald-800 "
                    >
                  </div>
                </div>


                <div class="relative">
                  <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                    <i class="fas fa-id-card text-emerald-600"></i>
                  জাতীয় পরীচয়পত্র
                  </label>
                  <div class="relative">
                    <input
                      v-model="studentData.birthRegNo"
                      type="text"

                      class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md  text-emerald-800 "
                    >
                  </div>
                </div>
                </div>
              </div>
            </div>

            <!-- Student Information Section -->
            <div class="bg-white rounded-lg shadow border border-emerald-100">
              <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
                <div class="flex items-center gap-3 relative z-10">
                  <i class="fas fa-graduation-cap text-2xl text-white"></i>
                  <h5 class="text-white text-xl font-arabic">বিগত পরীক্ষার তথ্য</h5>
                </div>
              </div>

              <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-school text-emerald-600"></i>
                      মাদরাসা
                    </label>
                    <div class="relative">
                      <input
                         v-model="form.Madrasha"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-school text-emerald-600"></i>
                      মারকায
                    </label>
                    <div class="relative">
                      <input
                         v-model="form.Markaj"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>


                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-layer-group text-emerald-600"></i>
                      শ্রেণী
                    </label>
                    <div class="relative">
                      <input
                        v-model="form.Class"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-id-card text-emerald-600"></i>
                      রোল নম্বর
                    </label>
                    <div class="relative">
                      <input
                         v-model="form.Roll"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>


                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-emerald-600"></i>
                    জন্ম-তারিখ
                  </label>
                  <div class="relative">
                    <input
                    v-model="form.DateofBirth"
                      type="date"
                      disabled
                      class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                    >
                  </div>
                </div>




                </div>


            </div>
          </div>




          <div class="bg-white rounded-lg shadow border border-emerald-100">
              <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
                <div class="flex items-center gap-3 relative z-10">
                  <i class="fas fa-graduation-cap text-2xl text-white"></i>
                  <h5 class="text-white text-xl font-arabic">বর্তমান পরীক্ষার তথ্য</h5>
                </div>
              </div>

              <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-school text-emerald-600"></i>
                      মাদরাসা
                    </label>
                    <div class="relative">
                      <input
                        v-model="studentData.madrasha"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-school text-emerald-600"></i>
                      মারকায
                    </label>
                    <div class="relative">
                      <input
                        v-model="studentData.madrasha"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>


                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-layer-group text-emerald-600"></i>
                      শ্রেণী
                    </label>
                    <div class="relative">
                      <input
                        v-model="studentData.class"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>

                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                      <i class="fas fa-id-card text-emerald-600"></i>
                      রোল নম্বর
                    </label>
                    <div class="relative">
                      <input
                        v-model="studentData.roll"
                        type="text"
                        disabled
                        class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                      >
                    </div>
                  </div>


                  <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-emerald-600"></i>
                    জন্ম-তারিখ
                  </label>
                  <div class="relative">
                    <input
                      v-model="studentData.dateOfBirth"
                      type="date"
                      disabled
                      class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                    >
                  </div>
                </div>




                </div>

                <div class="grid grid-cols-1  gap-6 mt-6">

                    <div class="relative">
                    <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-emerald-600"></i>
              অনিয়মিত  হলে পরীক্ষা দিতে হবে এমন কিতাবের নাম
                  </label>
                  <div class="relative">
                    <input
                      v-model="studentData.dateOfBirth"
                      type="date"
                      disabled
                      class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed"
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Address Section -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Present Address -->
    <div class="bg-white rounded-md shadow border border-emerald-100">
      <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
        <div class="flex items-center gap-3 relative z-10">
          <i class="fas fa-map-marker-alt text-2xl text-white"></i>
          <h5 class="text-white text-xl font-arabic">বর্তমান ঠিকানা</h5>
        </div>
      </div>

      <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
        <div class="grid grid-cols-1 gap-4">
          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              বিভাগ
            </label>
            <div class="relative">
              <select
                v-model="studentData.presentDivision"
                @change="loadPresentDistricts"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
              >
                <option value="" disabled>বিভাগ নির্বাচন করুন</option>
                <option v-for="division in divisions" :key="division.id" :value="division.name">
                  {{ division.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              জেলা
            </label>
            <div class="relative">
              <select
                v-model="studentData.presentDistrict"
                @change="loadPresentUpazilas"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
                :disabled="!studentData.presentDivision"
              >
                <option value="" disabled>জেলা নির্বাচন করুন</option>
                <option v-for="district in presentDistricts" :key="district.id" :value="district.name">
                  {{ district.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              থানা/উপজেলা
            </label>
            <div class="relative">
              <select
                v-model="studentData.presentUpazila"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
                :disabled="!studentData.presentDistrict"
              >
                <option value="" disabled>থানা/উপজেলা নির্বাচন করুন</option>
                <option v-for="upazila in presentUpazilas" :key="upazila.id" :value="upazila.name">
                  {{ upazila.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Permanent Address -->
    <div class="bg-white rounded-md shadow border border-emerald-100">
      <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-4 rounded-t-md relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
        <div class="flex items-center gap-3 relative z-10">
          <i class="fas fa-home text-2xl text-white"></i>
          <h5 class="text-white text-xl font-arabic">স্থায়ী ঠিকানা</h5>
        </div>
      </div>

      <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
        <div class="grid grid-cols-1 gap-4">
          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              বিভাগ
            </label>
            <div class="relative">
              <select
                v-model="studentData.permanentDivision"
                @change="loadPermanentDistricts"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
              >
                <option value="" disabled>বিভাগ নির্বাচন করুন</option>
                <option v-for="division in divisions" :key="division.id" :value="division.name">
                  {{ division.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              জেলা
            </label>
            <div class="relative">
              <select
                v-model="studentData.permanentDistrict"
                @change="loadPermanentUpazilas"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
                :disabled="!studentData.permanentDivision"
              >
                <option value="" disabled>জেলা নির্বাচন করুন</option>
                <option v-for="district in permanentDistricts" :key="district.id" :value="district.name">
                  {{ district.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              থানা/উপজেলা
            </label>
            <div class="relative">
              <select
                v-model="studentData.permanentUpazila"
                class="w-full pl-4 pr-10 py-2 border border-emerald-200 rounded-md bg-white text-emerald-800 appearance-none"
                :disabled="!studentData.permanentDistrict"
              >
                <option value="" disabled>থানা/উপজেলা নির্বাচন করুন</option>
                <option v-for="upazila in permanentUpazilas" :key="upazila.id" :value="upazila.name">
                  {{ upazila.name }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

          <!-- Attachment Section -->
          <div class="bg-white rounded-lg shadow border border-emerald-100">
            <div class="bg-white rounded-md shadow-md border border-emerald-200 p-6">
              <h3 class="text-xl text-emerald-800 font-bold mb-6 arabic-font">সংযুক্তি</h3>

              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Student Photo -->
                <div class="space-y-3">
                  <label class="block text-lg font-medium text-emerald-700 arabic-font">ছাত্রের ছবি (পাসপোর্ট সাইজ এবং নীল ব্যাকগ্রাইন্ড হতে হবে)</label>
                  <div class="relative">
                    <div
                      class="flex items-center justify-between border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
                      <span class="text-emerald-600 arabic-font">
                        {{ muhtamimFile ? muhtamimFile.name : 'ফাইল আপলোড করুন' }}
                      </span>
                      <div v-if="muhtamimPreview"
                        class="flex items-center space-x-2 relative z-10 pointer-events-auto">
                        <a :href="muhtamimPreview" target="_blank"
                          class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                        <button @click.stop="removeFileMumtahin('muhtamim')"
                          class="text-red-600 hover:text-red-800">মুছুন</button>
                      </div>
                    </div>
                    <input type="file" @change="handleFileUploadMumtahin($event, 'muhtamim')"
                      class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-0"
                      accept="image/*,.pdf,.doc,.docx">
                  </div>
                </div>

                <!-- Birth Certificate/NID -->
                <div class="space-y-3">
                  <label class="block text-lg font-medium text-emerald-700 arabic-font">জন্ম নিবন্ধন/এন আইডি সংযুক্তি করুন</label>
                  <div class="relative">
                    <div
                      class="flex items-center justify-between border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
                      <span class="text-emerald-600 arabic-font">
                        {{ presidentFile ? presidentFile.name : 'ফাইল আপলোড করুন' }}
                      </span>
                      <div v-if="presidentPreview"
                        class="flex items-center space-x-2 relative z-10 pointer-events-auto">
                        <a :href="presidentPreview" target="_blank"
                          class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                        <button @click.stop="removeFileMumtahin('president')"
                          class="text-red-600 hover:text-red-800">মুছুন</button>
                      </div>
                    </div>
                    <input type="file" @change="handleFileUploadMumtahin($event, 'president')"
                      class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-0"
                      accept="image/*,.pdf,.doc,.docx">
                  </div>
                </div>

                <!-- Marksheet -->

              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex justify-end space-x-4">
            <button
              type="button"
              @click="goBack"
              class="px-6 py-3 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors font-arabic flex items-center gap-2">
              <i class="fas fa-times"></i> বাতিল করুন
            </button>

            <button
                                type="submit"
                                class="px-6 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition-colors flex items-center gap-2"
                                :disabled="form.processing"
                            >
                                <i class="fas fa-save"></i>
                                <span v-if="form.processing">সংরক্ষণ হচ্ছে...</span>
                                <span v-else>সংরক্ষণ করুন</span>
                            </button>
          </div>
        </form>
    </div>

      </div>
    </div>
    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
// Student data with initial values
const props = defineProps({
    roll: String,
    reg_id: String
});

const student = ref(null);
const loading = ref(true);
const error = ref(null);

// Student types for dropdown
// const studentTypes = [
//     { value: 'নিয়মিত', label: 'নিয়মিত' },
//     { value: 'অনিয়মিত যেমনী', label: 'অনিয়মিত যেমনী' },
//     { value: 'অনিয়মিত অন্যান্য', label: 'অনিয়মিত অন্যান্য' }
// ];

// Form for updating student data
const form = useForm({
    id: '',
    Name: '',
    Father: '',
    Mother: '',
    DateofBirth: '',
    student_type: '',
    Class: '',
    reg_id: '',
    Roll: '',
    Madrasha: '',
    Markaj: '',
    Division: '',
    marhalaId: ''
});

onMounted(async () => {
    try {
        const response = await axios.get('/api/get-student-for-edit', {
            params: {
                roll: props.roll,
                reg_id: props.reg_id
            }
        });

        student.value = response.data;

        // Populate the form with student data
        form.id = student.value.id;
        form.Name = student.value.Name;
        form.Father = student.value.Father;
        form.Mother = student.value.Mother || '';
        form.DateofBirth = student.value.DateofBirth;
        form.student_type = student.value.student_type;
        form.Class = student.value.Class;
        form.reg_id = student.value.reg_id;
        form.Roll = student.value.Roll;
        form.Madrasha = student.value.Madrasha;
        form.Markaj = student.value.Markaj;
        form.Division = student.value.Division || '';
        form.marhalaId = student.value.marhalaId || '';

        loading.value = false;
    } catch (err) {
        error.value = 'ছাত্রের তথ্য লোড করতে সমস্যা হয়েছে';
        loading.value = false;
        console.error('Error fetching student data:', err);
    }
});

const submitForm = () => {
    form.post(route('students_registration.update'));
};

// Attachment files
const muhtamimFile = ref(null);
const muhtamimPreview = ref(null);
const presidentFile = ref(null);
const presidentPreview = ref(null);
const committeeFile = ref(null);
const committeePreview = ref(null);

// Save changes to the database
const saveChanges = () => {
  // Here you would implement the API call to save the data
  // For example:
  // axios.put(`/api/students/${route.params.id}`, {
  //   nameEnglish: studentData.value.nameEnglish,
  //   nameArabic: studentData.value.nameArabic,
  //   fatherNameEnglish: studentData.value.fatherNameEnglish,
  //   fatherNameArabic: studentData.value.fatherNameArabic,
  //   motherNameEnglish: studentData.value.motherNameEnglish,
  //   motherNameArabic: studentData.value.motherNameArabic
  // })

  // For now, just show a success message
  alert('তথ্য সফলভাবে সংরক্ষণ করা হয়েছে!');
};

// Go back to previous page without using router
const goBack = () => {
  // Using window.history instead of Vue Router
  window.history.back();
};

// Handle file upload for attachments
const handleFileUploadMumtahin = (event, type) => {
  const file = event.target.files[0];
  if (!file) return;

  // Set the file based on type
  if (type === 'muhtamim') {
    muhtamimFile.value = file;
    createFilePreview(file, 'muhtamim');
  } else if (type === 'president') {
    presidentFile.value = file;
    createFilePreview(file, 'president');
  } else if (type === 'committee') {
    committeeFile.value = file;
    createFilePreview(file, 'committee');
  }
};

// Create file preview
const createFilePreview = (file, type) => {
  const reader = new FileReader();
  reader.onload = (e) => {
    if (type === 'muhtamim') {
      muhtamimPreview.value = e.target.result;
    } else if (type === 'president') {
      presidentPreview.value = e.target.result;
    } else if (type === 'committee') {
      committeePreview.value = e.target.result;
    }
  };
  reader.readAsDataURL(file);
};

// Remove file
const removeFileMumtahin = (type) => {
  if (type === 'muhtamim') {
    muhtamimFile.value = null;
    muhtamimPreview.value = null;
  } else if (type === 'president') {
    presidentFile.value = null;
    presidentPreview.value = null;
  } else if (type === 'committee') {
    committeeFile.value = null;
    committeePreview.value = null;
  }
};

// Fetch student data when component is mounted
onMounted(() => {
  // Here you would fetch the student data from the API
  // For example:
  // axios.get(`/api/students/${route.params.id}`)
  //   .then(response => {
  //     studentData.value = response.data;
  //   })
  //   .catch(error => {
  //     console.error('Error fetching student data:', error);
  //   });
});
</script>


<style scoped>

</style>
