import React from 'react';
import DatePicker from 'react-bootstrap-date-picker';


var HawkeDatePicker = React.createClass({
  getInitialState: function(){
    var value = new Date().toISOString().slice(0, 10);
    return {
      value: value
    }
  },
  handleChange: function(value) {
    // value is an ISO String.
    this.setState({
      value: value
    });
  },
  render: function(){
    return <div class="form-group">
      <DatePicker value={this.state.value} onChange={this.handleChange} id="UserDateOfBirth" name="data[User][date_of_birth]"/>
    </div>;
  }
});

export default HawkeDatePicker;