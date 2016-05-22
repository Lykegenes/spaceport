<template>
    <div class="v-spinner" v-bind:style="containerStyle" v-show="loading">
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
        <div class="v-grid" v-bind:style="[spinnerStyle,animationStyle,animationStyleRandomize()]"></div>
    </div>
</template>

<script>
export default {

    props: {
        loading: {
              type: Boolean,
              default: true
        },
        center: {
            type: Boolean,
            default: false
        },
        color: {
              type: String,
              default: '#3c8dbc'
        },
        size: {
              type: String,
              default: '15px'
        },
        margin: {
              type: String,
              default: '2px'
        },
        radius: {
              type: String,
              default: '100%'
        }
    },

    data() {
        return {
            spinnerStyle: {
                backgroundColor: this.color,
                width: this.size,
                height: this.size,
                margin: this.margin,
                borderRadius: this.radius
            },
            animationStyle: {
                animationName: 'v-gridStretchDelay',
                animationIterationCount: 'infinite',
                animationTimingFunction: 'ease',
                animationFillMode: 'both',
                display: 'inline-block'
            }
        }
    },

    computed: {
        containerStyle() {
            return {
                margin: (this.center ? 'auto' : null),
                width: parseFloat(this.size) * 3 + parseFloat(this.margin) * 6 + 'px',
                fontSize: 0
            }
        }
    },

    methods: {
        animationStyleRandomize() {
            return {
                // Math.random() returns a number between 0 and 1
                animationDelay: (Math.random() - 0.2) + 's',
                animationDuration: (Math.random() + 0.6) + 's'
            }
        },
    }
}
</script>

<style>
@-webkit-keyframes v-gridStretchDelay {
    0% {
        -webkit-transform: scale(1);
                transform: scale(1);
    }
    50% {
        -webkit-transform: scale(0.5);
                transform: scale(0.5);
        -webkit-opacity: 0.7;
                opacity: 0.7;
    }
    100% {
        -webkit-transform: scale(1);
                transform: scale(1);
        -webkit-opacity: 1;
                opacity: 1;
    }
}

@keyframes v-gridStretchDelay {
    0% {
        -webkit-transform: scale(1);
                transform: scale(1);
    }
    50% {
        -webkit-transform: scale(0.5);
                transform: scale(0.5);
        -webkit-opacity: 0.7;
                opacity: 0.7;
    }
    100% {
        -webkit-transform: scale(1);
                transform: scale(1);
        -webkit-opacity: 1;
                opacity: 1;
    }
}
</style>
