import React from 'react';
import ReactDOM from 'react-dom';

function Search() {
    return (
        <div className="input-group mb-3">
        <input type="text"  className="form-control" placeholder="Search" aria-label="Recipient's username"
            aria-describedby="basic-addon2" />
        <div className="input-group-append">
            <button className="btn btn-secondary" type="button">Search</button>
        </div>
    </div>
    );
}

export default Search;

if (document.getElementById('search')) {
    ReactDOM.render(<Search />, document.getElementById('search'));
}
