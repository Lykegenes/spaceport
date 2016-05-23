<template>
    Display value : {{ display }} <br>
    Form value : {{ form | json }} <br>
    Name value : {{ name }} <br>
    Input value : {{ input }}
    <template v-if="isValidColumnType(type)">
        <text-field v-if="type == ColumnTypes.COL_TEXT_FIELD"
                    :display="display"
                    :form="form"
                    :name="name"
                    :input.sync="input">
        </text-field>
        <text-area v-if="type == ColumnTypes.COL_TEXT_AREA"
                    :display="display"
                    :form="form"
                    :name="name"
                    :input.sync="input">
        </text-area>
        <number-field v-if="type == ColumnTypes.COL_INTEGER"
                    :display="display"
                    :form="form"
                    :name="name"
                    :input.sync="input">
        </number-field>
        <date-field v-if="type == ColumnTypes.COL_DATE"
                    :display="display"
                    :form="form"
                    :name="name"
                    :input.sync="input">
        </date-field>
        <radio-field v-if="type == ColumnTypes.COL_RADIO"
                    :display="display"
                    :form="form"
                    :name="name"
                    :items="[{text: 'one', value: 1}, {text: 'two', value: 2}]"
                    :input.sync="input">
        </radio-field>
        <checkbox-field v-if="type == ColumnTypes.COL_CHECKBOX"
                    :display="display"
                    :form="form"
                    :name="name"
                    :items="[{text: 'one', value: 1}, {text: 'two', value: 2}]"
                    :input.sync="input">
        </checkbox-field>
        <toggle-field v-if="type == ColumnTypes.COL_BOOLEAN"
                    :display="display"
                    :form="form"
                    :name="name"
                    :items="[{text: 'Confirm?', value: 1}]"
                    :input.sync="input">
        </toggle-field>
        <select-field v-if="type == ColumnTypes.COL_SELECT"
                    :display="display"
                    :form="form"
                    :name="name"
                    :items="[{text: 'one', value: 1}, {text: 'two', value: 2}]"
                    :input.sync="input">
        </select-field>
    </template>
    <div v-else>
        This column type is not supported.
    </div>
</template>

<script>
import SpaceportColumnTypesMixin from 'mixins/SpaceportColumnTypesMixin.js';

export default {

    mixins: [SpaceportColumnTypesMixin],

    props: ['type', 'display', 'form', 'name', 'input'],

}
</script>
