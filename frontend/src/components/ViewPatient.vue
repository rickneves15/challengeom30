<template>
  <BaseModal
    :title="`${title} Paciente`"
    :openModal="openModal"
    :toggleModal="toggleModal"
  >
    <form class="w-full" method="post" @submit.prevent="onSubmit">
      <fieldset>
        <legend
          class="w-full mb-6 border-b border-gray-700 pb-2 text-base font-semibold"
        >
          Paciente
        </legend>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="avatar">
            URL da Foto
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.avatar ? 'border-red-500' : ''
            }`"
            id="avatar"
            type="text"
            placeholder=""
            v-model="avatar"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.avatar ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.avatar }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="ful_name">
            Nome Completo
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.full_name ? 'border-red-500' : ''
            }`"
            id="ful_name"
            type="text"
            placeholder=""
            v-model="full_name"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.full_name ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.full_name }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="mother_full_name">
            Nome Completo da Mãe
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.mother_full_name ? 'border-red-500' : ''
            }`"
            id="mother_full_name"
            type="text"
            placeholder=""
            v-model="mother_full_name"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.mother_full_name ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.mother_full_name }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="birthday">
            Data de Nascimento
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.birthday ? 'border-red-500' : ''
            }`"
            id="birthday"
            type="text"
            placeholder=""
            v-model="birthday"
            v-maska
            data-maska="##/##/####"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.birthday ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.birthday }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="cpf"> CPF </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.cpf ? 'border-red-500' : ''
            }`"
            id="cpf"
            type="text"
            placeholder=""
            v-model="cpf"
            v-maska
            data-maska="###.###.###-##"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.cpf ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.cpf }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="cns"> CNS </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.cns ? 'border-red-500' : ''
            }`"
            id="cns"
            type="text"
            placeholder=""
            v-model="cns"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.cns ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.cns }}
          </p>
        </div>
      </fieldset>
      <fieldset>
        <legend
          class="w-full mb-6 border-b border-gray-700 pb-2 text-base font-semibold"
        >
          Endereço
        </legend>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="cep"> CEP </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.cep ? 'border-red-500' : ''
            }`"
            id="cep"
            type="text"
            placeholder=""
            v-model="cep"
            v-maska
            data-maska="#####-###"
            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
            @change="getCep"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.cep ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.cep }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="address">
            Endereço
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.address ? 'border-red-500' : ''
            }`"
            id="address"
            type="text"
            placeholder=""
            v-model="address"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.address ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.address }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="number"> Número </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.number ? 'border-red-500' : ''
            }`"
            id="number"
            type="text"
            placeholder=""
            v-model="number"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.number ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.number }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="complement">
            Complemento
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.complement ? 'border-red-500' : ''
            }`"
            id="complement"
            type="text"
            placeholder=""
            v-model="complement"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.complement ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.complement }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="neighborhood">
            Bairro
          </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.neighborhood ? 'border-red-500' : ''
            }`"
            id="neighborhood"
            type="text"
            placeholder=""
            v-model="neighborhood"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.neighborhood ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.neighborhood }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="city"> Cidade </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.city ? 'border-red-500' : ''
            }`"
            id="city"
            type="text"
            placeholder=""
            v-model="city"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.city ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.city }}
          </p>
        </div>
        <div class="mb-2">
          <label class="block text-gray-700 mb-2" for="state"> Estado </label>
          <input
            :class="`appearance-none border border-ct-dark-200 rounded w-full py-3 px-3 text-gray-700 mb-2 leading-tight focus:outline-none  ${
              errors.c ? 'border-red-500' : ''
            }`"
            id="values"
            type="text"
            placeholder=""
            v-model="state"
          />
          <p
            :class="`text-red-500 text-xs italic mb-2 ${
              errors.state ? 'visible' : 'invisible'
            }`"
          >
            {{ errors.state }}
          </p>
        </div>
      </fieldset>
      <button
        type="submit"
        :class="`w-full py-3 font-semibold hover:bg-black hover:text-white rounded-lg border flex justify-center`"
      >
        {{ title }} Paciente
      </button>
    </form>
  </BaseModal>
</template>

<script setup lang="ts">
import { toRefs, onMounted } from "vue";
import * as zod from "zod";
import { toFormValidator } from "@vee-validate/zod";
import { useField, useForm } from "vee-validate";
import { useMutation, useQueryClient } from "vue-query";
import { pickBy } from "lodash";
import { createToast } from "mosha-vue-toastify";
import moment from "moment";
import { vMaska } from "maska";

import type { IGetAddressResponse, IPatient } from "@/services/types";
import { getAddress, patientCallback } from "@/services/patientService";
import BaseModal from "./BaseModal.vue";

const props = defineProps<{
  toggleModal: () => void;
  openModal: boolean;
  create: boolean;
  patient?: IPatient;
  title: string;
}>();

const { patient, title, create = true, openModal, toggleModal } = toRefs(props);

const editPatientSchema = toFormValidator(
  zod
    .object({
      avatar: zod.string(),
      full_name: zod.string(),
      mother_full_name: zod.string(),
      birthday: zod.string(),
      cpf: zod.string(),
      cns: zod.string(),
      address: zod.object({
        cep: zod.string(),
        address: zod.string(),
        number: zod.number(),
        complement: zod.string().nullable(),
        neighborhood: zod.string(),
        city: zod.string(),
        state: zod.string(),
      }),
    })
    .partial()
);

const createPatientSchema = toFormValidator(
  zod
    .object({
      avatar: zod.string().min(1),
      full_name: zod.string().min(1),
      mother_full_name: zod.string().min(1),
      birthday: zod.string().min(1),
      cpf: zod.string().min(1),
      cns: zod.string().min(1),
    })
    .partial()
);

const { handleSubmit, errors, setFieldValue } = useForm({
  validationSchema: create ? createPatientSchema : editPatientSchema,
});

const { value: avatar } = useField<string>("avatar");
const { value: full_name } = useField<string>("full_name");
const { value: mother_full_name } = useField<string>("mother_full_name");
const { value: birthday } = useField<string>("birthday");
const { value: cpf } = useField<string>("cpf");
const { value: cns } = useField<string>("cns");
const { value: cep } = useField<string>("address.cep");
const { value: address } = useField<string>("address.address");
const { value: number } = useField<string>("address.number");
const { value: complement } = useField<string>("address.complement");
const { value: neighborhood } = useField<string>("address.neighborhood");
const { value: city } = useField<string>("address.city");
const { value: state } = useField<string>("address.state");

const queryClient = useQueryClient();
const { mutate: patientMutate } = useMutation(
  ({
    create = true,
    id,
    data,
  }: {
    create?: boolean;
    id?: number;
    data: IPatient;
  }) => patientCallback({ create, id, data }),
  {
    onSuccess: (data) => {
      queryClient.invalidateQueries("patientMutate");
      createToast(
        create.value
          ? "Paciente criado com sucesso"
          : "Paciente atualizado com sucesso",
        {
          position: "top-right",
        }
      );
      toggleModal.value();
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

const onSubmit = handleSubmit((values) => {
  const data: any = pickBy(
    values,
    (value: any) => value !== "" && value !== undefined
  );

  data.birthday = moment(data.birthday, "DD/MM/YYYY").format("YYYY-MM-DD");

  if (create.value) {
    patientMutate({ create: create.value, data });
  } else {
    patientMutate({ create: create.value, id: patient.value.id, data });
  }
});

const getCep = async (e: any) => {
  const cep = e.target.value;
  const data: IGetAddressResponse = await getAddress(cep);

  setFieldValue("address.address", data.address);
  setFieldValue("address.complement", data.complement);
  setFieldValue("address.neighborhood", data.neighborhood);
  setFieldValue("address.city", data.city);
  setFieldValue("address.state", data.state);
};

onMounted(() => {
  if (!create.value) {
    setFieldValue("avatar", patient.value.avatar);
    setFieldValue("full_name", patient.value.full_name);
    setFieldValue("mother_full_name", patient.value.mother_full_name);
    setFieldValue("birthday", patient.value.birthday);
    setFieldValue("cpf", patient.value.cpf);
    setFieldValue("cns", patient.value.cns);
    setFieldValue("address.cep", patient.value.address.cep);
    setFieldValue("address.address", patient.value.address.address);
    setFieldValue("address.number", patient.value.address.number);
    setFieldValue("address.complement", patient.value.address.complement);
    setFieldValue("address.neighborhood", patient.value.address.neighborhood);
    setFieldValue("address.city", patient.value.address.city);
    setFieldValue("address.state", patient.value.address.state);
  }
});
</script>
