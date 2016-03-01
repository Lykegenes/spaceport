<template>
    <div class="form-group" :class="{\'has-error\': form.errors.has(name)}">
        <label class="col-md-4 control-label">{{ display }}</label>
        <div class="col-md-6">
            <input type="text" class="form-control" v-model="input">
            <span class="help-block" v-show="form.errors.has(name)">
                <strong>{{ form.errors.get(name) }}</strong>
            </span>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['display', 'form', 'name', 'input'],

    }
</script>
