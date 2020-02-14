<template>

    <div class="range-input-filter">

        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="flex p-2 flex-no-wrap items-center">

            <date-time-picker class="flex items-center form-control form-input text-sm border-60"
                              :class="{ 'w-full': filter.options.fullWidth }"
                              name="from"
                              autocomplete="off"
                              v-model="value.from"
                              :placeholder="filter.options.fromPlaceholder"
                              :dateFormat="filter.options.dateFormat"
                              :enable-time="filter.options.enableTime"
                              :enable-seconds="filter.options.enableSeconds"
                              @change="handleFromChange"/>

            <div class="text-sm mx-2 text-center">{{ filter.options.dividerLabel }}</div>

            <date-time-picker class="flex items-center form-control form-input text-sm border-60"
                              :class="{ 'w-full': filter.options.fullWidth }"
                              name="to"
                              autocomplete="off"
                              v-model="value.to"
                              :placeholder="filter.options.toPlaceholder"
                              :dateFormat="filter.options.dateFormat"
                              :enable-time="filter.options.enableTime"
                              :enable-seconds="filter.options.enableSeconds"
                              @change="handleToChange"/>

        </div>

    </div>

</template>

<script>
    export default {
        name: 'RangeDateFilter',
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
            handleFromChange(value) {
                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: {
                        ...this.value,
                        from: value
                    }
                })

                this.$emit('change')
            },
            handleToChange(value) {
                this.$store.commit(`${ this.resourceName }/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: {
                        ...this.value,
                        to: value
                    }
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
            }
        }
    }

</script>
