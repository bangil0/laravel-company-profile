import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import config from '../setting/Config';
import ErrorForm from '../components/ErrorForm';
import SuccessForm from '../components/SuccessForm';

export default class Contact extends Component {
	
	constructor() {
    	super();
    	this.state = {
      		contact_name: '',
      		contact_email: '',
      		contact_subject: '',
      		contact_message: '',
            response: {},
            errors: {},
    	};

    	this.handleChange = this.handleChange.bind(this);
    	this.handleSubmit = this.handleSubmit.bind(this);
	}

  	handleChange(event) {
        const {name, value} = event.target;
        this.setState({
            [name]: value
        });
	};

	handleSubmit(event) {
    	event.preventDefault();
        const { contact_name, contact_email, contact_subject, contact_message } = this.state;
    	fetch(`${config.url}/contact`, {
    		method: 'POST',
      		headers: { 
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
      		body: JSON.stringify({
        		contact_name: contact_name,
        		contact_email: contact_email,
        		contact_subject: contact_subject,
        		contact_message: contact_message
    		})
		})
        .then((response) => response.json())
        .then((responseJson) => {
            const { status, message, errors } = responseJson;
            if(status === 'success'){
                this.setState({ response: responseJson, errors:{}, contact_name: '', contact_subject: '', contact_email: '', contact_message: '' });
            } else {
                this.setState({ response: {}, errors: errors });
            }
        });
	};

    renderSuccess(){
        if(Object.keys(this.state.response).length !== 0){
            return (
                <SuccessForm result={this.state.response} />
            )
        }
    }

    renderError(){
        if (Object.keys(this.state.errors).length !== 0) {
            return (
                <ErrorForm errors={this.state.errors} />
            )
        }
    }

    render() {
        return (
            <div className="container">
                { this.renderSuccess() }
                { this.renderError() }
                <form>
                    <div className="form-group">
                        <label>Nama</label>
                        <input
                            name="contact_name"
                            className="form-control"
                            value={this.state.contact_name}
                            onChange={this.handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label>Email</label>
                        <input
                            name="contact_email"
                            className="form-control"
                            value={this.state.contact_email}
                            onChange={this.handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label>Subjek</label>
                        <input
                            name="contact_subject"
                            className="form-control"
                            value={this.state.contact_subject}
                            onChange={this.handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label>Pesan</label>
                        <textarea
                            name="contact_message"
                            className="form-control"
                            value={this.state.contact_message}
                            onChange={this.handleChange}
                        >
                        </textarea>
                    </div>
                    <button className="btn btn-primary" onClick={this.handleSubmit}>Submit</button>
                </form>
            </div>
        );
    }
}