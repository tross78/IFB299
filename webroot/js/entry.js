import ReactHabitat                 from 'react-habitat';
import HomeCarousel             from './home-carousel';

class TeamHawkeMeditation extends ReactHabitat.Bootstrapper {
    constructor(){
        super();

        // Create a new container builder
        var container = new ReactHabitat.Container();

        // Register your top level component(s) (ie mini/child apps)
        container.register('HomeCarousel', HomeCarousel);

        // Finally, set the container
        this.setContainer(container);
    }
}

// Always export a 'new' instance so it immediately evokes
export default new TeamHawkeMeditation();