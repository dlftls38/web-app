import React from 'react';
import About from '../../components/home/About';
import { Route } from 'react-router-dom'

class Main extends React.Component {
    render() {        
        return(
            <Route path="/" component={About} />
        );
    }
}

export default Main;
