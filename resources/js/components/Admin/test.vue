<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="form-group row">
                <h3>{{ name }}</h3>
                <div class="test" v-for="(item, index) in inputs" >
                    <div class="input-group">
                        <h5>Вопрос-{{ index+1 }}</h5>
                        <input type="text" :name="'contents['+ index +'][question]'" v-if="item.question" required v-bind:value="item.question"  class="form-control quest">
                        <input type="text" :name="'contents['+ index +'][question]'" v-else required v-bind:v-model="item.question" class="form-control quest">

                    </div>
                    <div class="test">
                        <div class="item" v-for="(item_q, index_q) in item.answer">
                            <div class="">
                                <h6>Вариант ответа-{{ index_q+1 }}</h6>
                                <textarea type="text" :name="'contents['+ index +'][answer]['+ index_q +']'" v-if="item_q" required v-bind:value="item_q" class="form-control"></textarea>
                                <textarea type="text" :name="'contents['+ index +'][answer]['+ index_q +']'" v-else required v-bind:v-model="item_q" class="form-control"></textarea>
                                <div class="form-check">
                                    <input type="checkbox" value="1" v-bind:name="'contents['+ index +'][choice]['+ index_q +']'" v-if="item.choice && item.choice[index_q]" checked v-bind:id="'Check' + index +index_q " class="form-check-input">
                                    <input type="checkbox" value="1" v-bind:name="'contents['+ index +'][choice]['+ index_q +']'" v-else v-bind:id="'Check' + index +index_q " class="form-check-input">
                                    <label class="form-check-label" v-bind:for="'Check' + index +index_q">
                                        Верно
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <input class="buttonGroupe" type="button" @click="pushInputAns(item.answer)" value="Добавить ответ">
                        <input class="buttonGroupe" type="button" @click="spliceAns(item.answer)" value="Удалить ответ">
                    </div>

                </div>
                <div>
                    <input class="buttonGroupe" type="button" @click="pushInputQ" value="Добавить вопрос">
                    <input class="buttonGroupe" type="button" @click="spliceQ" value="Удалить вопрос">
                </div>

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
        .quest {
            flex: none !important;
        }

    }
    .item {
        margin: 10px;
        h6 {
            margin: 10px;
        }
    }
    .buttonGroupe {
        margin: 10px;
    }
</style>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                name: 'Test',
                inputs: [
                    {question: '', choice: {}, answer: [
                            '',
                            '',
                            '',
                            '',
                        ]},
                    {question: '', choice: {} , answer: [
                            '',
                            '',
                            '',
                            '',
                        ]},
                ]
            }
        },
        methods: {
            pushInputQ() {
                this.$set(this.inputs, this.inputs.length, {
                    question: '',
                    choice: {},
                    answer: [
                        '',
                        '',
                        '',
                        '',
                    ]
                });
            },
            pushInputAns(item_q) {
                this.$set(item_q, item_q.length, '')
            },
            spliceQ() {
                this.inputs.splice(this.inputs.lastIndexOf(this.inputs))
            },
            spliceAns(item_q) {
                item_q.splice(item_q.indexOf(item_q))
            }
        },
        mounted () {
            if(this.data){
                this.inputs = this.data;
            }
        },
    }
</script>
