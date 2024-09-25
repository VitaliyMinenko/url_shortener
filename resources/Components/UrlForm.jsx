import React, { useState } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';

const UrlForm = () => {
    const [slug, setSlug] = useState('');
    const [response, setResponse] = useState(null);
    const [message, setMessage] = useState('');
    const [errors, setErrors] = useState({});

    const handleInputChange = (e) => {
        const value = e.target.value.replace(/\s+/g, '');
        setSlug(value);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        setMessage('');

        try {
            const result = await axios.post('api/v1/shorten', { url: slug });
            setResponse(result.data);
            setMessage('Created successfully! New slug is: ' + result.data.url);
            setSlug('');
            setErrors({});
        } catch (error) {
            console.error("Error submitting URL:", error);
            setMessage('Failed to create short URL.');
        }
    };

    return (
        <div className="container d-flex justify-content-center align-items-center vh-100">
            <form onSubmit={handleSubmit} className="bg-white p-4 rounded shadow" style={{ maxWidth: '400px', width: '100%' }}>
                <h2 className="text-center mb-4">Submit URL Slug</h2>
                <div className="mb-3">
                    <label htmlFor="slug" className="form-label">Enter URL Slug:</label>
                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value={slug}
                        onChange={handleInputChange}
                        required
                        pattern="^[=_?&a-zA-Z0-9/-]+$"
                        title="Slug can only contain letters, numbers, hyphens (-), underscores (_), equals (=), question marks (?), and ampersands (&). No spaces allowed."
                        className={`form-control ${errors.slug ? 'is-invalid' : ''}`}
                    />
                    {errors.slug && (
                        <div className="invalid-feedback">
                            {errors.slug.join(', ')}
                        </div>
                    )}
                    {message && (
                        <div className="mt-2">
                            <p className="text-danger">{message}</p>
                        </div>
                    )}
                </div>
                <button type="submit" className="btn btn-success w-100">Submit</button>
            </form>
        </div>
    );
};

export default UrlForm;
