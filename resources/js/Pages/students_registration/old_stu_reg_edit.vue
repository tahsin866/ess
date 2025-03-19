<template>
    <AuthenticatedLayout>
        <div class=" mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div
                    class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-sm relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
                    <div class="flex items-center justify-between relative z-10">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-user-edit text-2xl text-white"></i>
                            <h5 class="text-white text-xl ">ছাত্র তথ্য সম্পাদনা</h5>
                        </div>
                        <div class="flex space-x-2">
                            <button @click="saveChanges"
                                class="bg-white text-emerald-700 px-4 py-1.5 rounded-md hover:bg-emerald-50 transition-colors font-arabic flex items-center gap-2">
                                <i class="fas fa-save"></i> সংরক্ষণ করুন
                            </button>
                            <button @click="goBack"
                                class="bg-transparent text-white border border-white px-4 py-1.5 rounded-md hover:bg-white/10 transition-colors font-arabic flex items-center gap-2">
                                <i class="fas fa-arrow-left"></i> ফিরে যান
                            </button>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <form @submit.prevent="submitStudentInfo" class="space-y-8">
                        <!-- Personal Information Section -->
                        <div class="bg-white rounded-sm shadow border border-emerald-100">
                            <div
                                class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md flex items-center gap-3">
                                <i class="fas fa-user-circle text-2xl text-white"></i>
                                <h5 class="text-white text-xl ">ব্যক্তিগত তথ্য</h5>
                            </div>

                            <div class="p-6">
                                <!-- Name Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম
                                            (বাংলা)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.name_bn"   type="text" disabled
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-gray-700 cursor-not-allowed">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1 italic">* এই ফিল্ডটি পরিবর্তন করা যাবে না
                                        </p>
                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম
                                            (ইংরেজি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.name_en" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">নাম
                                            (আরবি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-user text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.name_ar" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                                dir="rtl">
                                        </div>
                                    </div>
                                </div>

                                <!-- Father's Name Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার
                                            নাম (বাংলা)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-male text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.father_name_bn" type="text" disabled
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-gray-700 cursor-not-allowed">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1 italic">* এই ফিল্ডটি পরিবর্তন করা যাবে না
                                        </p>
                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার
                                            নাম (ইংরেজি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-male text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.father_name_en" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">পিতার
                                            নাম (আরবি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-male text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.father_name_ar" type="text"
                                            required
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                                dir="rtl">
                                        </div>
                                    </div>
                                </div>

                                <!-- Mother's Name Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার
                                            নাম (বাংলা)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-female text-emerald-600"></i>
                                            </span>
                                            <input   v-model="studentInfoForm.mother_name_bn" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md  text-gray-700 ">
                                        </div>


                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার
                                            নাম (ইংরেজি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-female text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.mother_name_en" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label class="block text-lg font-medium text-gray-700 mb-1 font-arabic">মাতার
                                            নাম (আরবি)</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-female text-emerald-600"></i>
                                            </span>
                                            <input v-model="studentInfoForm.mother_name_ar" type="text"
                                                class="w-full pl-10 pr-3 py-2 border border-emerald-200 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500"
                                                dir="rtl">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-id-card text-emerald-600"></i>
                                            জন্ম-নিবন্ধন নম্বর
                                        </label>
                                        <div class="relative">
                                            <input v-model="studentInfoForm.BRN_no" type="text"
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md  text-emerald-800 ">
                                        </div>
                                    </div>


                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-id-card text-emerald-600"></i>
                                            জাতীয় পরীচয়পত্র
                                        </label>
                                        <div class="relative">
                                            <input v-model="studentInfoForm.NID_no" type="text"
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md  text-emerald-800 ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Student Information Section -->
                        <div class="bg-white rounded-lg shadow border border-emerald-100">
                            <div
                                class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md relative overflow-hidden">
                                <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
                                <div class="flex items-center gap-3 relative z-10">
                                    <i class="fas fa-graduation-cap text-2xl text-white"></i>
                                    <h5 class="text-white text-xl font-arabic">বিগত পরীক্ষার তথ্য</h5>
                                </div>
                            </div>

                            <div class="p-6 bg-[url('/images/subtle-pattern.png')] bg-opacity-5">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-school text-emerald-600"></i>
                                            মাদরাসা
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.Madrasha" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-school text-emerald-600"></i>
                                            মারকায
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.Markaj" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>


                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-layer-group text-emerald-600"></i>
                                            শ্রেণী
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.Class" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-id-card text-emerald-600"></i>
                                            রোল নম্বর
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.Roll" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-id-card text-emerald-600"></i>
                                            রোল নম্বর
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.reg_id" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>




                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-calendar-alt text-emerald-600"></i>
                                            জন্ম-তারিখ
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.DateofBirth" type="date" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>


                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-calendar-alt text-emerald-600"></i>
                                            ফলাফল
                                        </label>
                                        <div class="relative">
                                            <input v-model="pastExamForm.Division" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="bg-white rounded-lg shadow border border-emerald-100">
                            <div
                                class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md relative overflow-hidden">
                                <div class="absolute inset-0 opacity-10 bg-[url('/images/islamic-pattern.png')]"></div>
                                <div class="flex items-center gap-3 relative z-10">
                                    <i class="fas fa-graduation-cap text-2xl text-white"></i>
                                    <h5 class="text-white text-xl font-arabic">বর্তমান পরীক্ষার তথ্য</h5>
                                </div>
                            </div>

                            <div class="p-6  bg-opacity-5">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-school text-emerald-600"></i>
                                            মাদরাসা
                                        </label>
                                        <div class="relative">
                                            <input v-model="currentExamForm.Madrasha" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-school text-emerald-600"></i>
                                            মারকায
                                        </label>
                                        <div class="relative">
                                            <input v-model="currentExamForm.Markaj" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>


                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            <i class="fas fa-layer-group text-emerald-600"></i>
                                            শ্রেণী
                                        </label>
                                        <div class="relative">
                                            <input v-model="currentExamForm.Class" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">

                                            পরীক্ষার্থীর ধরন
                                        </label>
                                        <div class="relative">
                                            <input v-model="currentExamForm.student_type" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>




                                    <div class="relative"
                                        v-if="currentExamForm.student_type === 'অনিয়মিত যেমনী' || currentExamForm.student_type === 'অনিয়মিত অন্যান্য'">
                                        <label
                                            class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
                                            অনিয়মিত হলে পরীক্ষা দিতে হবে এমন কিতাবের নাম
                                        </label>
                                        <div class="relative">
                                            <input v-model="currentExamForm.irregular_subjects" type="text" disabled
                                                class="w-full pl-4 pr-3 py-2 border border-emerald-200 rounded-md bg-emerald-50 text-emerald-800 cursor-not-allowed">
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>


                        <!-- Address Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Present Address -->
    <div class="bg-white rounded-md shadow border border-emerald-100">
      <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md relative overflow-hidden">
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
                v-model="presentFilters.division"
                @change="presentHandleDivisionChange"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="division in divisions" :key="division.id" :value="division.id">
                  {{ division.Division_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              জেলা
            </label>
            <div class="relative">
              <select
                v-model="presentFilters.district"
                @change="presentHandleDistrictChange"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="district in presentDistricts" :key="district.DesID" :value="district.DesID">
                  {{ district.District_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              থানা/উপজেলা
            </label>
            <div class="relative">
              <select
                v-model="presentFilters.thana"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="thana in presentThanas" :key="thana.TID" :value="thana.TID">
                  {{ thana.Thana_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Permanent Address -->
    <div class="bg-white rounded-md shadow border border-emerald-100">
      <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-6 py-3 rounded-t-md relative overflow-hidden">
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
                v-model="permanentFilters.division"
                @change="handleDivisionChange"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="division in divisions" :key="division.id" :value="division.id">
                  {{ division.Division_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              জেলা
            </label>
            <div class="relative">
                <select
                v-model="permanentFilters.district"
                @change="handleDistrictChange"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="district in districts" :key="district.DesID" :value="district.DesID">
                  {{ district.District_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>

          <div class="relative">
            <label class="text-lg font-medium text-emerald-700 mb-1 font-arabic flex items-center gap-2">
              থানা/উপজেলা
            </label>
            <div class="relative">
                <select
                v-model="permanentFilters.thana"
                class="block w-full px-4 py-2 bg-white border border-gray-200 rounded-sm focus:ring-2 focus:ring-[#2d6a4f]"
              >
                <option value="">সকল</option>
                <option v-for="thana in thanas" :key="thana.TID" :value="thana.TID">
                  {{ thana.Thana_U }}
                </option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

                        <!-- Attachment Section -->
                        <div class="bg-white rounded-md shadow border border-emerald-100">
    <div class="bg-white rounded-md shadow-md border border-emerald-200 p-6">
        <h3 class="text-xl text-emerald-800 font-bold mb-6 arabic-font">সংযুক্তি</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Student Photo -->
            <div class="space-y-3">
                <label class="block text-lg font-medium text-emerald-700 arabic-font">
                    ছাত্রের ছবি (পাসপোর্ট সাইজ এবং নীল ব্যাকগ্রাইন্ড হতে হবে)
                </label>
                <div class="relative">
                    <div class="flex items-center justify-between border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
                        <span class="text-emerald-600 arabic-font">
                            {{ studentPhoto ? studentPhoto.name : 'ফাইল আপলোড করুন' }}
                        </span>
                        <div v-if="studentPhotoPreview" class="flex items-center space-x-2 relative z-10 pointer-events-auto">
                            <a :href="studentPhotoPreview" target="_blank" class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                            <button @click.stop="removeFile('studentPhoto')" class="text-red-600 hover:text-red-800">মুছুন</button>
                        </div>
                    </div>
                    <input
                        type="file"
                        @change="handleFileUpload($event, 'studentPhoto')"
                        class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-0"
                        accept="image/*,.pdf,.doc,.docx"
                    >
                </div>
            </div>

            <!-- Birth Certificate/NID -->
            <div class="space-y-3">
                <label class="block text-lg font-medium text-emerald-700 arabic-font">
                    জন্ম নিবন্ধন/এন আইডি সংযুক্তি করুন
                </label>
                <div class="relative">
                    <div class="flex items-center justify-between border-2 border-dashed border-emerald-300 rounded-md p-4 hover:border-emerald-500 transition-colors duration-200 bg-emerald-50">
                        <span class="text-emerald-600 arabic-font">
                            {{ nidAttachment ? nidAttachment.name : 'ফাইল আপলোড করুন' }}
                        </span>
                        <div v-if="nidAttachmentPreview" class="flex items-center space-x-2 relative z-10 pointer-events-auto">
                            <a :href="nidAttachmentPreview" target="_blank" class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                            <button @click.stop="removeFile('nidAttachment')" class="text-red-600 hover:text-red-800">মুছুন</button>
                        </div>
                    </div>
                    <input
                        type="file"
                        @change="handleFileUpload($event, 'nidAttachment')"
                        class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-0"
                        accept="image/*,.pdf,.doc,.docx"
                    >
                </div>
            </div>
        </div>
    </div>
</div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-4">
                            <button type="button" @click="goBack"
                                class="px-6 py-1.5 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors font-arabic flex items-center gap-2">
                                <i class="fas fa-times"></i> বাতিল করুন
                            </button>

                            <!-- <button type="submit"
                                class="px-6 py-1.5 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 transition-colors flex items-center gap-2"
                                :disabled="pastExamForm.processing">
                                <i class="fas fa-save"></i>
                                <span v-if="pastExamForm.processing">সংরক্ষণ হচ্ছে...</span>
                                <span v-else>সংরক্ষণ করুন</span>
                            </button> -->

                            <div class="mt-6">
        <button @click.prevent="submitStudentInfo"
            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-md shadow-md">
            <i class="fas fa-save mr-2"></i> সংরক্ষণ করুন
        </button>
    </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, onMounted, reactive,watch } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';

// Student data with initial values
const props = defineProps({
    roll: String,
    reg_id: String,
    CID: String,
    modelValue: Object
});




const student = ref(null);
const loading = ref(true);
const error = ref(null);

// Past exam form
const pastExamForm = useForm({
    Name: '',
    Father: '',
    Mother: '',
    DateofBirth: '',
    Roll: '',
    reg_id: '',
    CID: '',
    Madrasha: '',
    Markaj: '',
    Class: '',
    Division: ''


});

// Current exam form
const currentExamForm = useForm({
    Madrasha: '',
    Markaj: '',
    Class: '',
    student_type: '',
    marhalaId: '',
    irregular_subjects: ''
});




const studentInfoForm = useForm({
    // student_id: '',      // Will be populated from pastExamForm.id
    name_bn: '',         // Will be populated from pastExamForm.Name
    name_en: '',         // New field for English name
    name_ar: '',         // New field for Arabic name
    father_name_bn: '',  // Will be populated from pastExamForm.Father
    father_name_en: '',  // New field for father's English name
    father_name_ar: '',  // New field for father's Arabic name
    mother_name_bn: '',  // Will be populated from pastExamForm.Mother
    mother_name_en: '',  // New field for mother's English name
    mother_name_ar: '',  // New field for mother's Arabic name
    BRN_no: '', // New field for birth certificate
    NID_no: '',
    past_Roll: '',            // New field for national ID
    past_reg_id: '',
    madrasha_name: '',
    class: '',
    Division: '',
    Date_of_birth: '',
    current_madrasha: '',
    current_markaz: '',
    student_type: '',
    current_class: '',
    exam_books_name: '',


    present_division_name: '',
    presernt_DID: '',
    present_district_name: '',
    present_desId: '',
    present_thana_name: '',
    present_TID: '',

    // New fields for permanent address
    parmanent_division_name: '',
    parmanent_DID: '',
    parmanent_district_name: '',
    parmanent_desId: '',
    parmanent_thana_name: '',
    parmanent_TID: '',
    student_image: '',
});







onMounted(async () => {
    try {
        // Get marhalaId from localStorage or another source
        const marhalaId = localStorage.getItem('marhalaId') || '';

        const response = await axios.get('/api/get-student-for-edit', {
            params: {
                roll: props.roll,
                reg_id: props.reg_id,
                CID: props.CID
            },
            headers: {
                'marhalaId': marhalaId
            }
        });

        student.value = response.data;

        // Populate the past exam form
        if (response.data.pastExam) {
            pastExamForm.Name = response.data.pastExam.Name || '';
            pastExamForm.Father = response.data.pastExam.Father || '';
            pastExamForm.Mother = response.data.pastExam.Mother || '';
            pastExamForm.DateofBirth = response.data.pastExam.DateofBirth || '';
            pastExamForm.Roll = response.data.pastExam.Roll || '';
            pastExamForm.reg_id = response.data.pastExam.reg_id || '';
            pastExamForm.Madrasha = response.data.pastExam.Madrasha || '';
            pastExamForm.Markaj = response.data.pastExam.Markaj || '';
            pastExamForm.Class = response.data.pastExam.Class || '';
            pastExamForm.Division = response.data.pastExam.Division || '';
            // studentInfoForm.student_id = response.data.pastExam.id;
        studentInfoForm.name_bn = response.data.pastExam.Name;
        studentInfoForm.father_name_bn = response.data.pastExam.Father;
        studentInfoForm.mother_name_bn = response.data.pastExam.Mother;
        studentInfoForm.past_Roll = response.data.pastExam.Roll;
        studentInfoForm.past_reg_id = response.data.pastExam.reg_id;
        studentInfoForm.madrasha_name = response.data.pastExam.Madrasha;
        studentInfoForm.class = response.data.pastExam.Class;
        studentInfoForm.Division = response.data.pastExam.Division;
        studentInfoForm.Date_of_birth = response.data.pastExam.DateofBirth;

        }

        // Populate the current exam form
        if (response.data.currentExam) {
            currentExamForm.Madrasha = response.data.currentExam.Madrasha || '';
            currentExamForm.Markaj = response.data.currentExam.Markaj || '';
            currentExamForm.Class = response.data.currentExam.Class || '';
            currentExamForm.student_type = response.data.currentExam.student_type || '';
            currentExamForm.marhalaId = response.data.currentExam.marhalaId || '';
            currentExamForm.irregular_subjects = response.data.currentExam.irregular_subjects || '';


            studentInfoForm.current_madrasha = response.data.currentExam.Madrasha
            studentInfoForm.current_markaz = response.data.currentExam.Markaj
            studentInfoForm.student_type = response.data.currentExam.student_type
            studentInfoForm.current_class = response.data.currentExam.marhalaId
            studentInfoForm.exam_books_name = response.data.currentExam.irregular_subjects
        }

        // Populate address fields if they exist in the response
        if (response.data.studentInfo) {
            studentInfoForm.present_division_name = response.data.studentInfo.present_division_name || '';
            studentInfoForm.presernt_DID = response.data.studentInfo.presernt_DID || '';
            studentInfoForm.present_district_name = response.data.studentInfo.present_district_name || '';
            studentInfoForm.present_des_id = response.data.studentInfo.present_des_id || '';
            studentInfoForm.present_thana_name = response.data.studentInfo.present_thana_name || '';
            studentInfoForm.present_TID = response.data.studentInfo.present_TID || '';

            studentInfoForm.parmanent_division_name = response.data.studentInfo.parmanent_division_name || '';
            studentInfoForm.parmanent_DID = response.data.studentInfo.parmanent_DID || '';
            studentInfoForm.parmanent_district_name = response.data.studentInfo.parmanent_district_name || '';
            studentInfoForm.parmanent_desId = response.data.studentInfo.parmanent_desId || '';
            studentInfoForm.parmanent_thana_name = response.data.studentInfo.parmanent_thana_name || '';
            studentInfoForm.parmanent_TID = response.data.studentInfo.parmanent_TID || '';
        }




        loading.value = false;
    } catch (err) {
        error.value = 'ছাত্রের তথ্য লোড করতে সমস্যা হয়েছে';
        loading.value = false;
        console.error('Error fetching student data:', err);
    }



});



const submitStudentInfo = () => {
    // আগে ঠিকানার ডাটা আপডেট করুন
    updateFormData();

    // ফাইল যোগ করুন
    if (studentPhoto.value) {
        studentInfoForm.student_image = studentPhoto.value;
    }

    if (nidAttachment.value) {
        studentInfoForm.NID_attach = nidAttachment.value;
    }

    // ফর্ম সাবমিট করুন
    studentInfoForm.post('/api/save-student-info', {
        forceFormData: true, // এটি গুরুত্বপূর্ণ - ফাইল আপলোডের জন্য FormData ব্যবহার করতে বাধ্য করে
        onSuccess: () => {
            alert('Student information saved successfully');
        },
        onError: (errors) => {
            console.error('Error saving student information:', errors);
        }
    });
};




// Separate filter objects for present and permanent addresses



// Separate refs for present and permanent address data




// Present address handlers




// Permanent address handlers





// Attachment files
const studentPhoto = ref(null);
const studentPhotoPreview = ref(null);
const nidAttachment = ref(null);
const nidAttachmentPreview = ref(null);

// ফাইল আপলোড হ্যান্ডলার
const handleFileUpload = (event, type) => {
    const file = event.target.files[0];
    if (!file) return;

    // ফাইল টাইপ অনুযায়ী সেট করুন
    if (type === 'studentPhoto') {
        studentPhoto.value = file;
        createFilePreview(file, 'studentPhoto');
    } else if (type === 'nidAttachment') {
        nidAttachment.value = file;
        createFilePreview(file, 'nidAttachment');
    }
};

// ফাইল প্রিভিউ তৈরি করুন
const createFilePreview = (file, type) => {
    const reader = new FileReader();
    reader.onload = (e) => {
        if (type === 'studentPhoto') {
            studentPhotoPreview.value = e.target.result;
        } else if (type === 'nidAttachment') {
            nidAttachmentPreview.value = e.target.result;
        }
    };
    reader.readAsDataURL(file);
};

// ফাইল রিমুভ করুন
const removeFile = (type) => {
    if (type === 'studentPhoto') {
        studentPhoto.value = null;
        studentPhotoPreview.value = null;
    } else if (type === 'nidAttachment') {
        nidAttachment.value = null;
        nidAttachmentPreview.value = null;
    }
};

// Go back to previous page without using router
const goBack = () => {
    window.history.back();
};












// const props = defineProps({
//   modelValue: Object
// });

const emit = defineEmits(['update:modelValue']);

const divisions = ref([]);
const presentDistricts = ref([]);
const presentThanas = ref([]);
const districts = ref([]);
const thanas = ref([]);

// Separate refs for present and permanent address data
const presentFilters = ref({
  division: '',
  district: '',
  thana: ''
});

const permanentFilters = ref({
  division: '',
  district: '',
  thana: ''
});

// Initialize filters from props if they exist
const initializeFilters = () => {
  if (props.modelValue && props.modelValue.presernt_DID) {
    presentFilters.value.division = props.modelValue.presernt_DID;
  }
  if (props.modelValue && props.modelValue.present_des_id) {
    presentFilters.value.district = props.modelValue.present_des_id;
  }
  if (props.modelValue && props.modelValue.present_TID) {
    presentFilters.value.thana = props.modelValue.present_TID;
  }

  if (props.modelValue && props.modelValue.parmanent_DID) {
    permanentFilters.value.division = props.modelValue.parmanent_DID;
  }
  if (props.modelValue && props.modelValue.parmanent_desId) {
    permanentFilters.value.district = props.modelValue.parmanent_desId;
  }
  if (props.modelValue && props.modelValue.parmanent_TID) {
    permanentFilters.value.thana = props.modelValue.parmanent_TID;
  }
};

// Watch for changes in props.modelValue to initialize filters
watch(() => props.modelValue, (newValue) => {
  if (newValue) {
    initializeFilters();
  }
}, { immediate: true });

// Watch for changes in presentFilters and update the form
watch(presentFilters, async (newValues) => {
  if (!props.modelValue) return;

  const updatedValue = { ...props.modelValue };

  // Update division
  if (newValues.division) {
    const selectedDivision = divisions.value.find(d => d.id == newValues.division);
    if (selectedDivision) {
      updatedValue.present_division_name = selectedDivision.Division_U;
      updatedValue.presernt_DID = selectedDivision.id;
    }
  }

  // Update district
  if (newValues.district) {
    const selectedDistrict = presentDistricts.value.find(d => d.DesID == newValues.district);
    if (selectedDistrict) {
      updatedValue.present_district_name = selectedDistrict.District_U;
      updatedValue.present_des_id = selectedDistrict.DesID;
    }
  }

  // Update thana
  if (newValues.thana) {
    const selectedThana = presentThanas.value.find(t => t.TID == newValues.thana);
    if (selectedThana) {
      updatedValue.present_thana_name = selectedThana.Thana_U;
      updatedValue.present_TID = selectedThana.TID;
    }
  }

  emit('update:modelValue', updatedValue);
}, { deep: true });

// Watch for changes in permanentFilters and update the form
watch(permanentFilters, async (newValues) => {
  if (!props.modelValue) return;

  const updatedValue = { ...props.modelValue };

  // Update division
  if (newValues.division) {
    const selectedDivision = divisions.value.find(d => d.id == newValues.division);
    if (selectedDivision) {
      updatedValue.parmanent_division_name = selectedDivision.Division_U;
      updatedValue.parmanent_DID = selectedDivision.id;
    }
  }

  // Update district
  if (newValues.district) {
    const selectedDistrict = districts.value.find(d => d.DesID == newValues.district);
    if (selectedDistrict) {
      updatedValue.parmanent_district_name = selectedDistrict.District_U;
      updatedValue.parmanent_desId = selectedDistrict.DesID;
    }
  }

  // Update thana
  if (newValues.thana) {
    const selectedThana = thanas.value.find(t => t.TID == newValues.thana);
    if (selectedThana) {
      updatedValue.parmanent_thana_name = selectedThana.Thana_U;
      updatedValue.parmanent_TID = selectedThana.TID;
    }
  }

  emit('update:modelValue', updatedValue);
}, { deep: true });

onMounted(async () => {
  await loadDivisions();
  initializeFilters();

  // If we have saved values, load the related districts and thanas
  if (presentFilters.value.division) {
    await presentHandleDivisionChange();

    if (presentFilters.value.district) {
      await presentHandleDistrictChange();
    }
  }

  if (permanentFilters.value.division) {
    await handleDivisionChange();

    if (permanentFilters.value.district) {
      await handleDistrictChange();
    }
  }
});

const loadDivisions = async () => {
  try {
    const response = await axios.get('/api/divisions');
    divisions.value = response.data;
    return true;
  } catch (error) {
    console.error('Error loading divisions:', error);
    return false;
  }
};

// Present address handlers
const presentHandleDivisionChange = async () => {
  presentFilters.value.district = '';
  presentFilters.value.thana = '';
  presentDistricts.value = [];
  presentThanas.value = [];

  if (!presentFilters.value.division) {
    return;
  }

  try {
    const response = await axios.get(`/api/districts/${presentFilters.value.division}`);
    presentDistricts.value = response.data;
  } catch (error) {
    console.error('Error loading districts:', error);
  }
};

const presentHandleDistrictChange = async () => {
  presentFilters.value.thana = '';
  presentThanas.value = [];

  if (!presentFilters.value.district) {
    return;
  }

  try {
    const response = await axios.get(`/api/thanas/${presentFilters.value.district}`);
    presentThanas.value = response.data;
  } catch (error) {
    console.error('Error loading thanas:', error);
  }
};

// Permanent address handlers
const handleDivisionChange = async () => {
  permanentFilters.value.district = '';
  permanentFilters.value.thana = '';
  districts.value = [];
  thanas.value = [];

  if (!permanentFilters.value.division) {
    return;
  }

  try {
    const response = await axios.get(`/api/districts/${permanentFilters.value.division}`);
    districts.value = response.data;
  } catch (error) {
    console.error('Error loading districts:', error);
  }
};

const handleDistrictChange = async () => {
  permanentFilters.value.thana = '';
  thanas.value = [];

  if (!permanentFilters.value.district) {
    return;
  }

  try {
    const response = await axios.get(`/api/thanas/${permanentFilters.value.district}`);
    thanas.value = response.data;
  } catch (error) {
    console.error('Error loading thanas:', error);
  }
};







const updateFormData = () => {
  // বর্তমান ঠিকানার ডাটা আপডেট
  if (presentFilters.value.division) {
    const selectedDivision = divisions.value.find(d => d.id == presentFilters.value.division);
    if (selectedDivision) {
      studentInfoForm.present_division_name = selectedDivision.Division_U;
      studentInfoForm.presernt_DID = selectedDivision.id;
    }
  }

  if (presentFilters.value.district) {
    const selectedDistrict = presentDistricts.value.find(d => d.DesID == presentFilters.value.district);
    if (selectedDistrict) {
      studentInfoForm.present_district_name = selectedDistrict.District_U;
      studentInfoForm.present_desId = selectedDistrict.DesID;
    }
  }

  if (presentFilters.value.thana) {
    const selectedThana = presentThanas.value.find(t => t.TID == presentFilters.value.thana);
    if (selectedThana) {
      studentInfoForm.present_thana_name = selectedThana.Thana_U;
      studentInfoForm.present_TID = selectedThana.TID;
    }
  }

  // স্থায়ী ঠিকানার ডাটা আপডেট
  if (permanentFilters.value.division) {
    const selectedDivision = divisions.value.find(d => d.id == permanentFilters.value.division);
    if (selectedDivision) {
      studentInfoForm.parmanent_division_name = selectedDivision.Division_U;
      studentInfoForm.parmanent_DID = selectedDivision.id;
    }
  }

  if (permanentFilters.value.district) {
    const selectedDistrict = districts.value.find(d => d.DesID == permanentFilters.value.district);
    if (selectedDistrict) {
      studentInfoForm.parmanent_district_name = selectedDistrict.District_U;
      studentInfoForm.parmanent_desId = selectedDistrict.DesID;
    }
  }

  if (permanentFilters.value.thana) {
    const selectedThana = thanas.value.find(t => t.TID == permanentFilters.value.thana);
    if (selectedThana) {
      studentInfoForm.parmanent_thana_name = selectedThana.Thana_U;
      studentInfoForm.parmanent_TID = selectedThana.TID;
    }
  }
}




</script>


<style scoped></style>
