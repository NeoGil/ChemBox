<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="form-group row">
                <h3>{{ name }}</h3>
                <div class="test" v-for="(item, index) in inputs" >
                    <div class="input-group">
                        <h5>{{ item.label }}</h5>
                        <input type="text" v-bind:name="'test['+ index +'][question]'" class="form-control">
                    </div>
                    <div class="test">
                        <div class="item" v-for="(item_q, index_q) in item.inputs_q">
                            <div class="">
                                <h6>Вариант ответа-{{ index_q+1 }}</h6><br>
                                <input type="text" v-bind:name="'test['+ index +'][answer]['+ index_q +']'" class="form-control">
                                <input type="checkbox" value="1" v-bind:name="'test['+ index +'][choice]['+ index_q +']'">
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="button" @click="pushInputAns(item.inputs_q)" value="Добавить ответ">
                    <input type="button" @click="spliceAns(item.inputs_q)" value="Удалить ответ">
                </div>
                <input type="button" @click="pushInputQ" value="Добавить вопрос">
                <input type="button" @click="spliceQ" value="Удалить вопрос">
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    .test {
        display: flex;
        flex-wrap: wrap;
        background: #00000d0d;
        margin: 10px;
        padding: 10px;
        border-radius: 10px;
    }

    .item {
        margin: 10px;
        h6 {
            margin: 10px;
        }
    }
</style>

<script>
    export default {
        data() {
            return {
                name: 'Test',
                inputs: [
                    {label: 'Вопрос-1', inputs_q: [
                            {label_q: 'Вариант ответа-1'},
                            {label_q: 'Вариант ответа-2'},
                            {label_q: 'Вариант ответа-3'},
                            {label_q: 'Вариант ответа-4'},
                        ]},
                    {label: 'Вопрос-2', inputs_q: [
                            {label_q: 'Вариант ответа-1'},
                            {label_q: 'Вариант ответа-2'},
                            {label_q: 'Вариант ответа-3'},
                            {label_q: 'Вариант ответа-4'},
                        ]},
                ]
            }
        },
        methods: {
            pushInputQ() {
                this.$set(this.inputs, this.inputs.length, {
                    label: 'Вопрос-' + (this.inputs.length + 1),
                    inputs_q: [
                        {label_q: 'Вариант ответа-1'},
                        {label_q: 'Вариант ответа-2'},
                        {label_q: 'Вариант ответа-3'},
                        {label_q: 'Вариант ответа-4'},
                    ]
                })

            },
            pushInputAns(item_q) {
                this.$set(item_q, item_q.length, {
                    label: 'Вариант ответа-' + (item_q.length + 1)
                })
            },
            spliceQ() {
                this.inputs.splice(this.inputs.lastIndexOf(this.inputs))
            },
            spliceAns(item_q) {
                item_q.splice(item_q.indexOf(item_q))
            }
        }
    }
</script>
