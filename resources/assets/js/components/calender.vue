<template>
    <ul>
        <li v-for="item in items">
            {{ item.title }}
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        mounted() {
            var _this = this;
            $.ajax({
                url: "/api/schedule",
                type: "GET",
                dataType: "json",
            })
            .then( function(data) {
                _this.items = data;
            })
        }
    }
</script>
