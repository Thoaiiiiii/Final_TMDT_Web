import React from "react";

const Footer = () => {
  return (
    <footer className="bg-gray-800 text-gray-300 text-center py-4">
      <p>&copy; {new Date().getFullYear()} Shoe Store. All rights reserved.</p>
    </footer>
  );
};

export default Footer;
