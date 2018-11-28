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
                    :options="{
		        componentRestrictions: 	{ country: 'uk' }
			}">
            </gmap-autocomplete>

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
            address: null
        }
    },

    computed: {
        latitudeName() {
            return this.field.attribute+'[latitude]';
        },
        longitudeName() {
            return this.field.attribute+'[longitude]';
        }
    },

    methods: {

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.latitudeName, this.value.latitude);
            formData.append(this.longitudeName, this.value.longitude);
        },

        setPlace(place) {
            this.address         = place.formatted_address;
            this.value.latitude  = place.geometry.location.lat();
            this.value.longitude = place.geometry.location.lng();
        },
    },
}
</script>
