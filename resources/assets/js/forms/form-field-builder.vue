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
    </template>
    <div v-else>
        This column type is not supported.
    </div>
</template>

<script>
    module.exports = {

        mixins: [Spaceport.ColumnTypesMixin],

        props: ['type', 'display', 'form', 'name', 'input'],

    }
</script>
