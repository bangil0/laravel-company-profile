import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import ReactHtmlParser from 'react-html-parser';
import config from '../setting/Config';

export default class AboutPage extends Component {

	constructor()
	{
		super()
		this.state = {
			result: [],
		}
	}
	componentDidMount()
	{
		this.getPageAbout();
	}

	getPageAbout()
	{
		fetch(`${config.url}/pageabout`)
		.then((response) => response.json())
		.then((responseJson) => {
			console.log(responseJson);
			this.setState({ result: responseJson});
		})
		.catch((error) => {
            alert('Terjadi error. Silahkan refresh halaman')
        });
	}

    render() {
        return (
            <div className="container">
                {ReactHtmlParser(this.state.result.page_description)}
            </div>
        );
    }
}