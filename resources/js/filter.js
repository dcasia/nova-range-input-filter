import RangeInputFilter from './components/RangeInputFilter'
import RangeDateFilter from './components/RangeDateFilter'

Nova.booting((Vue, router, store) => {
    Vue.component('range-input-filter', RangeInputFilter)
    Vue.component('range-date-filter', RangeDateFilter)
})
