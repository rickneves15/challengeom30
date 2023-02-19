<template>
  <div
    v-if="openModal"
    class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
  >
    <div class="relative w-3/5 h-4/5 my-6">
      <!--content-->
      <div
        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full max-h-2xl bg-white outline-none focus:outline-none"
      >
        <!--header-->
        <div
          class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t"
        >
          <h3 class="text-3xl font-semibold">{{ title }}</h3>
          <button
            type="button"
            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 p-1 ml-auto float-right text-3xl inline-block rounded"
            @click="toggleModal()"
          >
            <XMarkIcon class="h-4 w-4" />
          </button>
        </div>
        <!--body-->
        <div class="relative p-6 flex-auto max-h-[600px] overflow-auto">
          <slot />
        </div>
        <!--footer-->
        <div
          v-if="buttonsFotter"
          class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
        >
          <button
            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button"
            v-on:click="toggleModal()"
          >
            Close
          </button>
          <button
            class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button"
            v-on:click="toggleModal()"
          >
            Save Changes
          </button>
        </div>
      </div>
    </div>
  </div>
  <div v-if="openModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
</template>

<script setup lang="ts">
import { toRefs } from "vue";
import { XMarkIcon } from "@heroicons/vue/24/solid";

const props = defineProps<{
  title?: string;
  buttonsFotter?: boolean;
  toggleModal: () => void;
  openModal: boolean;
}>();

const {
  title = "Modal Title",
  buttonsFotter = false,
  openModal,
  toggleModal,
} = toRefs(props);
</script>
