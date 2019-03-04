import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Switch, Route } from 'react-router';

import Home from '../main/Home';
import AboutPage from '../main/AboutPage';
import GalleryPage from '../main/GalleryPage';
import Contact from '../main/Contact';


export default class Main extends Component {
    render() {
        return (
            <div className="container">
                <Switch>
                    <Route exact path='/' component={ Home }/>
                    <Route path='/about' component={ AboutPage }/>
                    <Route path='/gallery' component={ GalleryPage }/>
                    <Route path='/contact' component={ Contact }/>
                </Switch>
            </div>
        );
    }
}