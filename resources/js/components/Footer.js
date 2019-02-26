import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import config from '../setting/Config';
import SocialMedia from './SocialMedia';

const styleFooter = {
	textAlign: 'center'
}

class Footer extends Component {

	constructor()
	{
		super()
		this.state = {
			result: [],
		}
	}
	componentDidMount()
	{
		this.getSocialMedia();
	}

	getSocialMedia()
	{
		fetch(`${config.url}/socialmedia`)
		.then((response) => response.json())
		.then((responseJson) => {
			this.setState({ result: responseJson});
		})
		.catch((error) => {
            alert('Terjadi error. Silahkan refresh halaman')
        });
	}

	renderResult()
	{
		if (Object.keys(this.state.result).length !== 0) {
			return <SocialMedia result={this.state.result} />
		}
	}

    render() {
        return (
            <footer className="page-footer font-small cyan darken-3">
				<div className="container">
					<div className="row">
						<div className="col-md-12 py-5" style={ styleFooter }>
							<div className="mb-5 flex-center">
								{ this.renderResult() }
							</div>
						</div>
					</div>
				</div>
				<div className="footer-copyright text-center py-3">© 2018 Copyright:
					<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
				</div>
			</footer>
        );
    }
}

export default Footer;