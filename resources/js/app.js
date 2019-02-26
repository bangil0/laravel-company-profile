
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import React, { Component } from 'react';
 import ReactDOM from 'react-dom';
 import '../../node_modules/font-awesome/css/font-awesome.min.css'; 
 import Header from './components/Header';
 import Main from './components/Main';
 import Footer from './components/Footer';

 import {
  BrowserRouter as Router,
  Route,
  Link,
  Switch,
  Redirect,
  HashRouter
} from 'react-router-dom'

 class App extends Component {
 	render(){
 		return (
 			<div>
 				<Router>
 					<div>
		 				<Header />
		 				<Main />
	 				</div>
	 			</Router>
 				<Footer />
 			</div>
 		)
 	}
 }

if (document.getElementById("app")) {
	ReactDOM.render(<App />, document.getElementById('app'));
}