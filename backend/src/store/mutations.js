export const setGlobalSettings = (state, settings) => {
    state.globalSettings = settings;
};

export function setUser(state, user) {
    state.user.data = user;
}

export function setToken(state, token) {
    state.user.token = token;
    if(token) {
        sessionStorage.setItem('TOKEN', token);
    }
    else {
        sessionStorage.removeItem('TOKEN');
    }
}

export function setCars(state, [loading, response = null]) {
    if(response) {
        state.cars = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,

        }
    }
    state.cars.loading = loading;
}

export function setReservations(state, [ loading, response = null ]) {
    if (response) {
        state.reservations = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.reservations.loading = loading;
}

export function setNewsletters(state, [loading, response = null]) {
    if (response) {
        state.newsletters = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.newsletters.loading = loading;
}

export function setSubscribers(state, [loading, response = null]) {
    if (response) {
        state.subscribers = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.subscribers.loading = loading;
}

export function setFAQs(state, [loading, response = null]) {
    if (response) {
        state.faqs = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,
        };
    }
    state.faqs.loading = loading;
}

export function setUsers(state, [loading, response = null]) {
    if(response) {
        state.users = {
            data: response.data,
            links: response.meta.links,
            total: response.meta.total,
            limit: response.meta.per_page,
            from: response.meta.from,
            to: response.meta.to,
            page: response.meta.current_page,

        }
    }
    state.users.loading = loading;
}
