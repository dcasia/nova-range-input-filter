<template>

    <FilterContainer class="range-input-filter">

        <span>{{ filter.name }}</span>

        <template #filter>

            <div class="flex flex-no-wrap items-center">

                <input class="w-full block form-control form-select form-control-sm form-select-bordered px-3"
                       name="from"
                       :type="filter.inputType || 'number'"
                       :placeholder="filter.fromPlaceholder"
                       v-model="value.from"
                       v-bind="filter.fromAttributes"
                       @change="handleChange"/>

                <div class="text-sm mx-2 text-center">
                    {{ filter.dividerLabel || __('to') }}
                </div>

                <input class="w-full block form-control form-select form-control-sm form-select-bordered px-3"
                       name="to"
                       :type="filter.inputType || 'number'"
                       :placeholder="filter.toPlaceholder"
                       v-model="value.to"
                       v-bind="filter.toAttributes"
                       @change="handleChange"/>

            </div>

        </template>

    </FilterContainer>

</template>

<script>

    export default {
        name: 'RangeInputFilter',
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },
        methods: {
            handleChange(event) {

                let value = { ...this.value, [ event.target.name ]: event.target.value }

                if ([ '', undefined ].includes(value.from) && [ '', undefined ].includes(value.to)) {
                    value = ''
                }

                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value,
                })

                this.$emit('change')

            },
        },
        computed: {
            filter() {
                return this.$store.getters[ `${ this.resourceName }/getFilter` ](this.filterKey)
            },
            value() {
                return { ...this.filter.currentValue } || { from: '', to: '' }
            },
        },
    }

</script>
