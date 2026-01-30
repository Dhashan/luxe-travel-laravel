import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Bearer Token Integration
const apiToken = localStorage.getItem('api_token');
if (apiToken) {
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${apiToken}`;
}
