<style scoped>
  .dropdown {
    position: relative;
  }

  .open .dropdown-toggle,
  .open .dropdown-menu {
    border-color: rgba(60,60,60,.26);
  }

  .open-indicator {
    position: absolute;
    top: 10px;
    right: 10px;
    display: inline-block;
    cursor: pointer;
    pointer-events: all;
    transition: all 150ms cubic-bezier(1.000, -0.115, 0.975, 0.855);
    transition-timing-function: cubic-bezier(1.000, -0.115, 0.975, 0.855);
  }

  .open .open-indicator {
    transform: rotate(180deg);
  }

  .dropdown-toggle {
    display: block;
    padding: 0;
    background: none;
    white-space: normal;
  }
  .searchable .dropdown-toggle {
    cursor: text;
  }

  .open .dropdown-toggle {
    border-bottom: none;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  .dropdown-menu {
    margin: 0;
    width: 100%;
    overflow-y: auto;
    border-top: none;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .selected-tag {
    color: #333;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 4px;
    height: 26px;
    margin: 4px 1px 0px 3px;
    padding: 0 0.25em;
    float: left;
    line-height: 1.7em;
  }

  .selected-tag .close {
    float: none;
    margin-right: 0;
    font-size: 20px;
  }

  input[type=search],
  input[type=search]:focus {
    display: inline-block;
    border: none;
    outline: none;
    margin: 0;
    padding: 0 .5em;
    width: 10em;
    max-width: 100%;
    background: none;
    position: relative;
    box-shadow: none;
    float: left;
    clear: none;
  }

  input[type=search]:disabled {
    cursor: pointer;
  }

  li a {
    cursor: pointer;
  }

  .active a {
    background: rgba(50,50,50,.1);
    color: #333;
  }

  .highlight a,
  li:hover > a {
    background: #f0f0f0;
    color: #333;
  }
</style>

<template>
  <div class="dropdown" :class="dropdownClasses">
    <div v-el:toggle @mousedown.prevent="toggleDropdown" class="form-control dropdown-toggle clearfix" type="button">
        <span class="form-control" v-if="!searchable && isSelectedEmpty">
            {{ placeholder }}
        </span>

        <span class="selected-tag" v-for="option in selectedOptionsAsArray">
            {{ getOptionLabel(option) }}
            <button v-if="multiple" @click="select(option)" type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </span>

        <input
          v-el:search
          v-show="searchable"
          v-model="search"
          @keyup.delete="maybeDeleteValue"
          @keyup.esc="onEscape"
          @keyup.up.prevent="typeAheadUp"
          @keyup.down.prevent="typeAheadDown"
          @keyup.enter.prevent="typeAheadSelect"
          @blur="open = false"
          @focus="open = true"
          type="search"
          class="form-control"
          :placeholder="searchPlaceholder"
          :style="{ width: isSelectedEmpty ? '100%' : 'auto' }"
        >

        <i v-el:open-indicator role="presentation" class="open-indicator fa fa-chevron-down"></i>
    </div>

    <ul v-show="open" v-el:dropdown-menu :transition="transition" :style="{ 'max-height': maxHeight }" class="dropdown-menu animated">
        <li v-for="option in filteredOptions"
            :class="{ active: isOptionSelected(option), highlight: $index === typeAheadPointer }"
            @mouseover="typeAheadPointer = $index">

            <a @mousedown.prevent="select(option)">
                {{ getOptionLabel(option) }}
            </a>
        </li>
        <li transition="fade" v-if="!filteredOptions.length" class="divider"></li>
        <li transition="fade" v-if="!filteredOptions.length" class="text-center">Sorry, no matching options.</li>
    </ul>
  </div>
</template>

<script>
    export default {

        props: {

            selected: {
                default: null
            },

            selectionModeIsObject: {
                type: Boolean,
                default: true
            },

            options: {
                type: Array,
                default() { return [] },
            },

            maxHeight: {
                type: String,
                default: '400px'
            },

            searchable: {
                type: Boolean,
                default: true
            },

            multiple: {
                type: Boolean,
                default: false
            },

            placeholder: {
                type: String,
                default: ''
            },

            transition: {
                type: String,
                default: 'expand'
            },

            clearSearchOnSelect: {
                type: Boolean,
                default: true
            },

            labelKey: {
                type: String,
                default: 'label'
            },

            valueKey: {
                type: String,
                default: 'value'
            },
        },

        data() {
            return {
                open: false,
                search: '',
                typeAheadPointer: -1,
            }
        },

        watch: {
            options() {
                if (this.isSelectedEmpty) {
                    this.$set('selected', this.multiple ? [] : null)
                }
            },
            multiple(val) {
                if (this.isSelectedEmpty) {
                    this.$set('selected', val ? [] : null)
                }
            },
            filteredOptions() {
                this.typeAheadPointer = 0;
            },
        },

        computed: {
            dropdownClasses() {
                return {
                    open: this.open,
                    searchable: this.searchable
                }
            },

            searchPlaceholder() {
                if (this.isSelectedEmpty && this.placeholder) {
                    return this.placeholder;
                }
            },

            orderedOptions() {
                return this.$options.filters.orderBy(this.options, this.labelKey)
            },

            filteredOptions() {
                return this.$options.filters.filterBy(this.orderedOptions, this.search, this.labelKey)
            },

            selectedOptionsAsArray() {
                if (this.isSelectedEmpty) {
                    return []
                }

                if (this.selectionModeIsObject) {
                    return this.selectedAsArray
                }

                var self = this
                return _.filter(this.orderedOptions, function (option) {
                    return _.contains(self.selectedAsArray, self.getOptionValue(option))
                });
            },

            isSelectedEmpty() {
                if (_.isNull(this.selected)) {
                    return true
                }

                if (this.multiple) {
                    return _.isEmpty(this.selected)
                }

                return false
            },

            selectedAsArray() {
                if (_.isNull(this.selected)) {
                    return []
                }

                return _.isArray(this.selected) ? this.selected : [this.selected]
            },
        },

        methods: {
            select(option) {
                var optionValue = (this.selectionModeIsObject ? option : this.getOptionValue(option))

                if (! this.isOptionSelected(option)) {
                    if (this.multiple) {

                        if (! this.selected) {
                            this.$set('selected', [optionValue])
                        } else {
                            this.selected.push(optionValue)
                        }

                    } else {
                        this.selected = optionValue
                    }
                } else {
                    if (this.multiple) {
                        this.selected.$remove(optionValue)
                    }
                }

                this.onAfterSelect(option)
            },

            onAfterSelect(option) {
                if (!this.multiple) {
                    this.open = !this.open
                    this.$els.search.blur()
                }

                if( this.clearSearchOnSelect ) {
                    this.search = ''
                }
            },

            isOptionSelected(option) {
                var optionValue = (this.selectionModeIsObject ? option : this.getOptionValue(option))

                if (this.multiple && this.selected) {
                    return _.contains(this.selected, optionValue)
                }

                return this.selected === optionValue;
            },

            getOptionLabel(option) {
                if (_.isObject(option) && option[this.labelKey] ) {
                    return option[this.labelKey];
                }

                return option;
            },

            getOptionValue(option) {
                if (_.isObject(option) && option[this.valueKey] ) {
                    return option[this.valueKey];
                }

                return option;
            },

            toggleDropdown(e) {
                if( e.target === this.$els.openIndicator || e.target === this.$els.search || e.target === this.$els.toggle || e.target === this.$el ) {
                    if( this.open ) {
                        this.$els.search.blur() // dropdown will close on blur
                    } else {
                        this.open = true
                        this.$els.search.focus()
                    }
                }
            },

            /**
            * Move the typeAheadPointer visually up the list by
            * subtracting the current index by one.
            * @return {void}
            */
            typeAheadUp() {
                if (this.typeAheadPointer > 0) this.typeAheadPointer--
            },

            /**
            * Move the typeAheadPointer visually down the list by
            * adding the current index by one.
            * @return {void}
            */
            typeAheadDown() {
                if (this.typeAheadPointer < this.filteredOptions.length - 1) this.typeAheadPointer++
            },

            /**
            * Select the option at the current typeAheadPointer position.
            * Optionally clear the search input on selection.
            * @return {void}
            */
            typeAheadSelect() {
                if( this.filteredOptions[ this.typeAheadPointer ] ) {
                    this.select( this.filteredOptions[ this.typeAheadPointer ] )
                }

                if( this.clearSearchOnSelect ) {
                    this.search = ""
                }
            },

            /**
            * If there is any text in the search input, remove it.
            * Otherwise, blur the search input to close the dropdown.
            * @return {[type]} [description]
            */
            onEscape() {
                if( ! this.search.length ) {
                    this.$els.search.blur()
                } else {
                    this.$set('search', "")
                }
            },

            /**
            * Delete the selection on Delete keypress when there is no
            * text in the search input, & there's tags to delete
            * @return {this.selected}
            */
            maybeDeleteValue() {
                if( ! this.$els.search.value.length && this.selected ) {
                    return this.multiple ? this.selected.pop() : this.$set('selected', null)
                }
            },

        },
    }
</script>
