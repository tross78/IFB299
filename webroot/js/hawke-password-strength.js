import React from 'react'
import ReactPasswordStrength from 'react-password-strength'

var HawkePasswordStrength = function() {
  return <div class="ReactPasswordStrength">
       <input type="password" id="UserPassword" name="data[User][password]" placeholder="Password" required="" value="password"/>
       <div class="ReactPasswordStrength-strength-bar"></div>
       <span class="ReactPasswordStrength-strength-desc"></span>
     </div>;
}
export default HawkePasswordStrength;