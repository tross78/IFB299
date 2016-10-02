import React from 'react'
import { DateField } from 'react-date-picker'
import 'react-date-picker/index.css'

var HawkeDatePicker = function() {
  return <DateField
    forceValidDate
    defaultValue={"01-01-1998"}
    dateFormat="DD-MM-YYYY"
  />
}
export default HawkeDatePicker;