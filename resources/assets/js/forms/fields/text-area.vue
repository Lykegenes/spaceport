<template>
    <div class="form-group" :class="{'has-error': form.errors.has(name)}">
        <label class="col-sm-2 control-label">{{ display }}</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" v-model="input"></textarea>

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
