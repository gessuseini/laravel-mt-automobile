import axiosClient from "../axios";

export const fetchGlobalSettings = ({ commit }) => {
    return axiosClient.get('/settings')
        .then(response => {
            commit('setGlobalSettings', response.data);
        });
};

export const updateGlobalSettings = ({ commit }, settings) => {
    return axiosClient.post('/settings', settings)
        .then(response => {
            commit('setGlobalSettings', response.data);
        });
};

export function getUser({commit}, data) {
    return axiosClient.get('/user', data)
        .then(({data}) => {
            commit('setUser', data);
            return data;
        })
}

export function login({commit}, data) {
    return axiosClient.post('/login', data)
        .then(({data}) => {
            commit('setUser', data.user);
            commit('setToken', data.token)
            return data;
        })
}

export function logout({commit}) {
    return axiosClient.post('/logout')
        .then((response) => {
            commit('setToken', null)
            return response;
        })
}

export function getCars({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setCars', [true]);
    url = url || '/cars';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setCars', [false, res.data])
        })
        .catch(()=> {
            commit('setCars', [false])
        })
}

export function getCar({}, id) {
    return axiosClient.get(`/cars/${id}`);
}

export function createCar({commit}, car) {
    if (car.vehicle_image instanceof File) {
        const form = new FormData();
        form.append('vehicle_brand', car.vehicle_brand);
        form.append('vehicle_model', car.vehicle_model);
        form.append('vehicle_image', car.vehicle_image);
        form.append('vehicle_mileage', car.vehicle_mileage);
        form.append('vehicle_transmission', car.vehicle_transmission);
        form.append('vehicle_year', car.vehicle_year);
        form.append('vehicle_description', car.vehicle_description);
        form.append('vehicle_price', car.vehicle_price);
        car = form;
    }
    return axiosClient.post('/cars', car);
}

export function updateCar({commit}, car) {
    const id = car.id;
    if (car.vehicle_image instanceof File) {
        const form = new FormData();
        form.append('vehicle_brand', car.vehicle_brand);
        form.append('vehicle_model', car.vehicle_model);
        form.append('vehicle_image', car.vehicle_image);
        form.append('vehicle_mileage', car.vehicle_mileage);
        form.append('vehicle_transmission', car.vehicle_transmission);
        form.append('vehicle_year', car.vehicle_year);
        form.append('vehicle_description', car.vehicle_description);
        form.append('vehicle_price', car.vehicle_price);
        form.append('_method', 'PUT');
        car = form;
    }
    return axiosClient.post(`/cars/${id}`, car);
}

export function deleteCar({commit}, id) {
    return axiosClient.delete(`/cars/${id}`);
    debugger;
}

export function getReservations({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setReservations', [true]);
    url = url || '/bookings';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setReservations', [false, res.data])
        })
        .catch(()=> {
            commit('setReservations', [false])
        })
}

export function getReservation({}, id) {
    return axiosClient.get(`/bookings/${id}`);
}

export function createReservation({commit}, reservation) {
    const form = new FormData();
    form.append('reservation_date', reservation.reservation_date);
    form.append('reservation_type', reservation.reservation_type);
    form.append('reservation_brand', reservation.reservation_brand);
    form.append('reservation_model', reservation.reservation_model);
    form.append('reservation_vin_num', reservation.reservation_vin_num);
    form.append('reservation_mileage', reservation.reservation_mileage);
    form.append('reservation_plate_number', reservation.reservation_plate_number);
    form.append('reservation_year', reservation.reservation_year);
    form.append('reservation_typeApproval', reservation.reservation_typeApproval);
    form.append('reservation_description', reservation.reservation_description);
    form.append('created_by', reservation.created_by);
    form.append('user_id', reservation.user_id);

    reservation = form;
    return axiosClient.post('/bookings', reservation);
}

export function updateReservation({commit}, reservation) {
    const id = reservation.id;
    const form = new FormData();
    form.append('reservation_date', reservation.reservation_date);
    form.append('reservation_type', reservation.reservation_type);
    form.append('reservation_brand', reservation.reservation_brand);
    form.append('reservation_model', reservation.reservation_model);
    form.append('reservation_vin_num', reservation.reservation_vin_num);
    form.append('reservation_mileage', reservation.reservation_mileage);
    form.append('reservation_plate_number', reservation.reservation_plate_number);
    form.append('reservation_year', reservation.reservation_year);
    form.append('reservation_typeApproval', reservation.reservation_typeApproval);
    form.append('reservation_description', reservation.reservation_description);
    form.append('created_by', reservation.created_by);
    form.append('updated_by', reservation.updated_by);
    form.append('_method', 'PUT');

    reservation = form;
    return axiosClient.post(`/bookings/${id}`, reservation);
}

export function deleteReservation({commit}, id) {
    return axiosClient.delete(`/bookings/${id}`);
}
export function getTodaysReservations({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setReservations', [true]);
    url = url || '/bookings/today';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setReservations', [false, res.data])
        })
        .catch(()=> {
            commit('setReservations', [false])
        })
}

// Newsletter

export function getNewsletters({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setNewsletters', [true]);
    url = url || '/newsletters';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setNewsletters', [false, res.data])
        })
        .catch(()=> {
            commit('setNewsletters', [false])
        })
}

export function getNewsletter({}, id) {
    return axiosClient.get(`/newsletters/${id}`);
}

export function createNewsletter({commit}, newsletter) {
    const form = new FormData();
    form.append('title', newsletter.title);
    form.append('content', newsletter.content);
    newsletter = form;
    return axiosClient.post('/newsletters', newsletter);
}

export function updateNewsletter({commit}, newsletter) {
    const id = newsletter.id;
    const form = new FormData();
    form.append('title', newsletter.title);
    form.append('content', newsletter.content);
    form.append('_method', 'PUT');
    newsletter = form;

    return axiosClient.post(`/newsletters/${id}`, newsletter);
}

export function deleteNewsletter({commit}, id) {
    return axiosClient.delete(`/newsletters/${id}`);
    debugger;
}

export function sendNewsletter({ commit }, newsletterId) {
    return axiosClient.post(`/newsletters/${newsletterId}/send`)
        .then(response => {
            return response.data; // Optionally, return data if needed
        })
        .catch(error => {
            throw error; // Propagate the error to the caller
        });
}

// Subscribers

export function getSubscribers({ commit }, { url = null, search = '', perPage = 10 } = {}) {
    commit('setSubscribers', [true]);
    url = url || '/subscribers';
    return axiosClient.get(url, {
        params: { search, per_page: perPage }
    })
        .then(res => {
            commit('setSubscribers', [false, res.data])
        })
        .catch(() => {
            commit('setSubscribers', [false])
        })
}

export function getSubscriber({}, id) {
    return axiosClient.get(`/subscribers/${id}`);
}

export function createSubscriber({ commit }, subscriber) {
    const form = new FormData();
    form.append('email', subscriber.email);
    subscriber = form;
    return axiosClient.post('/subscribers', subscriber);
}

export function updateSubscriber({ commit }, subscriber) {
    const id = subscriber.id;
    const form = new FormData();
    form.append('email', subscriber.email);
    form.append('_method', 'PUT');
    subscriber = form;

    return axiosClient.post(`/subscribers/${id}`, subscriber);
}

export function deleteSubscriber({ commit }, id) {
    return axiosClient.delete(`/subscribers/${id}`);
}

export function getFAQs({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setFAQs', [true]);
    url = url || '/faq';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setFAQs', [false, res.data])
        })
        .catch(()=> {
            commit('setFAQs', [false])
        })
}

export function getFAQ({}, id) {
    return axiosClient.get(`/faq/${id}`);
}

export function createFAQ({commit}, faq) {
    const form = new FormData();
    form.append('question', faq.question);
    form.append('answer', faq.answer);
    faq = form;
    return axiosClient.post('/faq', faq);
}

export function updateFAQ({commit}, faq) {
    const id = faq.id;
    const form = new FormData();
    form.append('question', faq.question);
    form.append('answer', faq.answer);
    form.append('_method', 'PUT');
    faq = form;
    return axiosClient.post(`/faq/${id}`, faq);
}

export function deleteFAQ({commit}, id) {
    return axiosClient.delete(`/faq/${id}`);
    debugger;
}

export function getUsers({commit}, {url = null, search = '', perPage = 10} = {}) {
    commit('setUsers', [true]);
    url = url || '/users';
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then(res => {
            commit('setUsers', [false, res.data])
        })
        .catch(()=> {
            commit('setUsers', [false])
        })
}

export function createUser({ commit }, user) {
    const form = new FormData();
    form.append('name', user.name);
    form.append('email', user.email);
    form.append('password', user.password);
    user = form;
    return axiosClient.post('/users', user);
}

export function updateUser({ commit }, user) {
    const id = user.id;
    const form = new FormData();
    form.append('name', user.name);  // Ensure 'name' field is appended
    form.append('email', user.email);
    form.append('password', user.password);
    form.append('_method', 'PUT');
    user = form;
    console.log(user);
    return axiosClient.put(`/users/${id}`, user);
}

export function deleteUser({ commit }, id) {
    return axiosClient.delete(`/users/${id}`);
}

export function getSpecificUser({}, id) {
    return axiosClient.get(`/users/${id}`);
}
