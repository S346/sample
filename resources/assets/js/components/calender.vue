<template>
    <section class="calender">
        <ul>
            <calender-item v-for='(day, index) in days' :items='day' :date='index+1' :key='index'></calender-item>
        </ul>
        <p v-on:click="prev()">←</p>
        <p v-on:click="next()">→</p>
    </section>
</template>

<style scoped>
ul {
    max-width: 800px;
    margin: 30px auto;
}
</style>

<script>
    import CalenderItem from './calender-item.vue';
    export default {
        components: {
            CalenderItem
        },
        data() {
            return {
                days: []
            }
        },
        mounted() {
            this.year = new Date().getFullYear();
            this.month = new Date().getMonth() + 1;
            this.getData(this.year, this.month);
        },
        methods: {
            getData(year, month) {
                var _this = this;
                var endpoint = '/api/schedule/' + year + '/' + month;
                $.ajax({
                    url: endpoint,
                    type: 'GET',
                    dataType: 'json',
                })
                .then( function(data) {
                    _this.process(data);
                })
            },
            prev() {
                this.month--;
                if(this.month < 1) {
                    this.year--;
                    this.month = 12;
                }
                this.getData(this.year, this.month);
            },
            next() {
                this.month++;
                if(12 < this.month) {
                    this.year++;
                    this.month = 1;
                }
                this.getData(this.year, this.month);
            },
            process(data) {
                var _this = this;
                var dt = new Date(_this.year, _this.month, 1);
                dt.setDate(dt.getDate() - 1);
                var maxDate = dt.getDate();

                _this.days = [];
                for (var i=0; i<maxDate; i++) _this.days.push([]);

                data.forEach(function(value) {
                    var date = new Date(value['date']).getDate();
                    var index = date - 1;
                    _this.days[index].push(value);
                    _this.days.splice(index, 1, _this.days[index]);
                });

            }
        }
    }
</script>
