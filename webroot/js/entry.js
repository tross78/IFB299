import ReactHabitat             from 'react-habitat';
import HomeCarousel             from './home-carousel';
import HawkePasswordStrength    from './hawke-password-strength';
//import HawkePasswordStrength    from '/hawke-password-strength';
import HawkeDatePicker          from './hawke-datepicker';

class TeamHawkeMeditation extends ReactHabitat.Bootstrapper {
    constructor(){
        super();

        // Create a new container builder
        var container = new ReactHabitat.Container();

        // Register your top level component(s) (ie mini/child apps)
        container.register('HomeCarousel', HomeCarousel);
        container.register('HawkeDatePicker', HawkeDatePicker);
        container.register('HawkePasswordStrength', HawkePasswordStrength);
        // Finally, set the container
        this.setContainer(container);
    }
}

// Always export a 'new' instance so it immediately evokes
export default new TeamHawkeMeditation();