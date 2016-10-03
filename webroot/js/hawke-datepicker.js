import React from 'react'
import { DateField } from 'react-date-picker'
import 'react-date-picker/index.css'

var HawkeDatePicker = function() {
  return <DateField
    forceValidDate
    defaultValue={"1998-01-01"}
    dateFormat="YYYY-MM-DD"
    inputProps={{ id:"UserDateOfBirth", name: "data[User][date_of_birth]", required:"required", placeholder:"Date of Birth"}}
  />
}
export default HawkeDatePicker;