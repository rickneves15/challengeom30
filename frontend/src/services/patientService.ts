import { api } from "./api";
import type {
  DeletePatientResponse,
  ICreatePatientResponse,
  IGetAddressResponse,
  IPatient,
  IPatientResponse,
  IPatientsResponse,
  IUpdatePatientResponse,
} from "./types";

export const getAllPatient = async (page: Number | String = "") => {
  page = page && `?page=${page}`;
  const response = await api.get<IPatientsResponse>(`patient${page}`);
  return response.data;
};

export const getOnePatient = async (id: Number) => {
  const response = await api.get<IPatientResponse>(`patient/${id}`);
  return response.data;
};

export const createPatient = async ({ data }: { data: IPatient }) => {
  const response = await api.post<ICreatePatientResponse>(`patient`, data);
  return response.data;
};

export const updatePatient = async ({
  id,
  data,
}: {
  id: number;
  data: IPatient;
}) => {
  const response = await api.put<IUpdatePatientResponse>(`patient/${id}`, data);
  return response.data;
};

export const deletePatient = async (id: number) => {
  const response = await api.delete<DeletePatientResponse>(`patient/${id}`);
  return response.data;
};

export const getAddress = async (cep: Number) => {
  const response = await api.get<IGetAddressResponse>(`get-address/${cep}`);
  return response.data;
};

export const patientCallback = async ({
  create = true,
  id,
  data,
}: {
  create?: boolean;
  id?: number;
  data: IPatient;
}) => {
  return create ? createPatient({ data }) : updatePatient({ id, data });
};
