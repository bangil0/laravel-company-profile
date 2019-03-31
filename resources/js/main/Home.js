import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import PostItem from '../main/PostItem';
import Pagination from "react-js-pagination";
import config from '../setting/Config';

export default class Home extends Component {

	constructor(props)
	{
		super(props)
		this.state = {
			activePage:1,
			itemsCountPerPage:1,
			totalItemsCount:1,
			posts: [],
		}

		this.handlePageChange = this.handlePageChange.bind(this);
	}

	componentDidMount()
	{
		this.getPost();
	}

	getPost() {
        
        fetch(`${config.url}/blog?page=${this.state.activePage}`)
		.then((response) => response.json())
		.then((responseJson) => {
			this.setState({ posts: responseJson.data.data, activePage: responseJson.data.current_page, itemsCountPerPage: responseJson.data.per_page, totalItemsCount: responseJson.data.total })
		})
		.catch((error) => {
            alert('Terjadi error. Silahkan refresh halaman')
        });
    }

    renderBlog(){
        if (Object.keys(this.state.posts).length !== 0) {
            return (
                <PostItem posts={this.state.posts} />
            )
        }
    }

    handlePageChange(pageNumber) {
    	this.state.activePage = pageNumber;
	    this.getPost();
	}

    render() {
        return (
            <div className="container">
            	<div className="row">
					<div className="col-lg-8 col-md-10 mx-auto">
						{ this.renderBlog() }
						<hr/>
						<Pagination
				          activePage={this.state.activePage}
				          itemsCountPerPage={this.state.itemsCountPerPage}
				          totalItemsCount={this.state.totalItemsCount}
				          pageRangeDisplayed={this.state.itemsCountPerPage}
				          onChange={this.handlePageChange}
				        />
					</div>
				</div>
            </div>
        );
    }
}