import React from 'react';

const SuccessForm = ({result}) => {
	const { message } = result;
	return (
		<div className="alert alert-success">
			{ message }
		</div>
	)
}

export default SuccessForm;