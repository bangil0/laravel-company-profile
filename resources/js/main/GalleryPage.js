import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Gallery from 'react-photo-gallery';
import Lightbox from 'react-images';

import config from '../setting/Config';

export default class GalleryPage extends Component {

	constructor()
	{
		super()
		this.state = {
			photos: [],
			currentImage: 0
		}

	    this.closeLightbox = this.closeLightbox.bind(this);
	    this.openLightbox = this.openLightbox.bind(this);
	    this.gotoNext = this.gotoNext.bind(this);
	    this.gotoPrevious = this.gotoPrevious.bind(this);
	}
	
	componentDidMount()
	{
		this.getPageGallery();
	}

	getPageGallery()
	{
		let arrImage = this.state.photos;

		fetch(`${config.url}/pagegallery`)
		.then((response) => response.json())
		.then((responseJson) => {
			responseJson.itemdetail.map(function(item, index){
				arrImage[index] = {
					src: 'img/item_detail/'+item.item_detail_image,
					width: 3,
					height: 3,
				}
			});

			this.setState({ photos: arrImage })
		})
		.catch((error) => {
            alert('Terjadi error. Silahkan refresh halaman')
        });
	}

	openLightbox(event, obj) {
		this.setState({
	    	currentImage: obj.index,
	    	lightboxIsOpen: true,
	   	});
	}

	closeLightbox() {
    	this.setState({
      		currentImage: 0,
      		lightboxIsOpen: false,
    	});
  	}

  	gotoPrevious() {
    	this.setState({
      		currentImage: this.state.currentImage - 1,
    	});
  	}

  	gotoNext() {
    	this.setState({
      		currentImage: this.state.currentImage + 1,
    	});
  	}

    render() {
        return (
        	<div className="col-md-12">
	            <div>
		        <Gallery photos={this.state.photos} onClick={this.openLightbox} />
		        <Lightbox images={this.state.photos}
		          onClose={this.closeLightbox}
		          onClickPrev={this.gotoPrevious}
		          onClickNext={this.gotoNext}
		          currentImage={this.state.currentImage}
		          isOpen={this.state.lightboxIsOpen}
		        />
		      </div>
            </div>
        );
    }
}