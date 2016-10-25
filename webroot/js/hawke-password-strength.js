import React from 'react'

var HawkePasswordStrength = function() {
  return (
    <div class="ReactPasswordStrength">
      <input type="password" id="UserPassword" name="data[User][password]" placeholder="Password" required="" value="password"/>
      <div class="ReactPasswordStrength-strength-bar"></div>
      <span class="ReactPasswordStrength-strength-desc"></span>
    </div>
  )
}
export default HawkePasswordStrength;