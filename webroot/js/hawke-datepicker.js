var React = require('react');
var DatePicker = require('react-datepicker');
var moment = require('moment');

require('react-datepicker/dist/react-datepicker.css');

var HawkeDatePicker = React.createClass({
  displayName: 'Example',

  getInitialState: function() {
    return {
      startDate: moment()
    };
  },

  handleChange: function(date) {
    this.setState({
      startDate: date
    });
  },

  render: function() {
    return <DatePicker
        dateFormat="DD/MM/YYYY"
        includeDates={[moment().subtract(70, 'years'), moment().subtract(18, 'years')]}
        selected={this.state.startDate}
        onChange={this.handleChange} />;
  }
});
export default HawkeDatePicker;