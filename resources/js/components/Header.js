import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom'

const style = {
	backgroundImage: "url('img/home-bg.jpg')"
}

class Header extends Component {
	render(){
		return(
			<div>
				<nav className="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
				    <div className="container">
				        <Link to='/' className="navbar-brand">Company Profile</Link>
				        <button className="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				        Menu
				        <i className="fas fa-bars"></i>
				        </button>
				        <div className="collapse navbar-collapse" id="navbarResponsive">
				            <ul className="navbar-nav ml-auto">
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
				    </div>
				</nav>
				<header className="masthead" style={ style }>
				    <div className="overlay"></div>
				    <div className="container">
				        <div className="row">
				            <div className="col-lg-8 col-md-10 mx-auto">
				                <div className="site-heading">
				                    <h1>Clean Blog</h1>
				                    <span className="subheading">A Blog Theme by Start Bootstrap</span>
				                </div>
				            </div>
				        </div>
				    </div>
				</header>
			</div>
		)
	}
}

export default Header;