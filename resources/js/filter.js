Nova.booting((Vue, router, store) => {
    Vue.component('range-input-filter', require('./components/RangeInputFilter').default)
    Vue.component('range-date-filter', require('./components/RangeDateFilter').default)
})
