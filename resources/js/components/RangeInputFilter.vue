<template>

    <div class="range-input-filter">

        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="flex p-2 flex-no-wrap items-center">

            <input class="flex items-center form-control form-input text-sm border-60"
                   :class="{ 'w-full': filter.options.fullWidth }"
                   name="from"
                   :type="filter.options.inputType"
                   :placeholder="filter.options.fromPlaceholder"
                   v-model="value.from"
                   @change="handleChange"/>

            <div class="text-sm mx-2 text-center">{{ filter.options.dividerLabel }}</div>

            <input class="flex items-center form-control form-input text-sm border-60"
                   :class="{ 'w-full': filter.options.fullWidth }"
                   name="to"
                   :type="filter.options.inputType"
                   :placeholder="filter.options.toPlaceholder"
                   v-model="value.to"
                   @change="handleChange"/>

        </div>

    </div>

</template>

<script>

    export default {
        name: 'RangeInputFilter',
        props: {
            resourceName: {
                type: String,
                required: true
            },
            filterKey: {
                type: String,
                required: true
            }
        },
        methods: {
            handleChange(event) {

                /**
                 * Dont refresh the page if user is still typing the values
                 */
                if (Number.isNaN(parseInt(this.value.from)) !==
                    Number.isNaN(parseInt(this.value.to))) {

                    return

                }

                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: {
                        ...this.value,
                        [ event.target.name ]: event.target.value
                    }
                })

                this.$emit('change')

            }
        },
        computed: {
            filter() {
                return this.$store.getters[ `${ this.resourceName }/getFilter` ](this.filterKey)
            },
            value() {
                return { ...this.filter.currentValue } || { from: '', to: '' }
            }
        }
    }

</script>
