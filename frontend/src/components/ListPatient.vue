<template>
  <section class="bg-white py-20 lg:py-[120px]">
    <div class="container mx-auto">
      <h1 class="mb-2 text-3xl font-semibold text-black">
        Listagem de Pacientes

        <button
          type="button"
          class="border-primary text-primary hover:bg-primary inline-block rounded border py-2 px-2 hover:text-white hover:bg-black"
          @click="toggleModal"
        >
          <PlusIcon class="h-3 w-3" />
        </button>
      </h1>
      <table
        class="border-collapse border w-full hover:border-collapse table-auto"
      >
        <thead class="">
          <tr class="bg-black text-center">
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7 lg:px-4"
            >
              Foto
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              Nome
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              Nome da Mãe
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              Data de Nascimento
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              CPF
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              CNS
            </th>
            <th
              class="border-l border-transparent py-4 px-3 text-lg font-semibold text-white lg:py-7"
            >
              Ações
            </th>
          </tr>
        </thead>
        <tbody>
          <ListItemPatient
            v-for="patient in patients"
            :key="3"
            :patient="patient"
          />
        </tbody>
      </table>
    </div>
  </section>

  <teleport to="body">
    <ViewPatient
      :openModal="openModal"
      :toggleModal="toggleModal"
      :create="true"
      :title="`Criar`"
    />
  </teleport>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useQuery } from "vue-query";

import { PlusIcon } from "@heroicons/vue/24/solid";
import { getAllPatient } from "./../services/patientService";
import ListItemPatient from "./ListItemPatient.vue";
import ViewPatient from "./ViewPatient.vue";
import CreatePatient from "./CreatePatient.vue";

const { data: patients } = useQuery(["patients"], () => getAllPatient(), {
  select: (data) => data.data,
});

const openModal = ref(false);
function toggleModal() {
  openModal.value = !openModal.value;
}
</script>
