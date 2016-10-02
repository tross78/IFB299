const React = require('react'), InputPassword = require('react-ux-password-field');

React.render(
<form>
<fieldset>
<label htmlFor="password1">Password</label>
<InputPassword
    id="password1"
    name="password1"
    placeholder="Try me out!  Enter a random password."
    minScore={1}
    minLength={5}
    zxcvbn="debug"
/>
</fieldset>
</form>
, mountNode);