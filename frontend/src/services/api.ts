import axios from "axios";

const BASE_URL = "http://localhost:8000/api/";

export const api = axios.create({
  baseURL: BASE_URL,
  // withCredentials: true,
});

api.defaults.headers.common["Accept"] = "application/json";
api.defaults.headers.common["Content-Type"] = "application/json";
