<template>

  <div class="range-input-filter pt-2 pb-3">

    <h3 class="px-3 text-xs uppercase font-bold tracking-wide">
      {{ filter.name }}
    </h3>

    <div class="flex p-2 flex-no-wrap items-center">

      <input class="w-full block form-control form-select form-control-sm form-select-bordered"
             :class="{ 'w-full': filter.options.fullWidth }"
             name="from"
             :type="filter.options.inputType"
             :placeholder="filter.options.fromPlaceholder"
             v-model="value.from"
             @change="handleChange"/>

      <div class="text-sm mx-2 text-center">{{ filter.options.dividerLabel }}</div>

      <input class="w-full block form-control form-select form-control-sm form-select-bordered"
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