import React from 'react'
import { DateField } from 'react-date-picker'
import 'react-date-picker/index.css'

var HawkeDatePicker = function() {
  return <DateField
    dateFormat="YYYY-MM-DD"
  />
}
export default HawkeDatePicker;