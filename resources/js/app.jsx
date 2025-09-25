import '../css/app.css';
import React from 'react';
import ReactDOM from 'react-dom/client';

const App = () => {
    return (
    <div className="flex h-screen items-center justify-center bg-blue-500">
      <h1 className="text-4xl font-bold text-white">
        Hello Tailwind v4!
      </h1>
    </div>
  )
};

ReactDOM.createRoot(document.getElementById('app')).render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
);