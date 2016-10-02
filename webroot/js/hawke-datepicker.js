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
        minDate={moment().subtract(70, 'years')}
        maxDate={moment().subtract(18, 'years')}
        selected={moment().subtract(18, 'years')}
        onChange={this.handleChange} />;
  }
});
export default HawkeDatePicker;