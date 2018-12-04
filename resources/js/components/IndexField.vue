<template>
    <span>{{ getCoordsLabel() }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    methods: {
        getCoordsLabel() {
            return this.field.latitude + ',' + this.field.longitude;
        }
    }
}
</script>
