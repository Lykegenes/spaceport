<template>
    <div class="form-group" :class="{'has-error': form.errors.has(name)}">
        <label class="col-sm-2 control-label">{{ display }}</label>
        <div class="col-sm-10">
            <div class="radio" v-for="item in items">
                <label>
                    <input type="radio" :name="item.name" :value="item.value" v-model="input">
                    {{ item.text }}
                </label>
            </div>

            <span class="help-block" v-show="form.errors.has(name)">
                <strong>{{ form.errors.get(name) }}</strong>
            </span>
        </div>
    </div>
</template>

<script>
    module.exports = {

        props: ['display', 'form', 'name', 'items', 'input'],

    }
</script>
