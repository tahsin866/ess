<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref, watch, onMounted } from 'vue'

import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    student: Object,
    marhalas: Array,
    errors: Object
  });

  // Create form with student data
  const form = useForm({
    name_bn: props.student.name_bn,
    name_en: props.student.name_en,
    name_ar: props.student.name_ar,
    father_name_bn: props.student.father_name_bn,
    father_name_en: props.student.father_name_en,
    father_name_ar: props.student.father_name_ar,
    mother_name_bn: props.student.mother_name_bn,
    mother_name_en: props.student.mother_name_en,
    mother_name_ar: props.student.mother_name_ar,
    BRN_no: props.student.BRN_no,
    NID_no: props.student.NID_no,
    mobile_no: props.student.mobile_no,
    Date_of_birth: props.student.Date_of_birth,
    student_type: props.student.student_type || 'নিয়মিত',
    marhala_id: props.student.marhala_id,
    student_image: null,
    NID_attach: null,
    _method: 'PUT', // Add this to ensure PUT method is used
  });

  // Handle file uploads
  const handleStudentImageUpload = (event) => {
    form.student_image = event.target.files[0];
  };

  const handleNIDAttachUpload = (event) => {
    form.NID_attach = event.target.files[0];
  };

  // Submit form
  const updateStudent = () => {
    form.submit('put', route('students_registration.student_registration_update', props.student.id), {
      preserveScroll: true,
      onSuccess: () => {
        // Show success message or redirect
        router.visit(route('students_registration.index'));
      },
    });
  };

  // Go back to previous page
//   const goBack = () => {
//     router.visit(route('students_registration.index'));
//   };





const studentPhotoFile = ref(null);
const birthCertificateFile = ref(null);
const marksheetFile = ref(null);

// Preview URLs
const studentPhotoPreview = ref(null);
const birthCertificatePreview = ref(null);
const marksheetPreview = ref(null);

// Handle file upload
const handleFileUpload = (event, fileType) => {
    const file = event.target.files[0];
    if (!file) return;

    // Set the file reference based on type
    if (fileType === 'studentPhoto') {
        studentPhotoFile.value = file;
        createFilePreview(file, 'studentPhoto');
    } else if (fileType === 'birthCertificate') {
        birthCertificateFile.value = file;
        createFilePreview(file, 'birthCertificate');
    } else if (fileType === 'marksheet') {
        marksheetFile.value = file;
        createFilePreview(file, 'marksheet');
    }
};

// Create preview URL for the file
const createFilePreview = (file, fileType) => {
    // For images, create a preview URL
    if (file.type.startsWith('image/')) {
        const previewUrl = URL.createObjectURL(file);

        if (fileType === 'studentPhoto') {
            studentPhotoPreview.value = previewUrl;
        } else if (fileType === 'birthCertificate') {
            birthCertificatePreview.value = previewUrl;
        } else if (fileType === 'marksheet') {
            marksheetPreview.value = previewUrl;
        }
    }
    // For PDFs and other documents, we can still create a URL for download/preview
    else {
        const previewUrl = URL.createObjectURL(file);

        if (fileType === 'studentPhoto') {
            studentPhotoPreview.value = previewUrl;
        } else if (fileType === 'birthCertificate') {
            birthCertificatePreview.value = previewUrl;
        } else if (fileType === 'marksheet') {
            marksheetPreview.value = previewUrl;
        }
    }
};

// Remove file
const removeFile = (fileType) => {
    if (fileType === 'studentPhoto') {
        if (studentPhotoPreview.value) {
            URL.revokeObjectURL(studentPhotoPreview.value);
        }
        studentPhotoFile.value = null;
        studentPhotoPreview.value = null;
    } else if (fileType === 'birthCertificate') {
        if (birthCertificatePreview.value) {
            URL.revokeObjectURL(birthCertificatePreview.value);
        }
        birthCertificateFile.value = null;
        birthCertificatePreview.value = null;
    } else if (fileType === 'marksheet') {
        if (marksheetPreview.value) {
            URL.revokeObjectURL(marksheetPreview.value);
        }
        marksheetFile.value = null;
        marksheetPreview.value = null;
    }
};







</script>

<template>
    <AuthenticatedLayout>
        <div class="mb-5 mt-5 mx-5 space-y-6 text-xl">
            <!-- Personal Information Card -->
            <div class="bg-white rounded-sm shadow-md">
                <div class="flex bg-gradient-to-r rounded-t-md from-emerald-800 gap-3 items-center px-6 py-3 to-emerald-600">
    <i class="text-2xl text-white fa-user-circle fas"></i>
    <h5 class="text-white text-xl font-arabic">ব্যক্তিগত তথ্য - {{ marhalaName }}</h5>
</div>
                <div class="p-6">
                    <form @submit.prevent="updateStudent">
                        <!-- Name Fields -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">নাম
                                    (বাংলা)</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">

                                    </span>
                                    <input v-model="form.name_bn" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl  w-full  focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">নাম
                                    (ইংরেজি)</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">

                                    </span>
                                    <input v-model="form.name_en" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">নাম
                                    (আরবি)</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">

                                    </span>
                                    <input v-model="form.name_ar" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>
                        </div>

                        <!-- Mother's Name Fields -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">মাতার নাম
                                    (বাংলা)</label>
                                <div>

                                    <input v-model="form.father_name_bn" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">মাতার নাম
                                    (ইংরেজি)</label>
                                <div class="relative">

                                    <input v-model="form.father_name_en" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">মাতার নাম
                                    (আরবি)</label>
                                <div class="relative">

                                    <input v-model="form.father_name_ar" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">পিতার নাম
                                    (বাংলা)</label>
                                <div>

                                    <input v-model="form.mother_name_bn" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">পিতার নাম
                                    (ইংরেজি)</label>
                                <div class="relative">

                                    <input v-model="form.mother_name_en" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">পিতার নাম
                                    (আরবি)</label>
                                <div class="relative">

                                    <input v-model="form.mother_name_ar" type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>
                        </div>


                        <!-- Date and Registration Fields -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="relative">
                                <label
                                    class="text-gray-700 text-lg block font-arabic font-medium mb-1">জন্ম-তারিখ</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">
                                        <i class="text-emerald-600 fa-calendar-alt fas"></i>
                                    </span>
                                    <input v-model="form.Date_of_birth"   type="date"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">জন্ম-নিবন্ধন
                                    নম্বর</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">
                                        <i class="text-emerald-600 fa-id-card fas"></i>
                                    </span>
                                    <input v-model="form.BRN_no"  type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>

                            <div class="relative">
                                <label class="text-gray-700 text-lg block font-arabic font-medium mb-1">জাতীয়
                                    পরিচয়পত্র নম্বর</label>
                                <div class="relative">
                                    <span class="flex absolute inset-y-0 items-center left-0 pl-3 pointer-events-none">
                                        <i class="text-emerald-600 fa-address-card fas"></i>
                                    </span>
                                    <input v-model="form.NID_no"  type="text"
                                        class="border border-emerald-200 rounded-sm text-xl w-full focus:outline-none focus:ring-2 focus:ring-emerald-500 pl-10 pr-3 py-2">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Required Information Card -->


            <!-- Address Card -->




            <!-- Attachment Card -->
            <div class="bg-white rounded-lg shadow">
                <div class="bg-white border border-emerald-200 p-6 rounded-md shadow-md">
                    <h3 class="text-emerald-800 text-xl arabic-font font-bold mb-6">সংযুক্তি</h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <!-- Student Photo -->
                        <div class="space-y-3">
            <label class="text-emerald-700 text-lg arabic-font block font-medium">
              শিক্ষার্থীর ছবি (পাসপোর্ট সাইজ এবং নীল ব্যাকগ্রাইন্ড হতে হবে)
            </label>
            <div class="relative">
              <div class="flex bg-emerald-50 border-2 border-dashed border-emerald-300 justify-between p-4 rounded-md duration-200 hover:border-emerald-500 items-center transition-colors">
                <span class="text-emerald-600 arabic-font">
                  {{ studentPhotoFile ? studentPhotoFile.name : (student.student_image ? 'বর্তমান ছবি আছে' : 'ফাইল আপলোড করুন') }}
                </span>
                <div v-if="studentPhotoPreview || student.student_image" class="flex items-center pointer-events-auto relative space-x-2 z-10">
                  <a :href="studentPhotoPreview || ('/storage/' + student.student_image)" target="_blank" class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                  <button type="button" @click.stop="removeFile('studentPhoto')" class="text-red-600 hover:text-red-800">মুছুন</button>
                </div>
              </div>
              <input
                type="file"
                @change="handleFileUpload($event, 'studentPhoto')"
                class="h-full w-full absolute cursor-pointer inset-0 opacity-0 z-0"
                accept="image/*,.pdf"
              />
            </div>
          </div>
        </div>

                        <!-- Birth Certificate/NID -->
                        <div class="space-y-3">
                            <label class="text-emerald-700 text-lg arabic-font block font-medium">জন্ম নিবন্ধন/এন আইডি
                                সংযুক্তি করুন</label>
                            <div class="relative">
                                <div
                                    class="flex bg-emerald-50 border-2 border-dashed border-emerald-300 justify-between p-4 rounded-md duration-200 hover:border-emerald-500 items-center transition-colors">
                                    <span class="text-emerald-600 arabic-font">
                                        {{ birthCertificateFile ? birthCertificateFile.name : 'ফাইল আপলোড করুন' }}
                                    </span>
                                    <div v-if="birthCertificatePreview"
                                        class="flex items-center pointer-events-auto relative space-x-2 z-10">
                                        <a :href="birthCertificatePreview" target="_blank"
                                            class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                                        <button @click.stop="removeFile('birthCertificate')"
                                            class="text-red-600 hover:text-red-800">মুছুন</button>
                                    </div>
                                </div>
                                <input type="file" @change="handleFileUpload($event, 'birthCertificate')"
                                    class="h-full w-full absolute cursor-pointer inset-0 opacity-0 z-0"
                                    accept="image/*,.pdf,.doc,.docx" />
                            </div>
                        </div>

                        <!-- Marksheet -->
                        <div class="space-y-3">
                            <label class="text-emerald-700 text-lg arabic-font block font-medium">মার্কশীট সংযুক্ত
                                করুন</label>
                            <div class="relative">
                                <div
                                    class="flex bg-emerald-50 border-2 border-dashed border-emerald-300 justify-between p-4 rounded-md duration-200 hover:border-emerald-500 items-center transition-colors">
                                    <span class="text-emerald-600 arabic-font">
                                        {{ marksheetFile ? marksheetFile.name : 'ফাইল আপলোড করুন' }}
                                    </span>
                                    <div v-if="marksheetPreview"
                                        class="flex items-center pointer-events-auto relative space-x-2 z-10">
                                        <a :href="marksheetPreview" target="_blank"
                                            class="text-emerald-600 hover:text-emerald-800">প্রিভিউ</a>
                                        <button @click.stop="removeFile('marksheet')"
                                            class="text-red-600 hover:text-red-800">মুছুন</button>
                                    </div>
                                </div>
                                <input type="file" @change="handleFileUpload($event, 'marksheet')"
                                    class="h-full w-full absolute cursor-pointer inset-0 opacity-0 z-0"
                                    accept="image/*,.pdf,.doc,.docx" />
                            </div>
                        </div>

                        <div class="mt-6">
                            <button @click.prevent="submitStudentInfo"
                                class="bg-emerald-600 rounded-md shadow-md text-white font-bold hover:bg-emerald-700 px-6 py-2">
                                <i class="fa-save fas mr-2"></i> সংরক্ষণ করুন
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    </AuthenticatedLayout>
</template>
