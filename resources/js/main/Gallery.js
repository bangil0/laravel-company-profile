import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import config from '../setting/Config';
import GalleryItem from './GalleryItem';

export default class Gallery extends Component {

	constructor()
	{
		super()
		this.state = {
			result: [],
		}
	}
	componentDidMount()
	{
		this.getPageGallery();
	}

	getPageGallery()
	{
		fetch(`${config.url}/pagegallery`)
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
			return <GalleryItem result={this.state.result.itemdetail} />
		}
	}

    render() {
        return (
            <div className="col-md-12">
                { this.renderResult() }
            </div>
        );
    }
}