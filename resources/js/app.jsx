//import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom/client';

//import Home from './Pages/Home';

import '../frontend/css/bootstrap.min.css';
import '../frontend/css/font-awesome.min.css';
import '../frontend/css/prettyPhoto.css';
import '../frontend/css/price-range.css';
import '../frontend/css/animate.css';
import '../frontend/css/main.css';
import '../frontend/css/responsive.css';

import '../frontend/js/jquery.js';
import '../frontend/js/bootstrap.min.js';
import '../frontend/js/jquery.scrollUp.min.js';
import '../frontend/js/price-range.js';
import '../frontend/js/jquery.prettyPhoto.js';
import '../frontend/js/main.js';

// import hình ảnh, font
import.meta.glob([
  '../frontend/images/ico/**',
  '../frontend/fonts/**',
]);


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


