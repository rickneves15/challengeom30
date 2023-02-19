export interface IPatient {
  id: number;
  avatar: string;
  full_name: string;
  mother_full_name: string;
  birthday: string;
  cpf: string;
  cns: string;
  address: IAddress;
  created_at: string;
  updated_at: string;
}

export interface IAddress {
  id: number;
  patient_id: number;
  cep: string;
  address: string;
  number: number;
  complement?: string;
  neighborhood: string;
  city: string;
  state: string;
  created_at: string;
  updated_at: string;
}

export interface IGenericResponse {
  status: boolean;
  message: string;
  error: any;
}

export interface IPatientsResponse extends IGenericResponse {
  data: IPatient[];
}

export interface IPatientResponse extends IGenericResponse {
  data: IPatient;
}

export interface ICreatePatientResponse extends IGenericResponse {
  data: IPatient;
}

export interface IUpdatePatientResponse extends IGenericResponse {
  data: IPatient;
}

export interface DeletePatientResponse extends IGenericResponse {
  data: boolean;
}

export interface IGetAddressResponse {
  cep: string;
  address: string;
  complement?: string;
  neighborhood: string;
  city: string;
  state: string;
}
