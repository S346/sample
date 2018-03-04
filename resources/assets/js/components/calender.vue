<template>
    <section class="calender">
        <ul>
            <li v-for='item in items'>
                <time>{{ item.date }}</time>
                <h2>{{ item.title }}</h2>
                <p>{{ item.open }}</p>
            </li>
        </ul>
        <p v-on:click="prev()">←</p>
        <p v-on:click="next()">→</p>
    </section>
</template>

<style>
ul {
    max-width: 800px;
    margin: auto;
}
li {
    display: flex;
}

time,
p {
    flex: 1;
}
h2 {
    flex: 3;
}

</style>

<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        mounted() {
            this.year = new Date().getFullYear();
            this.month = new Date().getMonth() + 1;
            this.show(this.year, this.month);
        },
        methods: {
            show(year, month) {
                var _this = this;
                var endpoint = '/api/schedule/' + year + '/' + month;
                $.ajax({
                    url: endpoint,
                    type: 'GET',
                    dataType: 'json',
                })
                .then( function(data) {
                    _this.items = data;
                })
            },
            prev() {
                this.month--;
                if(this.month < 1) {
                    this.year--;
                    this.month = 12;
                }
                this.show(this.year, this.month);
            },
            next() {
                this.month++;
                if(12 < this.month) {
                    this.year++;
                    this.month = 1;
                }
                this.show(this.year, this.month);
            }
        }
    }
</script>
