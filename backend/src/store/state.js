const state = {
    user: {
        token: sessionStorage.getItem('TOKEN'),
        data: {}
    },
    globalSettings: {
        website_name: '',
        website_logo: '',
        website_icon: '',
        website_phone_number: '',
        website_domain: '',
        website_contact_address: '',
        website_email: '',
        website_facebook: '',
        website_instagram: '',
        website_twitter: '',
        website_linkedin: '',
        website_theme_color: ''
    },
    cars: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    reservations: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    users: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    newsletters: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    subscribers: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    },
    faqs: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    }
}
export default state;
