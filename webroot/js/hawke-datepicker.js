import React from 'react'
import { DateField } from 'react-date-picker'
import 'react-date-picker/index.css'

var HawkeDatePicker = function() {
  return <DateField
    forceValidDate
    defaultValue={"01-01-1998"}
    dateFormat="YYYY-MM-DD"
  />
}
export default HawkeDatePicker;