<template>
  <tr class="odd:bg-white even:bg-slate-50 text-center">
    <td
      class="text-dark border-b border-l py-5 px-2 text-center text-base font-medium"
    >
      <img
        :src="`${patient.avatar}`"
        :alt="`${patient.full_name}`"
        class="h-16 w-16 object-cover"
      />
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      {{ patient.full_name }}
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      {{ patient.mother_full_name }}
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      {{ patient.birthday }}
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      {{ patient.cpf }}
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      {{ patient.cns }}
    </td>
    <td
      class="text-dark border-b border-l border-[#E8E8E8] py-5 px-2 text-center text-base font-medium"
    >
      <button
        type="button"
        href="javascript:void(0)"
        class="border-primary text-primary hover:bg-primary inline-block rounded border mr-0.5 py-2 px-4 hover:text-white hover:bg-black"
        @click="toggleModal"
      >
        <PencilIcon class="h-4 w-4" />
      </button>

      <button
        type="button"
        class="border-primary text-primary hover:bg-primary inline-block rounded border py-2 px-4 hover:text-white hover:bg-black"
        @click="onDelete"
      >
        <TrashIcon class="h-4 w-4" />
      </button>
    </td>
  </tr>

  <teleport to="body">
    <ViewPatient
      :openModal="openModal"
      :toggleModal="toggleModal"
      :patient="patient"
      :create="false"
      :title="`Editar`"
    />
  </teleport>
</template>

<script setup lang="ts">
import { ref, toRefs } from "vue";
import { useMutation, useQueryClient } from "vue-query";
import { PencilIcon, TrashIcon } from "@heroicons/vue/24/solid";
import { createToast } from "mosha-vue-toastify";

import type { IPatient } from "@/services/types";
import { deletePatient } from "@/services/patientService";
import ViewPatient from "@/components/ViewPatient.vue";

const props = defineProps<{
  patient: IPatient;
}>();

const { patient } = toRefs(props);

const queryClient = useQueryClient();
const { mutate: deletePatientMutate } = useMutation(
  (id: number) => deletePatient(id),
  {
    onSuccess: (data) => {
      createToast("Patient deleted successfully", {
        position: "top-right",
      });
      queryClient.invalidateQueries("deletePatientMutate");
    },
    onError: (error: any) => {
      if (Array.isArray((error as any).response.data.error)) {
        (error as any).response.data.error.forEach((el: any) =>
          createToast(el.message, {
            position: "top-right",
            type: "warning",
          })
        );
      } else {
        createToast((error as any).response.data.message, {
          position: "top-right",
          type: "danger",
        });
      }
    },
  }
);
function onDelete() {
  if (window.confirm("Are you sure you want to delete this patient?")) {
    deletePatientMutate(patient.value.id);
  }
}

const openModal = ref(false);
function toggleModal() {
  openModal.value = !openModal.value;
}
</script>
