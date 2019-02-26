import React from 'react';

const GalleryItem = ({result}) => {
	const items = result.map(function(item, i){
		return (
			<div className="col-md-4">
				<div className="card">
					<div className="card-body">
						<img src={`/img/item_detail/${item.item_detail_image}`} width="100" height="100"/>
					</div>
					<div className="card-footer">
						{ item.item_detail_name }
					</div>
				</div>
			</div>
		);
	});

	return (
		<div className="col-md-12">
			{ items }
		</div>
	)
	
}

export default GalleryItem;