<template>
    <li class="calender-item">
        <div>{{date}}</div>
        <ul>
            <li v-for='item in items'>{{item.title}}</li>
        </ul>
    </li>
</template>

<style scoped>
.calender-item {
    display: flex;
    padding: 5px 0;
}

div {
    width: 50px;
}
</style>

<script>
    export default {
        name: 'CalenderItem',
        props: ['items', 'date']
    }
</script>
