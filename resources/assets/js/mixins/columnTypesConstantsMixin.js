window.Spaceport.ColumnTypesConstants = {

    // 0-100 : IDs and Hashes
    COL_ID: 1,

    // 100-200 : Common System columns
    COL_TITLE: 100,
    COL_CREATED_AT: 110,
    COL_UPDATED_AT: 111,
    COL_DELETED_AT: 112,
    COL_CREATED_BY: 120,
    COL_UPDATED_BY: 121,
    COL_DELETED_BY: 122,

    // 300-399 : Test-based columns
    COL_TEXT_FIELD: 300,
    COL_TEXT_AREA: 301,
    COL_TEXT_RICH: 310,
    COL_LINK: 320,

    // 400-499 : Number-based columns
    COL_BOOLEAN: 400,
    COL_INTEGER: 401,
    COL_DECIMAL: 402,
    COL_CURRENCY: 403,

    // 500-599 : User-based columns
    COL_USER: 500,
    COL_GROUP: 501,
    COL_USER_AND_GROUP: 502,
    COL_USER_MULTIPLE: 510,
    COL_GROUP_MULTIPLE: 511,
    COL_USER_AND_GROUP_MULTIPLE: 512,

    // 600-699 : Date-based columns
    COL_DATE: 600,
    COL_DATETIME: 601,
    COL_DATETIME_TZ: 602,

    // 700-799 : Dropdown-based columns
    COL_RADIO: 700,
    COL_CHECKBOX: 701,
    COL_SELECT: 702,
    COL_SELECT_MULTIPLE: 703,
    COL_SELECT_CUSTOM: 704,
    COL_SELECT_CUSTOM_MULTIPLE: 705,
    COL_LOOKUP: 710,
    COL_LOOKUP_MULTIPLE: 711,

    // 800-899 : File-based columns
    COL_FILE: 800,
    COL_FILE_MULTIPLE: 801,
    COL_IMAGE: 802,
    COL_IMAGE_MULTIPLE: 803,

    // 900-999 : Special columns
    COL_CALCULATED: 900,
}

window.Spaceport.ColumnTypesMixin = {

    data() {
        return {
            ColumnTypes: Spaceport.ColumnTypesConstants
        }
    },

    methods: {
        isValidColumnType(type) {
            // get an array of all the IDs of the column types
            var values = _.values(Spaceport.ColumnTypesConstants)

            return _.indexOf(values, type) != -1
        },
    },
}
