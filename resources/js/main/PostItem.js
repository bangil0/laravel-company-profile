import React, { Component } from 'react';

const PostItem = ({posts}) => {
	const postItem = posts.map((post, index) => {
		var date = (new Date(post.updated_at)).toLocaleDateString("en-US", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
      	return (
        	<div key={ index }>
        		<a href="#">
					<h2 className="post-title">
						{ post.post_name }
					</h2>
				</a>
				<p className="post-meta">Posted On { date } </p>
        	</div>
      	)
	});

    return (
    	<div className="post-preview">
    		{ postItem }
		</div>
    )
};

export default PostItem;