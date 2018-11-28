import * as VueGoogleMaps from 'vue2-google-maps';

Nova.booting((Vue, router) => {

    Vue.use(VueGoogleMaps, {
        load: {
            key: Nova.config.gmap.api_key,
            libraries: 'places',
        }
    });

    Vue.component('index-nova-google-maps', require('./components/IndexField'));
    Vue.component('detail-nova-google-maps', require('./components/DetailField'));
    Vue.component('form-nova-google-maps', require('./components/FormField'));
});