<template>
    <div class="form-group" :class="{'has-error': form.errors.has(name)}">
        <label class="col-sm-2 control-label">{{ display }}</label>
        <div class="col-sm-10">
            <select :id="id" class="form-control select2" v-model="input">
                <option v-for="item in items" :value="item.value">
                    {{ item.text }}
                </option>
            </select>

            <span class="help-block" v-show="form.errors.has(name)">
                <strong>{{ form.errors.get(name) }}</strong>
            </span>
        </div>
    </div>
</template>

<script>
    module.exports = {

        props: ['display', 'form', 'name', 'items', 'input'],

        ready () {
            $('#' + this.id).select2({
                placeholder: this.display,
                allowClear: true,
                //minimumResultsForSearch: 20,
            });
        },

        data () {
            return {
                // Generate a Unique ID using Underscore; Select2 needs it to reference the input
                id: _.uniqueId('select2_'),
            }
        },

        deactivate (done) {
            $('#' + this.id).select2("destroy");
        }

    }
</script>
