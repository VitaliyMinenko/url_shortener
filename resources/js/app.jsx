import React from 'react';
import ReactDOM from 'react-dom/client';
import UrlForm from "../components/urlForm.jsx";

function App() {
    return (
        <UrlForm></UrlForm>
    );
}

ReactDOM.createRoot(document.getElementById('app')).render(<App />);
