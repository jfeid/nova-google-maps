<template>
    <panel-item :field="field">
        <template slot="value">
            <p class="text-90">{{ getCoordsLabel() }}</p>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    methods: {
        getCoordsLabel() {
            return this.field.value.latitude + ',' + this.field.value.longitude;
        }
    }

}
</script>
