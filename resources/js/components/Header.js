import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom'

class Header extends Component {
	render(){
		return(
			<nav className="navbar navbar-expand-lg navbar-light bg-light">
				<Link to='/' className="navbar-brand">Company Profile</Link>
				<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span className="navbar-toggler-icon"></span>
				</button>
				<div className="collapse navbar-collapse" id="navbarSupportedContent">
					<ul className="navbar-nav mr-auto">
						<li className="nav-item active">
							<Link to='/' className="nav-link">Home</Link>
						</li>
						<li className="nav-item">
							<Link to='/about' className="nav-link">About us</Link>
						</li>
						<li className="nav-item">
							<Link to='/product' className="nav-link">Products</Link>
						</li>
						<li className="nav-item">
							<Link to='/gallery' className="nav-link">Gallery</Link>
						</li>
						<li className="nav-item">
							<Link to='/contact' className="nav-link">Contact us</Link>
						</li>
					</ul>
				</div>
			</nav>
		)
	}
}

export default Header;