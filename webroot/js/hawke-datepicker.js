require('react');
require('react-bootstrap-date-picker');


var HawkeDatePicker = React.createClass({
  getInitialState: function(){
    var value = new Date().toISOString();
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
      <DatePicker value={this.state.value} onChange={this.handleChange} inputProps={{ id:"UserDateOfBirth", name: "data[User][date_of_birth]", required:"required", placeholder:"Date of Birth"}} />
    </div>;
  }
});

export default HawkeDatePicker;