import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom/client';

import Home from './Pages/Home';

const App = () => {
  return (
    <Home />
  );
};

ReactDOM.createRoot(document.getElementById('app')).render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
);