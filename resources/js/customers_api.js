import axios from "axios";

export default {
    all(id) {
        return axios.get('/api/customers', id);
    },
    create(data) {
        return axios.post('/api/customers', data);
    },
    find(id) {
        return axios.get(`/api/customers/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/customers/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/customers/${id}`);
    },
}
