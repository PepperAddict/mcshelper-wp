import React from 'react';
import ReactDOM from 'react-dom';
import App from './App.jsx';

document.addEventListener('DOMContentLoaded', function() {
    var adminEl = document.getElementById('mcs-admin-app');

    if (typeof adminEl !== 'undefined' && adminEl !== null) {
        ReactDOM.render(<App/>, document.getElementById('mcs-admin-app') )
    }
})