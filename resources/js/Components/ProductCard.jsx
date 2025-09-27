import React from "react";

const ProductCard = ({ product }) => {
  return (
    <div className="border rounded-lg shadow-sm hover:shadow-md transition p-4">
      <img
        src={product.image}
        alt={product.name}
        className="w-full h-48 object-cover rounded-lg mb-4"
      />
      <h3 className="text-lg font-semibold">{product.name}</h3>
      <p className="text-gray-600">${product.price}</p>
      <button className="mt-3 bg-black text-white px-4 py-2 rounded-md hover:bg-gray-700">
        Add to Cart
      </button>
    </div>
  );
};

export default ProductCard;
