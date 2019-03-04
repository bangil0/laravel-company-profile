import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import config from '../setting/Config';

export default class Contact extends Component {
	
	constructor() {
    	super();
    	this.state = {
      		contact_name: '',
      		contact_email: '',
      		contact_subject: '',
      		contact_message: '',
            alert: '',
            message: '',
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
    	fetch(`${config.url}/contact`, {
    		method: 'POST',
      		headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      		body: {
        		contact_name: this.state.contact_name,
        		contact_email: this.state.contact_email,
        		contact_subject: this.state.contact_subject,
        		contact_message: this.state.contact_message
    		}
		})
        .then((response) => response.json())
        .then((responseJson) => {
            const { status, message } = responseJson;
            this.setState({
                alert: status === "success" ? "success" : "danger",
                message: message,
            })
        });
	};

    render() {
        return (
            <div className="container">
                <div className={`alert alert-${this.state.alert}`}/>
                    { this.state.message }
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