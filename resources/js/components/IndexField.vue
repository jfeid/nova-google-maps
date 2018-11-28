<template>
    <span>{{ getCoordsLabel() }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    methods: {
        getCoordsLabel() {
            return this.field.value.latitude + ',' + this.field.value.longitude;
        }
    }
}
</script>
