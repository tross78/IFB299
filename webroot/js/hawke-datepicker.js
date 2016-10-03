import React from 'react'
import DatePicker from 'react-bootstrap-date-picker'

var HawkeDatePicker = function() {
  return <FormGroup>
      <ControlLabel>Label</ControlLabel>
      <DatePicker value={this.state.value} onChange={this.handleChange} inputProps={{ id:"UserDateOfBirth", name: "data[User][date_of_birth]", required:"required", placeholder:"Date of Birth"}} />
      <HelpBlock>Help</HelpBlock>
    </FormGroup>
}
export default HawkeDatePicker;