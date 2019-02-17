<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">

            <gmap-autocomplete
                    v-model="address"
                    :placeholder="field.placeholder || 'Find a location'"
                    class="w-full form-control form-input form-input-bordered"
                    :class="errorClasses"
                    :select-first-on-enter="true"
                    @place_changed="setPlace"
                    :options="{}">
            </gmap-autocomplete>

            <gmap-map
                    :center="position"
                    :zoom="field.zoom"
                    @click="setPosition"
                    style="height: 400px"
                    class="mt-3"
            >
                <gmap-marker
                        :position="position"
                        :draggable="true"
                        @dragend="setPosition"
                ></gmap-marker>

            </gmap-map>

        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data() {
        return {
            address: null,
            latitude: null,
            longitude: null
        }
    },

    computed: {
        latitudeAttr() {
            return this.field.latitude_attr;
        },
        longitudeAttr() {
            return this.field.longitude_attr;
        },
        position() {
            return {
                lat: this.latitude,
                lng: this.longitude
            }
        }
    },

    methods: {

        /**
        * Set the initial value for the field
        */
        setInitialValue() {
            this.latitude  = this.field.latitude;
            this.longitude = this.field.longitude;
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.latitudeAttr, this.latitude);
            formData.append(this.longitudeAttr, this.longitude);
        },

        setPlace(place) {
            this.address   = place.formatted_address;
            this.latitude  = place.geometry.location.lat();
            this.longitude = place.geometry.location.lng();
        },

        setPosition(position) {
            this.latitude  = position.latLng.lat();
            this.longitude = position.latLng.lng();
        },
    },
}
</script>
