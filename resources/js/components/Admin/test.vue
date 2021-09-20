<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="form-group row">
                <label class="col-form-label col-lg-12">Test<span
                    class="text-danger">*</span></label>
                <div class="col-lg-12">
                    <div class="input-group">
                        <input type="text" name="test[0][question]" class="form-control">
                    </div>
                </div>

                <div class="test" style="display: flex">
                    <div class="col-lg-6">
                        <label class="col-form-label">1</label>
                        <div class="input-group">
                            <input type="text" name="test[0][answer][1]" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-form-label">2</label>
                        <div class="input-group">
                            <input type="text" name="test[0][answer][2]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">

</style>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>
