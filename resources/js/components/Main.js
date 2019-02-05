import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Switch, Route } from 'react-router';

import Home from '../main/Home';
import About from '../main/About';
import Product from '../main/Product';
import Gallery from '../main/Gallery';
import Contact from '../main/Contact';


export default class Main extends Component {
    render() {
        return (
            <div className="container">
                <Switch>
                    <Route exact path='/' component={ Home }/>
                    <Route path='/about' component={ About }/>
                    <Route path='/product' component={ Product }/>
                    <Route path='/gallery' component={ Gallery }/>
                    <Route path='/contact' component={ Contact }/>
                </Switch>
            </div>
        );
    }
}