<template>

    <div>

        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="flex p-2 flex-wrap items-center">

            <input class="flex items-center form-control form-input text-sm min-w-0 border-60"
                   :class="{ 'flex-1': filter.options.fullWidth }"
                   name="from"
                   :type="filter.options.inputType"
                   :placeholder="filter.options.fromPlaceholder"
                   :value="value.from"
                   @change="handleChange"/>

            <div class="text-sm mx-2">{{ filter.options.dividerLabel }}</div>

            <input class="flex items-center form-control form-input text-sm min-w-0 border-60"
                   :class="{ 'flex-1': filter.options.fullWidth }"
                   name="to"
                   :type="filter.options.inputType"
                   :placeholder="filter.options.toPlaceholder"
                   :value="value.to"
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

                this.value[ event.target.name ] = event.target.value

                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: this.value
                })

                this.$emit('change')

            }
        },
        computed: {
            filter() {
                return this.$store.getters[ `${ this.resourceName }/getFilter` ](this.filterKey)
            },
            value() {
                return this.filter.currentValue || {
                    from: null,
                    to: null
                }
            }
        }
    }

</script>
