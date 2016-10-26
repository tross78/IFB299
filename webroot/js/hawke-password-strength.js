import React from 'react'
import ReactPasswordStrength from 'react-password-strength'

var HawkePasswordStrength = function() {
  return <div class="form-group">
        <DatePicker value={this.state.value} onChange={this.handleChange} inputProps={{ id:"UserDateOfBirth", name: "data[User][date_of_birth]", required:"required", placeholder:"Date of Birth"}} />
        <DatePicker value={this.state.value} onChange={this.handleChange} inputProps={{ id:"UserDateOfBirth", name: "data[User][date_of_birth]", required:"required", placeholder:"Date of Birth", class:'form-group'}} />
        </div>;
}
export default HawkePasswordStrength;