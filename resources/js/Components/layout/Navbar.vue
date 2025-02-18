<script setup>
defineProps({
  isMobile: Boolean
});

const emit = defineEmits(['toggle-sidebar', 'toggle-notifications', 'toggle-messages']);
</script>

<template>
  <nav class="bg-white shadow-md fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex h-16 items-center justify-between">
        <button
          v-if="isMobile"
          @click="$emit('toggle-sidebar')"
          class="text-gray-500 hover:text-gray-700 focus:outline-none"
        >
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
  <div class="hidden sm:flex items-center space-x-4">
                            <!-- Notification Icon -->
                            <button
    @click="openNotifications"
    class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 p-2 rounded-md group transition-all duration-300"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13.73 21a2 2 0 01-3.46 0M21 12a9 9 0 01-9 9M3 12a9 9 0 019-9M18.63 13A17.888 17.888 0 0118 8M6.26 6.26A5.86 5.86 0 006 8c0 7-3 9-3 9h14"
        />
    </svg>

    <!-- Enhanced Notification Badge -->
    <span
        class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg"
    >
        3
    </span>
</button>


                            <!-- Message Icon -->
                            <button
    @click="openMessages"
    class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 p-2 rounded-md group transition-all duration-300"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 transform group-hover:scale-110 transition-transform duration-300"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
        />
    </svg>

    <!-- Enhanced Message Badge -->
    <span
        class="absolute -top-1 -right-1 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full transform scale-100 group-hover:scale-110 transition-transform duration-300 shadow-lg"
    >
        5
    </span>
</button>


                            <!-- User Dropdown -->
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            style=" font-family: 'Merriweather','SolaimanLipi',sans-serif;"
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 bg-white dark:bg-gray-800 border border-transparent text-md font leading-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                                        >
                                            {{ $page.props.auth.user.name }}
                                            <svg
                                                class="-me-0.5 ms-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
        <!-- Your existing navbar items -->
      </div>
    </div>
  </nav>
</template>
