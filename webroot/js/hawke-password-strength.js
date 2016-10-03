import React from 'react'
import ReactPasswordStrength from 'react-password-strength'

var HawkePasswordStrength = function() {
  return <div class="form-group"><ReactPasswordStrength
  minLength={5}
  minScore={2}
  scoreWords={['weak', 'okay', 'good', 'strong', 'stronger']}
  inputProps={{ id:"UserPassword", name: "data[User][password]", placeholder:"Password", autocomplete: "off", required:"required"}}
/></div>
}
export default HawkePasswordStrength;