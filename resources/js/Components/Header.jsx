import React from "react";

const Header = () => {
  return (
    <header className="bg-black text-white px-6 py-4 flex justify-between items-center">
      <h1 className="text-2xl font-bold">Shoe Store</h1>
      <nav className="space-x-4">
        <a href="#" className="hover:underline">Home</a>
        <a href="#" className="hover:underline">Products</a>
        <a href="#" className="hover:underline">Contact</a>
      </nav>
    </header>
  );
};

export default Header;
