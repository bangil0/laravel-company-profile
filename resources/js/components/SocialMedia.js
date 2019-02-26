import React from 'react';

const SocialMedia = ({result}) => {
	const items = result.map(function(item, i){
		return (
			<a href={result[i].value} key={i}>
				<i className={`fa fa-${result[i].icon} fa-lg  white-text mr-md-5 mr-3 fa-2x`}> </i>
			</a>
		);
	});

	return (
		<div>
			{ items }
		</div>
	)
	
}

export default SocialMedia;